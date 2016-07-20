@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('pricelist::pricelist.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('pricelist::pricelist.names') !!}</small>
@stop

@section('title')
{!! trans('pricelist::pricelist.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('pricelist::pricelist.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='pricelist-pricelist-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="pricelist-pricelist-list" class="table table-striped table-bordered data-table">
    <thead  class="list_head">
        <th>{!! trans('pricelist::pricelist.label.title')!!}</th>
        <th>{!! trans('pricelist::pricelist.label.price')!!}</th>

    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[title]')->raw()!!}</th>
        <th>{!! Form::text('search[price]')->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#pricelist-pricelist-entry', '{!!trans_url('admin/pricelist/pricelist/0')!!}');
    oTable = $('#pricelist-pricelist-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/pricelist/pricelist') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#pricelist-pricelist-list .search_bar input, #pricelist-pricelist-list .search_bar select').each(
                function(){
                    aoData.push( { 'name' : $(this).attr('name'), 'value' : $(this).val() } );
                }
            );
            app.dataTable(aoData);
            $.ajax({
                'dataType'  : 'json',
                'data'      : aoData,
                'type'      : 'GET',
                'url'       : sSource,
                'success'   : fnCallback
            });
        },

        "columns": [
            {data :'title'},
            {data :'price'},

        ],
        "pageLength": 25
    });

    $('#pricelist-pricelist-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#pricelist-pricelist-list').DataTable().row( this ).data();

        $('#pricelist-pricelist-entry').load('{!!trans_url('admin/pricelist/pricelist')!!}' + '/' + d.id);
    });

    $("#pricelist-pricelist-list .search_bar input, #pricelist-pricelist-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
});
</script>
@stop

@section('style')
@stop
