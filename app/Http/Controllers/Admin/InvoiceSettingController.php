<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Reply;
use App\Http\Requests\UpdateInvoiceSetting;
use App\InvoiceSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceSettingController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = 'app.menu.invoiceSettings';
        $this->pageIcon = 'icon-gear';
    }

    public function index() {
        $this->invoiceSetting = InvoiceSetting::first();
        return view('admin.invoice-settings.edit', $this->data);
    }

    public function update(UpdateInvoiceSetting $request) {
        $setting = InvoiceSetting::first();
        $setting->invoice_prefix = $request->invoice_prefix;
        $setting->template       = $request->template;
        $setting->due_after      = $request->due_after;
        $setting->invoice_terms  = $request->invoice_terms;
        $setting->gst_number     = $request->gst_number;
        $setting->show_gst       = $request->has('show_gst') ? 'yes' : 'no';
        $setting->save();

        return Reply::success(__('messages.settingsUpdated'));
    }
}
