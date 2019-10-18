<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e($pageTitle); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('super-admin.dashboard')); ?>"><?php echo app('translator')->getFromJson('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('super-admin.companies.index')); ?>"><?php echo e($pageTitle); ?></a></li>
                <li class="active"><?php echo app('translator')->getFromJson('app.addNew'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"> Add Company Info</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">

                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'createCompany','class'=>'ajax-form','method'=>'POST', 'enctype' => 'multipart/form-data']); ?>

                            <div class="form-body">
                                <h3 class="box-title">Company Details</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company_name"><?php echo app('translator')->getFromJson('modules.accountSettings.companyName'); ?></label>
                                            <input type="text" class="form-control" id="company_name" name="company_name"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company_email"><?php echo app('translator')->getFromJson('modules.accountSettings.companyEmail'); ?></label>
                                            <input type="email" class="form-control" id="company_email" name="company_email"
                                                   value="">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company_phone"><?php echo app('translator')->getFromJson('modules.accountSettings.companyPhone'); ?></label>
                                            <input type="tel" class="form-control" id="company_phone" name="company_phone"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><?php echo app('translator')->getFromJson('modules.accountSettings.companyWebsite'); ?></label>
                                            <input type="text" class="form-control" id="website" name="website"
                                                   value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><?php echo app('translator')->getFromJson('modules.accountSettings.companyLogo'); ?></label>

                                            <div class="col-md-12">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail"
                                                         style="width: 200px; height: 150px;">

                                                            <img src="https://placeholdit.imgix.net/~text?txtsize=25&txt=<?php echo app('translator')->getFromJson('modules.accountSettings.uploadLogo'); ?>&w=200&h=150"
                                                                 alt=""/>
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                                         style="max-width: 200px; max-height: 150px;"></div>
                                                    <div>
                                <span class="btn btn-info btn-file">
                                    <span class="fileinput-new"> <?php echo app('translator')->getFromJson('app.selectImage'); ?> </span>
                                    <span class="fileinput-exists"> <?php echo app('translator')->getFromJson('app.change'); ?> </span>
                                    <input type="file" name="logo" id="logo"> </span>
                                                        <a href="javascript:;" class="btn btn-danger fileinput-exists"
                                                           data-dismiss="fileinput"> <?php echo app('translator')->getFromJson('app.remove'); ?> </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->getFromJson('app.status'); ?></label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.companyAddress'); ?></label>
                                            <textarea class="form-control" id="address" rows="5"
                                                      name="address"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.defaultCurrency'); ?></label>
                                            <select name="currency_id" id="currency_id" class="form-control">
                                                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($currency->id); ?>"><?php echo e($currency->currency_symbol.' ('.$currency->currency_code.')'); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.defaultTimezone'); ?></label>
                                            <select name="timezone" id="timezone" class="form-control select2">
                                                <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option><?php echo e($tz); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.changeLanguage'); ?></label>
                                            <select name="locale" id="locale" class="form-control select2">
                                                <option value="en">English
                                                </option>
                                                <?php $__currentLoopData = $languageSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($language->language_code); ?>"><?php echo e(isset($language->language_name) ? $language->language_name : ''); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            
                                            <label for="address"><?php echo app('translator')->getFromJson('modules.accountSettings.getLocation'); ?></label>
                                            
                                            <input type="hidden" id="latitude" name="latitude"
                                                   value="">
                                            <input type="hidden" id="longitude" name="longitude"
                                                   value="">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="gmap_geocoding_address">
                                        <div id="gmap_geocoding" class="gmaps" style="height: 300px"></div>
                                    </div>
                                </div>

                                <h3 class="box-title">Account Details</h3>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email"><?php echo app('translator')->getFromJson('modules.employees.employeeEmail'); ?></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email"><?php echo app('translator')->getFromJson('modules.employees.employeePassword'); ?></label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                   value="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" id="save-form" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.save'); ?></button>
                                <button type="reset" class="btn btn-default"><?php echo app('translator')->getFromJson('app.reset'); ?></button>
                            </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <?php
        $googleApiKey = ($global->google_map_key) ? $global->google_map_key : config('app.google_map_key');
    ?>

    <script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e($googleApiKey); ?>&libraries=places"></script>
    <script>
        $(".select2").select2({
            formatNoMatches: function () {
                return "<?php echo e(__('messages.noRecordFound')); ?>";
            }
        });

        $('#save-form').click(function () {

            $.easyAjax({
                url: '<?php echo e(route('super-admin.companies.store')); ?>',
                container: '#createCompany',
                type: "POST",
                redirect: true,
                file: true,
            });
        });
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

            // var clat = $('#latitude').val();
            // var clong = $('#longitude').val();
            var clat = 53.39929804;
            var clong = -6.34752274;

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
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.super-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>