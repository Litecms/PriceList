<div class='col-md-3 col-sm-6'>
       {!! Form::text('title')
       -> label(trans('pricelist::pricelist.label.title'))
       -> placeholder(trans('pricelist::pricelist.placeholder.title'))
       ->required()!!}
</div>

<div class='col-md-3 col-sm-6'>
       {!! Form::text('sub_title')
       -> label(trans('pricelist::pricelist.label.sub_title'))
       -> placeholder(trans('pricelist::pricelist.placeholder.sub_title'))!!}
</div>

<div class='col-md-3 col-sm-6'>
       {!! Form::number('price')
       -> min(0)
       -> label(trans('pricelist::pricelist.label.price'))
       -> placeholder(trans('pricelist::pricelist.placeholder.price'))
       -> required()!!}
</div>

<div class='col-md-3 col-sm-6'>
  <label>{!!trans('pricelist::pricelist.label.smart_price')!!}</label>
  {!! Form::hidden('smart_price','')
  ->forceValue('No')!!}
  {!! Form::checkbox('smart_price','')
  ->forceValue('Yes')
  ->inline()!!}
</div>


<div class='col-md-12 col-sm-12'>
       {!! Form::textArea('features')
       -> addClass('html-editor')
       -> label(trans('pricelist::pricelist.label.features'))
       -> placeholder(trans('pricelist::pricelist.placeholder.features'))
       ->required()!!}
</div>

<div class='col-md-6 col-sm-12'>
      <label>Image</label>
      {!!$pricelist->fileUpload('image')!!}
      {!!$pricelist->fileEdit('image') !!}
</div>

</div>



<style>
.checkbox input[type="checkbox"] {
    opacity: 1;
}
input[type=checkbox] {
  margin-left: 10px;
}
</style>
