@extends('layouts.app')

@section('page-title')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="{{ $pageIcon }}"></i> {{ __($pageTitle) }}</h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}">@lang('app.menu.home')</a></li>
                <li class="active">{{ __($pageTitle) }}</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')
<link rel="stylesheet" href="{{ asset('image-picker/image-picker.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bower_components/switchery/dist/switchery.min.css') }}">

@endpush

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">@lang('modules.invoiceSettings.updateTitle')</div>

                <div class="vtabs customvtab m-t-10">
                    @include('sections.admin_setting_menu')

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">

                                        {!! Form::open(['id'=>'editSettings','class'=>'ajax-form','method'=>'PUT']) !!}
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="invoice_prefix">@lang('modules.invoiceSettings.invoicePrefix')</label>
                                                    <input type="text" class="form-control" id="invoice_prefix" name="invoice_prefix"
                                                           value="{{ $invoiceSetting->invoice_prefix }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="template">@lang('modules.invoiceSettings.template')</label>
                                                    <select name="template" class="image-picker show-labels show-html">
                                                        <option data-img-src="{{ asset('invoice-template/1.png') }}"
                                                                @if($invoiceSetting->template == 'invoice-1') selected @endif
                                                                value="invoice-1">Template
                                                            1
                                                        </option>
                                                        <option data-img-src="{{ asset('invoice-template/2.png') }}"
                                                                @if($invoiceSetting->template == 'invoice-2') selected @endif
                                                                value="invoice-2">Template
                                                            2
                                                        </option>
                                                        <option data-img-src="{{ asset('invoice-template/3.png') }}"
                                                                @if($invoiceSetting->template == 'invoice-3') selected @endif
                                                                value="invoice-3">Template
                                                            3
                                                        </option>
                                                        <option data-img-src="{{ asset('invoice-template/4.png') }}"
                                                                @if($invoiceSetting->template == 'invoice-4') selected @endif
                                                                value="invoice-4">Template
                                                            4
                                                        </option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="due_after">@lang('modules.invoiceSettings.dueAfter')</label>

                                                    <div class="input-group m-t-10">
                                                        <input type="number" id="due_after" name="due_after" class="form-control" value="{{ $invoiceSetting->due_after }}">
                                                        <span class="input-group-addon">@lang('app.days')</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="gst_number">@lang('app.gstNumber')</label>
                                                    <input type="text" id="gst_number" name="gst_number" class="form-control" value="{{ $invoiceSetting->gst_number }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label" >@lang('app.showGst')</label>
                                                    <div class="switchery-demo">
                                                        <input type="checkbox" name="show_gst" @if($invoiceSetting->show_gst == 'yes') checked @endif class="js-switch " data-color="#99d683"  />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="invoice_terms">@lang('modules.invoiceSettings.invoiceTerms')</label>
                            <textarea name="invoice_terms" id="invoice_terms" class="form-control"
                                      rows="4">{{ $invoiceSetting->invoice_terms }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <button type="submit" id="save-form" class="btn btn-success waves-effect waves-light m-r-10">
                                                    @lang('app.update')
                                                </button>
                                                <button type="reset"
                                                        class="btn btn-inverse waves-effect waves-light">@lang('app.reset')</button>
                                            </div>

                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- .row -->



    <!-- .row -->

@endsection

@push('footer-script')
<script src="{{ asset('image-picker/image-picker.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/switchery/dist/switchery.min.js') }}"></script>


<script>
    $(".image-picker").imagepicker();
    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function () {
        new Switchery($(this)[0], $(this).data());

    });
    $('#save-form').click(function () {
        $.easyAjax({
            url: '{{route('admin.invoice-settings.update', $invoiceSetting->id)}}',
            container: '#editSettings',
            type: "POST",
            redirect: true,
            data: $('#editSettings').serialize()
        })
    });
</script>
@endpush

