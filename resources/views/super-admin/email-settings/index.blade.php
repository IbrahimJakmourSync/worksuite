@extends('layouts.super-admin')

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
                <li><a href="{{ route('super-admin.dashboard') }}">@lang('app.menu.home')</a></li>
                <li class="active">{{ __($pageTitle) }}</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')
<link rel="stylesheet" href="{{ asset('plugins/bower_components/switchery/dist/switchery.min.css') }}">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">{{ __($pageTitle) }}</div>

                <div class="vtabs customvtab m-t-10">
                    @include('sections.super_admin_setting_menu')

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-12">

                                    <h3 class="box-title m-b-0">@lang("modules.emailSettings.notificationTitle")</h3>

                                    <p class="text-muted m-b-10 font-13">
                                        @lang("modules.emailSettings.notificationSubtitle")
                                    </p>


                                            {!! Form::open(['id'=>'updateSettings','class'=>'ajax-form','method'=>'put']) !!}
                                            {!! Form::hidden('_token', csrf_token()) !!}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                        <div class="form-group">
                                                            <label>@lang("modules.emailSettings.mailDriver")</label>
                                                            <select class="form-control" name="mail_driver"
                                                                    id="mail_driver">
                                                                <option @if($smtpSetting->mail_driver == 'smtp') selected @endif>
                                                                    smtp
                                                                </option>
                                                                <option @if($smtpSetting->mail_driver == 'mail') selected @endif>
                                                                    mail
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>@lang("modules.emailSettings.mailHost")</label>
                                                            <input type="text" name="mail_host" id="mail_host"
                                                                   class="form-control"
                                                                   value="{{ $smtpSetting->mail_host }}">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>@lang("modules.emailSettings.mailPort")</label>
                                                            <input type="text" name="mail_port" id="mail_port"
                                                                   class="form-control"
                                                                   value="{{ $smtpSetting->mail_port }}">
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>@lang("modules.emailSettings.mailUsername")</label>
                                                            <input type="text" name="mail_username" id="mail_username"
                                                                   class="form-control"
                                                                   value="{{ $smtpSetting->mail_username }}">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">@lang("modules.emailSettings.mailPassword")</label>
                                                            <input type="password" name="mail_password"
                                                                   id="mail_password"
                                                                   class="form-control"
                                                                   value="{{ $smtpSetting->mail_password }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">@lang("modules.emailSettings.mailFrom")</label>
                                                            <input type="text" name="mail_from_name" id="mail_from_name"
                                                                   class="form-control"
                                                                   value="{{ $smtpSetting->mail_from_name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">@lang("modules.emailSettings.mailFromEmail")</label>
                                                            <input type="text" name="mail_from_email" id="mail_from_email"
                                                                   class="form-control"
                                                                   value="{{ $smtpSetting->mail_from_email }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">@lang("modules.emailSettings.mailEncryption")</label>
                                                            <select class="form-control" name="mail_encryption"
                                                                    id="mail_encryption">
                                                                <option @if($smtpSetting->mail_encryption == 'tls') selected @endif>
                                                                    tls
                                                                </option>
                                                                <option @if($smtpSetting->mail_encryption == 'ssl') selected @endif>
                                                                    ssl
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->


                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" id="save-form" class="btn btn-success"><i
                                                            class="fa fa-check"></i>
                                                    @lang('app.update')
                                                </button>
                                                <button type="button" id="send-test-email" class="btn btn-primary">@lang('modules.emailSettings.sendTestEmail')</button>
                                                <button type="reset" class="btn btn-default">@lang('app.reset')</button>
                                            </div>
                                            {!! Form::close() !!}

                                </div>
                                <!-- .row -->

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <!-- .row -->


        @endsection

        @push('footer-script')
        <script src="{{ asset('plugins/bower_components/switchery/dist/switchery.min.js') }}"></script>
        <script>
            $('#save-form').click(function () {

                var url = '{{route('super-admin.email-settings.update', $smtpSetting->id)}}';

                $.easyAjax({
                    url: url,
                    type: "POST",
                    container: '#updateSettings',
                    data: $('#updateSettings').serialize()
                })
            });

            $('#send-test-email').click(function () {

                var url = '{{route('super-admin.email-settings.sendTestEmail')}}';

                $.easyAjax({
                    url: url,
                    type: "GET",
                    success: function (response) {

                    }
                })
            });
        </script>
    @endpush