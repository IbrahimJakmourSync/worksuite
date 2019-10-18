<section class="section" id="section-pricing">
    <div class="container">

        <header class="section-header">
            <h2>{{ $detail->price_title }}</h2>
            <hr>
            <p class="lead">{{ $detail->price_description }}</p>
        </header>


        <div class="text-center mb-70">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-round btn-outline btn-dark w-150 active">
                    <input type="radio" onchange="planShow('monthly')" name="pricing" value="monthly" autocomplete="off" checked> Monthly
                </label>
                <label class="btn btn-round btn-outline btn-dark w-150">
                    <input type="radio" onchange="planShow('yearly')" name="pricing" value="yearly" autocomplete="off"> Yearly
                </label>
            </div>
        </div>


        <div id="monthlyPlan" class="row gap-y text-center">
            @php $color = ''; @endphp @php $btn = 'btn-primary'; @endphp
            @forelse($packages as $package)

                <div class="col-12 col-md-4">
                    <div class="pricing-1">
                        <p class="plan-name">{{ $package->name }}</p>
                        <br>
                        <h2 class="price {{ $color }}">
                            @if($package->monthly_price != 0) <span class="price-unit">{{ $global->currency->currency_symbol }}</span> @endif
                            @if($package->monthly_price == 0) free @else {{ $package->monthly_price }} @endif
                        </h2>

                        <p><small class="opacity-50">{{ $package->description }}</small></p>

                        <small>Max employees {{ $package->max_employees }}</small><br>
                        <br>
                        <p class="text-center py-3"><a class="btn {{ $btn }}" href="{{ route('front.signup.index') }}">Register</a></p>
                    </div>
                </div>
                @if($color == '')
                    @php $color = 'text-success';$btn = 'btn-success'; @endphp
                @else
                    @php $color = ''; $btn = 'btn-primary'; @endphp
                @endif
            @empty

            @endforelse
        </div>
        <div class="row gap-y text-center" style="display: none" id="annualPlan">

            @forelse($packages as $package)
                <div class="col-12 col-md-4">
                    <div class="pricing-1">
                        <p class="plan-name">{{ $package->name }}</p>
                        <br>
                        <h2 class="price {{ $color }}">
                            @if($package->annual_price != 0) <span class="price-unit">{{ $global->currency->currency_symbol }}</span> @endif
                            @if($package->annual_price == 0) free @else {{ $package->annual_price }} @endif
                        </h2>

                        <p><small class="opacity-50">{{ $package->description }}</small></p>

                        <small>Max employees {{ $package->max_employees }}</small><br>
                        <br>
                        <p class="text-center py-3"><a class="btn {{ $btn }}" href="{{ route('front.signup.index') }}">Register</a></p>
                    </div>
                </div>
                @if($color == '')
                    @php $color = 'text-success';$btn = 'btn-success'; @endphp
                @else
                    @php $color = ''; $btn = 'btn-primary'; @endphp
                @endif
            @empty

            @endforelse


        </div>


    </div>
</section>