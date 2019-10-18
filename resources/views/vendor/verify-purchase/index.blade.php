<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    </head>
    <body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="mt-5">Verify Your Purchase</h1>
                <p style="padding: 5px" class="bg-primary">For Domain:- {{ $_SERVER['SERVER_NAME'] }}</p>

                <p style="margin: 20px 0">
                    <span class="label label-warning">ALERT</span>
                    Contact your admin if you are not the admin to verify the purchase.

                </p>

                <p style="margin: 20px 0">
                    <span class="label label-danger">NOTE</span>
                    Click <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">this link</a> to find your purchase code

                </p>

                <div id="response-message"></div>

                <form action="" id="verify-form" onsubmit="return validateCode();">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Enter your envato purchase code</label>
                                    <input type="text" id="purchase-code" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button class="btn btn-success" type="button" id="verify-purchase">Verify</button>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <script>

        const envatoVerify = (purchaseCode) => {
            $.post( "https://worksuite.biz/verify-purchase/verify-envato-purchase.php", { purchaseCode: purchaseCode, domain: "{{ $_SERVER['SERVER_NAME'] }}", itemId: "{{ config('app.envato_item_id') }}", is_ajax: 1, appUrl: '{{ url()->full() }}' })
                .done(function( data ) {
                    data = $.parseJSON(data);
                    // console.log(data.status);
                    // console.log(data.message);
                    if(data.status === 'success'){
                        $.post( "{{ route('purchase-verified') }}", { purchaseCode: purchaseCode, domain: "{{ $_SERVER['SERVER_NAME'] }}",_token: '{{ csrf_token() }}' });
                        $('#response-message').html('<p class="bg-success" style="padding: 10px 5px; margin: 10px 0;">'+data.message+' <a href="{{ \Illuminate\Support\Facades\URL::previous() }}">Click to go back</a></p>');

                    }
                    else{
                        $('#response-message').html('<p class="bg-danger" style="padding: 10px 5px; margin: 10px 0;">'+data.message+'</p>');
                    }
                });
        };

        const validateCode = () => {
            let purchaseCode = $('#purchase-code').val();
            if(purchaseCode != ''){
                envatoVerify(purchaseCode); //c895fde5-6f86-4e97-b5e2-650950383b82
            }
            else{
                alert('Enter purchase code');
            }
            return false;
        };

        $('#verify-purchase').click(function () {
            validateCode();
        });


    </script>

    </body>
</html>