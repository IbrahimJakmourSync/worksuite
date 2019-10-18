<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Company;
use App\Currency;
use App\Helper\Reply;

use App\Http\Requests\SuperAdmin\Companies\DeleteRequest;
use App\Http\Requests\SuperAdmin\Companies\StoreRequest;
use App\Http\Requests\SuperAdmin\Companies\UpdateRequest;

use App\PaypalInvoice;
use App\StripeInvoice;
use App\Traits\CurrencyExchange;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SuperAdminInvoiceController extends SuperAdminBaseController
{
    /**
     * SuperAdminInvoiceController constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->pageTitle = 'Invoices';
        $this->pageIcon = 'icon-layers';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $stripeInvoices = StripeInvoice::count();
        $PaypalInvoices = PaypalInvoice::count();
        $this->totalInvoices = ($stripeInvoices + $PaypalInvoices);
        return view('super-admin.invoices.index', $this->data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, $id)
    {
        Company::destroy($id);
        return Reply::success('Company deleted successfully.');
    }

    /**
     * @return mixed
     */
    public function data()
    {
        $stripe = DB::table("stripe_invoices")
            ->join('packages', 'packages.id', 'stripe_invoices.package_id')
            ->join('companies', 'companies.id', 'stripe_invoices.company_id')
            ->selectRaw('stripe_invoices.id ,companies.company_name as company, 
            packages.name as package, stripe_invoices.transaction_id, "Stripe" as method,stripe_invoices.amount, 
            stripe_invoices.pay_date as paid_on ,stripe_invoices.next_pay_date')
            ->whereNotNull('stripe_invoices.pay_date');

        $paypal = DB::table("paypal_invoices")
            ->join('packages', 'packages.id', 'paypal_invoices.package_id')
            ->join('companies', 'companies.id', 'paypal_invoices.company_id')
            ->selectRaw('paypal_invoices.id, companies.company_name as company, 
                packages.name as package, paypal_invoices.transaction_id,
             "Paypal" as method , paypal_invoices.total as amount, paypal_invoices.paid_on,
             paypal_invoices.next_pay_date')
            ->where('paypal_invoices.status', 'paid')
            ->union($stripe)
            ->get()->sortByDesc('paid_on');



        return Datatables::of($paypal)

            ->editColumn('company', function ($row) {
                    return ucfirst($row->company);
            })
            ->editColumn('package', function ($row) {
                return ucfirst($row->package);
            })
            ->editColumn('paid_on', function ($row) {
                if(!is_null($row->paid_on)) {
                    return Carbon::parse($row->paid_on)->format('d-m-Y');
                }
                return '-';
            })
            ->editColumn('next_pay_date', function ($row) {
                if(!is_null($row->next_pay_date)) {
                    return Carbon::parse($row->next_pay_date)->format('d-m-Y');
                }
                return '-';
            })
            ->editColumn('transaction_id', function ($row) {
                if(!is_null($row->transaction_id)) {
                    return $row->transaction_id;
                }
                return '-';
            })
            ->make(true);
    }

}
