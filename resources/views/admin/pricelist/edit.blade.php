<div class="box-header with-border">
    <h3 class="box-title"> Edit  {!! trans('pricelist::pricelist.name') !!} [{!!$pricelist->name!!}] </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#pricelist-pricelist-edit'  data-load-to='#pricelist-pricelist-entry' data-datatable='#pricelist-pricelist-list'><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#pricelist-pricelist-entry' data-href='{{trans_url('admin/pricelist/pricelist')}}/{{$pricelist->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('cms.cancel') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#pricelist" data-toggle="tab">{!! trans('pricelist::pricelist.tab.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('pricelist-pricelist-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(trans_url('admin/pricelist/pricelist/'. $pricelist->getRouteKey()))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="pricelist">
                @include('pricelist::admin.pricelist.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>