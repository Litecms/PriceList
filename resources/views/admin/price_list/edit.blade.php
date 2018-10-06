    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#price_list" data-toggle="tab">{!! trans('pricelist::price_list.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#pricelist-price_list-edit'  data-load-to='#pricelist-price_list-entry' data-datatable='#pricelist-price_list-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#pricelist-price_list-entry' data-href='{{guard_url('pricelist/price_list')}}/{{$price_list->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('pricelist-price_list-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('pricelist/price_list/'. $price_list->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="price_list">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('pricelist::price_list.name') !!} [{!!$price_list->title!!}] </div>
                @include('pricelist::admin.price_list.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>