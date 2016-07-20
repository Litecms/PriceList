<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.new') }}  {!! trans('pricelist::pricelist.name') !!} </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#pricelist-pricelist-create'  data-load-to='#pricelist-pricelist-entry' data-datatable='#pricelist-pricelist-list'><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#pricelist-pricelist-entry' data-href='{{trans_url('admin/pricelist/pricelist/0')}}'><i class="fa fa-times-circle"></i> {{ trans('cms.close') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">PriceList</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('pricelist-pricelist-create')
        ->method('POST')
        ->files('true')
        ->action(trans_url('admin/pricelist/pricelist'))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="details">
                @include('pricelist::admin.pricelist.partial.entry')
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>