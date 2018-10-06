            <div class='row'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('title')
                       -> label(trans('pricelist::price_list.label.title'))
                       -> placeholder(trans('pricelist::price_list.placeholder.title'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('sub_title')
                       -> label(trans('pricelist::price_list.label.sub_title'))
                       -> placeholder(trans('pricelist::price_list.placeholder.sub_title'))!!}
                </div>
                 <div class='col-md-4 col-sm-6'>
                       {!! Form::decimal('price')
                       -> label(trans('pricelist::price_list.label.price'))
                       -> placeholder(trans('pricelist::price_list.placeholder.price'))!!}
                </div>

                <div class='col-md-12 col-sm-6'>
                       {!! Form::textarea('features')
                       ->row(5)
                       -> label(trans('pricelist::price_list.label.features'))
                       -> addClass('html-editor')
                       -> placeholder(trans('pricelist::price_list.placeholder.features'))!!}
                </div>

               

                <div class='col-md-4 col-sm-6'>
                   {!! Form::inline_radios('type')
                   ->style('margin-left:-15px;')
                   -> radios(trans('pricelist::price_list.options.type'))
                   -> label(trans('pricelist::price_list.label.type'))!!}
                </div>
                <div class='col-md-4 col-sm-6'>
                   {!! Form::inline_radios('status')
                    ->style('margin-left:-15px;')
                   -> radios(trans('pricelist::price_list.options.status'))
                   -> label(trans('pricelist::price_list.label.status'))!!}
                </div>

                <div class='col-md-12 col-sm-12'>
                    <div class="form-group">
                        <label for="image" class="control-label col-lg-12 col-sm-12 text-left"> {{trans('pricelist::price_list.label.image') }}
                        </label>
                        <div class='col-lg-3 col-sm-12'>
                            {!! $price_list->files('image')
                            ->url($price_list->getUploadUrl('image'))
                            ->mime(config('filer.image_extensions'))
                            ->dropzone()!!}
                        </div>
                        <div class='col-lg-7 col-sm-12'>
                        {!! $price_list->files('image')
                        ->editor()!!}
                        </div>
                    </div>
                </div>
               
            </div>