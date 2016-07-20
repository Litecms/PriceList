
<section class="pricelist-wraper">
    <div class="container">
        <div class="row">
            @forelse($pricelists as $pricelist)
                <div class="col-sm-4">
                    <div class="single-pricing {!!($pricelist['smart_price'] == "Yes")?"active":""!!}">
                        <div class="pricing-header">
                        @if(@$pricelist['smart_price'] == "Yes")
                            <i class="fa fa-trophy" aria-hidden="true"></i>
                        @endif
                            <h5>{!!$pricelist['title']!!}</h5>
                            <h2 class="price">
                                <span class="currency">$</span>
                                <span class="value">{!!$pricelist['price']!!}</span>
                                <span class="duration">/ Mo</span>
                            </h2>
                        </div>
                        <div class="pricing-body">
                            <ul class="pricing-features">
                                <li>{!! $pricelist['sub_title'] !!}</li>
                                <li>{!! $pricelist['features'] !!}</li>
                                <li>{!! $pricelist['price'] !!}</li>
                            </ul>
                        </div>
                        <div class="pricing-footer text-center">
                        @if(@$pricelist['smart_price'] == "Yes")
                            <a href="#" class="btn btn-inverse btn-block">Select</a>
                        @else
                            <a href="#" class="btn btn-danger btn-block">Select</a>
                        @endif
                        </div>
                    </div>
                </div>
            @empty
            @endif
        </div>
    </div>
</section>
