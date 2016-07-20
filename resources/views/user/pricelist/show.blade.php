@include('public::notifications')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-dark  header-title m-t-0"> Details of {!! $pricelist['name'] !!} </h4>
        </div>
        <div class="col-md-6">
            <div class='pull-right'>
                <a href="{{ trans_url('/user/pricelist/pricelist') }}" class="btn btn-default"> {{ trans('cms.back')  }}</a>
                <a href="{{ trans_url('/user/pricelist/pricelist') }}/{{ pricelist->getRouteKey() }}/edit" class="btn btn-success"> {{ trans('cms.edit')  }}</a>
                <a href="{{ trans_url('/user/pricelist/pricelist') }}/{{ pricelist->getRouteKey() }}/copy" class="btn btn-warning"> {{ trans('cms.copy')  }}</a>
                <a href="{{ trans_url('/user/pricelist/pricelist') }}/{{ pricelist->getRouteKey() }}/delete" class="btn btn-danger"> {{ trans('cms.delete')  }}</a>
            </div>
        </div>
    </div>
    <p class="text-muted m-b-25 font-13">
        Your awesome text goes here.
    </p>
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