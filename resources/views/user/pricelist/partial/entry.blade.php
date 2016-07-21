                {!! Form::hidden('upload_folder')!!}
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('title')
                       -> label(trans('pricelist::pricelist.label.title'))
                       -> placeholder(trans('pricelist::pricelist.placeholder.title'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('sub_title')
                       -> label(trans('pricelist::pricelist.label.sub_title'))
                       -> placeholder(trans('pricelist::pricelist.placeholder.sub_title'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('features')
                       -> label(trans('pricelist::pricelist.label.features'))
                       -> placeholder(trans('pricelist::pricelist.placeholder.features'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('price')
                       -> label(trans('pricelist::pricelist.label.price'))
                       -> placeholder(trans('pricelist::pricelist.placeholder.price'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('type')
                       -> label(trans('pricelist::pricelist.label.type'))
                       -> placeholder(trans('pricelist::pricelist.placeholder.type'))!!}
                </div>

                <div class='col-md-6 col-sm-6'>
                 {!! Form::hidden('smart_price')
                ->forceValue('No')!!}
                {!! Form::checkbox('smart_price')
                ->forceValue('Yes')
                ->inline()!!}
                </div>
                <!-- <div class="checkbox checkbox-danger">
                   <input id="checkbox-signup" type="checkbox">
                   <label for="checkbox-signup">Remember me</label>
               </div> -->

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('image')
                       -> label(trans('pricelist::pricelist.label.image'))
                       -> placeholder(trans('pricelist::pricelist.placeholder.image'))!!}
                </div>

{!!   Form::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset')
!!}
