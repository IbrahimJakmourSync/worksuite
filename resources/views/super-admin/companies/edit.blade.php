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
                <li><a href="{{ route('super-admin.companies.index') }}">{{ __($pageTitle) }}</a></li>
                <li class="active">@lang('app.edit')</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')
    <link rel="stylesheet" href="{{ asset('plugins/bower_components/custom-select/custom-select.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css') }}">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading">Update Company Info</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        {!! Form::open(['id'=>'updateCompany','class'=>'ajax-form','method'=>'PUT', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_name">@lang('modules.accountSettings.companyName')</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name"
                                               value="{{ $company->company_name or '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_email">@lang('modules.accountSettings.companyEmail')</label>
                                        <input type="email" class="form-control" id="company_email" name="company_email"
                                               value="{{ $company->company_email or '' }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_phone">@lang('modules.accountSettings.companyPhone')</label>
                                        <input type="tel" class="form-control" id="company_phone" name="company_phone"
                                               value="{{ $company->company_phone or '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">@lang('modules.accountSettings.companyWebsite')</label>
                                        <input type="text" class="form-control" id="website" name="website"
                                               value="{{ $company->website or '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">@lang('modules.accountSettings.companyLogo')</label>

                                        <div class="col-md-12">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"
                                                     style="width: 200px; height: 150px;">
                                                    @if(is_null($company->logo))
                                                        <img src="https://placeholdit.imgix.net/~text?txtsize=25&txt=@lang('modules.accountSettings.uploadLogo')&w=200&h=150"
                                                             alt=""/>
                                                    @else
                                                        <img src="{{ asset('user-uploads/app-logo/'.$company->logo) }}"
                                                             alt=""/>
                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                     style="max-width: 200px; max-height: 150px;"></div>
                                                <div>
                                <span class="btn btn-info btn-file">
                                    <span class="fileinput-new"> @lang('app.selectImage') </span>
                                    <span class="fileinput-exists"> @lang('app.change') </span>
                                    <input type="file" name="logo" id="logo"> </span>
                                                    <a href="javascript:;" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput"> @lang('app.remove') </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>@lang('app.status')</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="active" @if($company->status == 'active') selected @endif>Active</option>
                                            <option value="inactive" @if($company->status == 'inactive') selected @endif>Inactive</option>
                                            <option value="license_expired" @if($company->status == 'license_expired') selected @endif>License Expired</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">@lang('modules.accountSettings.companyAddress')</label>
                                        <textarea class="form-control" id="address" rows="5"
                                                  name="address">{{ $company->address or '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">@lang('modules.accountSettings.defaultCurrency')</label>
                                        <select name="currency_id" id="currency_id" class="form-control">
                                            @foreach($currencies as $currency)
                                                <option
                                                        @if($currency->id == $company->currency_id) selected @endif
                                                value="{{ $currency->id }}">{{ $currency->currency_symbol.' ('.$currency->currency_code.')' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">@lang('modules.accountSettings.defaultTimezone')</label>
                                        <select name="timezone" id="timezone" class="form-control select2">
                                            @foreach($timezones as $tz)
                                                <option @if($company->timezone == $tz) selected @endif>{{ $tz }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">@lang('modules.accountSettings.changeLanguage')</label>
                                        <select name="locale" id="locale" class="form-control select2">
                                            <option @if($company->locale == "en") selected @endif value="en">English
                                            </option>
                                            @foreach($languageSettings as $language)
                                                <option value="{{ $language->language_code }}" @if($company->locale == $language->language_code) selected @endif >{{ $language->language_name or '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">@lang('modules.accountSettings.getLocation')</label>

                                        <input type="text" class="form-control" id="gmap_geocoding_address">
                                        <input type="hidden" id="latitude" name="latitude"
                                               value="{{ $company->latitude or ''}}">
                                        <input type="hidden" id="longitude" name="longitude"
                                               value="{{ $company->longitude or '' }}">

                                        <div id="gmap_geocoding" class="gmaps"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" id="save-form" class="btn btn-success"> <i class="fa fa-check"></i> @lang('app.update')</button>
                            <a href="{{ route('super-admin.companies.index') }}" class="btn btn-default">@lang('app.back')</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

@endsection

@push('footer-script')
    @php
        $googleApiKey = ($global->google_map_key) ? $global->google_map_key : env('GOOGLE_MAP_KEY');
    @endphp

    <script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{$googleApiKey}}&libraries=places"></script>
    <script>
        $('#save-form').click(function () {
            $.easyAjax({
                url: '{{route('super-admin.companies.update', [$company->id])}}',
                container: '#updateCompany',
                type: "POST",
                redirect: true,
                file: true
            })
        });

        $(".select2").select2({
            formatNoMatches: function () {
                return "{{ __('messages.noRecordFound') }}";
            }
        });

        $(document).ready(function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
                $("#locationMsg").html('');
            }
        });

        function showPosition(position) {
            $('#latitude').val(position.coords.latitude);
            $('#longitude').val(position.coords.longitude);
            initialize();
            $('body').unblock();
        }
    </script>


    <script>
    //Get Latitude And Longitude
    var geocoder = new google.maps.Geocoder();

    function geocodePosition(pos) {
        geocoder.geocode(
            {
                latLng: pos
            }, function (responses) {
                if (responses && responses.length > 0) {
                    updateMarkerAddress(responses[0].formatted_address);
                } else {
                    updateMarkerAddress('Cannot determine address at this location.');
                }
            });
    }

    function updateMarkerStatus(str) {
        //document.getElementById('markerStatus').innerHTML = str;
    }

    function updateMarkerPosition(latLng) {
        $('#latitude').val(latLng.lat());
        $('#longitude').val(latLng.lng());
    }

    function updateMarkerAddress(str) {

        //  $('#currentlocation').val(str);

    }

    function initialize() {
        //Latitude longitude of default

        var clat = $('#latitude').val();
        var clong = $('#longitude').val();

        clat = parseFloat(clat);
        clong = parseFloat(clong);

        var latLng = new google.maps.LatLng(clat, clong);

        var mapOptions = {
            center: latLng,
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById('gmap_geocoding'),
            mapOptions);

        var input = document.getElementById('gmap_geocoding_address');

        var autocomplete = new google.maps.places.Autocomplete(input);

        //autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        marker = new google.maps.Marker({
            map: map,
            position: latLng,
            title: 'ReferSell',
            map: map,
            draggable: true
        });
        updateMarkerPosition(latLng);
        geocodePosition(latLng);

        // Add dragging event listeners.
        google.maps.event.addListener(marker, 'dragstart', function () {
            updateMarkerAddress('Dragging...');
        });

        google.maps.event.addListener(marker, 'drag', function () {
            updateMarkerStatus('Dragging...');
            updateMarkerPosition(marker.getPosition());
        });

        google.maps.event.addListener(marker, 'dragend', function () {

            updateMarkerStatus('Drag ended');
            geocodePosition(marker.getPosition());
        });
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            infowindow.close();
            var place = autocomplete.getPlace();

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(10);  // Why 17? Because it looks good.
            }

            /* var image = new google.maps.MarkerImage(
             place.icon,
             new google.maps.Size(71, 71),
             new google.maps.Point(0, 0),
             new google.maps.Point(17, 34),
             new google.maps.Size(35, 35));
             marker.setIcon(image);*/
            marker.setPosition(place.geometry.location);
            updateMarkerPosition(place.geometry.location);

            var address = '';

        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
            var radioButton = document.getElementById(id);
            google.maps.event.addDomListener(radioButton, 'click', function () {
                autocomplete.setTypes(types);
            });
        }

    }

    $('#gmap_geocoding_address').keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });


    initialize();

</script>
@endpush
