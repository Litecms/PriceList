<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">  {!! trans('pricelist::price_list.names') !!} [{!! trans('pricelist::price_list.text.preview') !!}]</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm"  data-action='NEW' data-load-to='#pricelist-price_list-entry' data-href='{!!guard_url('pricelist/price_list/create')!!}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }} </button>
        </div>
    </div>
</div>