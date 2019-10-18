<?php

namespace App\Http\Controllers\Admin;

use App\ClientDetails;
use App\Currency;
use App\Estimate;
use App\EstimateItem;
use App\Helper\Reply;
use App\Http\Requests\StoreEstimate;
use App\ModuleSetting;
use App\Notifications\NewEstimate;
use App\Setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ManageEstimatesController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = 'app.menu.estimates';
        $this->pageIcon = 'ti-file';
        $this->middleware(function ($request, $next) {
            if(!in_array('estimates',$this->user->modules)){
                abort(403);
            }
            return $next($request);
        });

    }

    public function index() {
        return view('admin.estimates.index', $this->data);
    }

    public function create() {
        $this->clients = ClientDetails::all();
        $this->currencies = Currency::all();
        return view('admin.estimates.create', $this->data);
    }

    public function store(StoreEstimate $request)
    {
        $items = $request->input('item_name');
        $cost_per_item = $request->input('cost_per_item');
        $quantity = $request->input('quantity');
        $amount = $request->input('amount');
        $type = $request->input('type');

        if (trim($items[0]) == '' || trim($items[0]) == '' || trim($cost_per_item[0]) == '') {
            return Reply::error(__('messages.addItem'));
        }

        foreach ($quantity as $qty) {
            if (!is_numeric($qty)) {
                return Reply::error(__('messages.quantityNumber'));
            }
        }

        foreach ($cost_per_item as $rate) {
            if (!is_numeric($rate)) {
                return Reply::error(__('messages.unitPriceNumber'));
            }
        }

        foreach ($amount as $amt) {
            if (!is_numeric($amt)) {
                return Reply::error(__('messages.amountNumber'));
            }
        }

        foreach ($items as $itm) {
            if (is_null($itm)) {
                return Reply::error(__('messages.itemBlank'));
            }
        }


        $estimate = new Estimate();
        $estimate->client_id = $request->client_id;
        $estimate->valid_till = Carbon::parse($request->valid_till)->format('Y-m-d');
        $estimate->sub_total = round($request->sub_total,2);
        $estimate->total = round($request->total,2);
        $estimate->currency_id = $request->currency_id;
        $estimate->note = $request->note;
        $estimate->status = 'waiting';
        $estimate->save();

        // Notify client
        $notifyUser = User::withoutGlobalScope('active')->findOrFail($estimate->client_id);
        $notifyUser->notify(new NewEstimate($estimate));

        foreach ($items as $key => $item):
            if(!is_null($item)){
                EstimateItem::create(['estimate_id' => $estimate->id, 'item_name' => $item, 'type' => $type[$key], 'quantity' => $quantity[$key], 'unit_price' => round($cost_per_item[$key],2), 'amount' => round($amount[$key],2)]);
            }
        endforeach;

        $this->logSearchEntry($estimate->id, 'Estimate #'.$estimate->id, 'admin.estimates.edit');

        return Reply::redirect(route('admin.estimates.index', $estimate->id), __('messages.estimateCreated'));

    }

    public function edit($id) {
        $this->estimate = Estimate::findOrFail($id);
        $this->clients = ClientDetails::all();
        $this->currencies = Currency::all();
        return view('admin.estimates.edit', $this->data);
    }

    public function update(StoreEstimate $request, $id)
    {
        $items = $request->input('item_name');
        $cost_per_item = $request->input('cost_per_item');
        $quantity = $request->input('quantity');
        $amount = $request->input('amount');
        $type = $request->input('type');

        if (trim($items[0]) == '' || trim($items[0]) == '' || trim($cost_per_item[0]) == '') {
            return Reply::error(__('messages.addItem'));
        }

        foreach ($quantity as $qty) {
            if (!is_numeric($qty)) {
                return Reply::error(__('messages.quantityNumber'));
            }
        }

        foreach ($cost_per_item as $rate) {
            if (!is_numeric($rate)) {
                return Reply::error(__('messages.unitPriceNumber'));
            }
        }

        foreach ($amount as $amt) {
            if (!is_numeric($amt)) {
                return Reply::error(__('messages.amountNumber'));
            }
        }

        foreach ($items as $itm) {
            if (is_null($itm)) {
                return Reply::error(__('messages.itemBlank'));
            }
        }


        $estimate = Estimate::findOrFail($id);
        $estimate->client_id = $request->client_id;
        $estimate->valid_till = Carbon::parse($request->valid_till)->format('Y-m-d');
        $estimate->sub_total = round($request->sub_total,2);
        $estimate->total = round($request->total,2);
        $estimate->currency_id = $request->currency_id;
        $estimate->status = $request->status;
        $estimate->note = $request->note;
        $estimate->save();

        // Notify client
        $notifyUser = User::withoutGlobalScope('active')->findOrFail($estimate->client_id);
        $notifyUser->notify(new NewEstimate($estimate));

        // delete and create new
        EstimateItem::where('estimate_id', $estimate->id)->delete();

        foreach ($items as $key => $item):
            EstimateItem::create(['estimate_id' => $estimate->id, 'item_name' => $item, 'type' => $type[$key], 'quantity' => $quantity[$key], 'unit_price' => round($cost_per_item[$key],2), 'amount' => round($amount[$key],2)]);
        endforeach;

        return Reply::redirect(route('admin.estimates.index', $estimate->id), __('messages.estimateUpdated'));

    }

    public function data(Request $request) {

        $invoices = Estimate::join('users', 'estimates.client_id', '=', 'users.id')
            ->join('currencies', 'currencies.id', '=', 'estimates.currency_id')
            ->select('estimates.id', 'estimates.client_id', 'users.name', 'estimates.total', 'currencies.currency_symbol', 'estimates.status', 'estimates.valid_till');

        if($request->startDate !== null && $request->startDate != 'null' && $request->startDate != ''){
              $invoices = $invoices->where(DB::raw('DATE(estimates.`valid_till`)'), '>=', $request->startDate);
        }

        if($request->endDate !== null && $request->endDate != 'null' && $request->endDate != ''){
            $invoices = $invoices->where(DB::raw('DATE(estimates.`valid_till`)'), '<=', $request->endDate);
        }

        if($request->status != 'all' && !is_null($request->status)){
            $invoices = $invoices->where('estimates.status', '=', $request->status);
        }

        $invoices = $invoices->orderBy('estimates.id', 'desc')->get();

        return DataTables::of($invoices)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<div class="btn-group m-r-10">
                <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info btn-outline  dropdown-toggle waves-effect waves-light" type="button">Action <span class="caret"></span></button>
                <ul role="menu" class="dropdown-menu">
                  <li><a href="' . route("admin.estimates.download", $row->id) . '" ><i class="fa fa-download"></i> Download</a></li>
                  <li><a href="' . route("admin.estimates.edit", $row->id) . '" ><i class="fa fa-pencil"></i> Edit</a></li>
                  <li><a class="sa-params" href="javascript:;" data-estimate-id="' . $row->id . '"><i class="fa fa-times"></i> Delete</a></li>
                  <li><a href="'.route("admin.all-invoices.convert-estimate", $row->id) .'" ><i class="ti-receipt"></i> Create Invoice</a></li>
                </ul>
              </div>
              ';
            })
            ->editColumn('name', function ($row) {
                return '<a href="' . route('admin.clients.projects', $row->client_id) . '">' . ucwords($row->name) . '</a>';
            })
            ->editColumn('status', function ($row) {
                if($row->status == 'waiting'){
                    return '<label class="label label-warning">'.strtoupper($row->status).'</label>';
                }
                if($row->status == 'declined'){
                    return '<label class="label label-danger">'.strtoupper($row->status).'</label>';
                }else{
                    return '<label class="label label-success">'.strtoupper($row->status).'</label>';
                }
            })
            ->editColumn('total', function ($row) {
                return $row->currency_symbol . $row->total;
            })
            ->editColumn(
                'valid_till',
                function ($row) {
                    return Carbon::parse($row->valid_till)->format($this->global->date_format);
                }
            )
            ->rawColumns(['name', 'action', 'status'])
            ->removeColumn('currency_symbol')
            ->removeColumn('client_id')
            ->make(true);
    }

    public function destroy($id) {
        Estimate::destroy($id);
        return Reply::success(__('messages.estimateDeleted'));
    }


    public function download($id) {
//        header('Content-type: application/pdf');

        $this->estimate = Estimate::findOrFail($id);
        $this->discount = EstimateItem::where('type', 'discount')
            ->where('estimate_id', $this->estimate->id)
            ->sum('amount');
        $this->taxes = EstimateItem::where('type', 'tax')
            ->where('estimate_id', $this->estimate->id)
            ->get();

//        return $this->invoice->project->client->client[0]->address;
        $this->settings = $this->company;

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.estimates.estimate-pdf', $this->data);
        $filename = 'estimate-'.$this->estimate->id;
//        return $pdf->stream();
        return $pdf->download($filename . '.pdf');
    }

    public function export($startDate, $endDate, $status) {

        $invoices = Estimate::join('users', 'estimates.client_id', '=', 'users.id')
            ->join('currencies', 'currencies.id', '=', 'estimates.currency_id')
            ->select('estimates.id', 'users.name', 'estimates.total', 'currencies.currency_symbol', 'estimates.status', 'estimates.valid_till');

        if($startDate !== null && $startDate != 'null' && $startDate != ''){
            $invoices = $invoices->where(DB::raw('DATE(estimates.`valid_till`)'), '>=', $startDate);
        }

        if($endDate !== null && $endDate != 'null' && $endDate != ''){
            $invoices = $invoices->where(DB::raw('DATE(estimates.`valid_till`)'), '<=', $endDate);
        }

        if($status != 'all' && !is_null($status)){
            $invoices = $invoices->where('estimates.status', '=', $status);
        }

        $attributes =  ['total', 'currency_symbol', 'valid_till'];

        $invoices = $invoices->orderBy('estimates.id', 'desc')->get()->makeHidden($attributes);

        // Initialize the array which will be passed into the Excel
        // generator.
        $exportArray = [];

        // Define the Excel spreadsheet headers
        $exportArray[] = ['ID', 'Client','Status','Total', 'Valid Date'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($invoices as $row) {
            $exportArray[] = $row->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('estimate', function($excel) use ($exportArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Estimate');
            $excel->setCreator('Worksuite')->setCompany($this->companyName);
            $excel->setDescription('estimate file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function($sheet) use ($exportArray) {
                $sheet->fromArray($exportArray, null, 'A1', false, false);

                $sheet->row(1, function($row) {

                    // call row manipulation methods
                    $row->setFont(array(
                        'bold'       =>  true
                    ));

                });

            });

        })->download('xlsx');
    }

}
