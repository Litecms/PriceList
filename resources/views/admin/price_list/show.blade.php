    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('pricelist::price_list.name') !!}</a></li>
            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#pricelist-price_list-entry' data-href='{{guard_url('pricelist/price_list/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($price_list->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#pricelist-price_list-entry' data-href='{{ guard_url('pricelist/price_list') }}/{{$price_list->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#pricelist-price_list-entry' data-datatable='#pricelist-price_list-list' data-href='{{ guard_url('pricelist/price_list') }}/{{$price_list->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('pricelist-price_list-show')
        ->method('POST')
        ->files('true')
        ->action(guard_url('pricelist/price_list'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('pricelist::price_list.name') !!}  [{!! $price_list->title !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('pricelist::admin.price_list.partial.entry', ['mode' => 'show'])
                </div>
            </div>
        {!! Form::close() !!}
    </div>