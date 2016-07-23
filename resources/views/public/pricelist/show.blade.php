<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $pricelist['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('pricelists') }}" class="btn btn-default pull-right"> Back</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="title">
                    {!! trans('pricelist::pricelist.label.title') !!}
                </label><br />
                    {!! $pricelist['title'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="sub_title">
                    {!! trans('pricelist::pricelist.label.sub_title') !!}
                </label><br />
                    {!! $pricelist['sub_title'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="features">
                    {!! trans('pricelist::pricelist.label.features') !!}
                </label><br />
                    {!! $pricelist['features'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="price">
                    {!! trans('pricelist::pricelist.label.price') !!}
                </label><br />
                    {!! $pricelist['price'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="type">
                    {!! trans('pricelist::pricelist.label.type') !!}
                </label><br />
                    {!! $pricelist['type'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="image">
                    {!! trans('pricelist::pricelist.label.image') !!}
                </label><br />
                    {!! $pricelist['image'] !!}
            </div>
        </div>
    </div>
            </div>
        </div>
        <div class="col-md-4">
            @include('pricelist::public.pricelist.aside')
        </div>

    </div>
</div>
