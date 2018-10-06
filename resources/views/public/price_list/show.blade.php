            @include('pricelist::public.price_list.partial.header')

            <section class="single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            @include('pricelist::public.price_list.partial.aside')
                        </div>
                        <div class="col-md-9 ">
                            <div class="area">
                                <div class="item">
                                    <div class="feature">
                                        <img class="img-responsive center-block" src="{!!url($price_list->defaultImage('images' , 'xl'))!!}" alt="{{$price_list->title}}">
                                    </div>
                                    <div class="content">
                                        <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="id">
                    {!! trans('pricelist::price_list.label.id') !!}
                </label><br />
                    {!! $price_list['id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="title">
                    {!! trans('pricelist::price_list.label.title') !!}
                </label><br />
                    {!! $price_list['title'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="sub_title">
                    {!! trans('pricelist::price_list.label.sub_title') !!}
                </label><br />
                    {!! $price_list['sub_title'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="features">
                    {!! trans('pricelist::price_list.label.features') !!}
                </label><br />
                    {!! $price_list['features'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="price">
                    {!! trans('pricelist::price_list.label.price') !!}
                </label><br />
                    {!! $price_list['price'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="type">
                    {!! trans('pricelist::price_list.label.type') !!}
                </label><br />
                    {!! $price_list['type'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="image">
                    {!! trans('pricelist::price_list.label.image') !!}
                </label><br />
                    {!! $price_list['image'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="slug">
                    {!! trans('pricelist::price_list.label.slug') !!}
                </label><br />
                    {!! $price_list['slug'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="status">
                    {!! trans('pricelist::price_list.label.status') !!}
                </label><br />
                    {!! $price_list['status'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_id">
                    {!! trans('pricelist::price_list.label.user_id') !!}
                </label><br />
                    {!! $price_list['user_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_type">
                    {!! trans('pricelist::price_list.label.user_type') !!}
                </label><br />
                    {!! $price_list['user_type'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="upload_folder">
                    {!! trans('pricelist::price_list.label.upload_folder') !!}
                </label><br />
                    {!! $price_list['upload_folder'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="deleted_at">
                    {!! trans('pricelist::price_list.label.deleted_at') !!}
                </label><br />
                    {!! $price_list['deleted_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="created_at">
                    {!! trans('pricelist::price_list.label.created_at') !!}
                </label><br />
                    {!! $price_list['created_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="updated_at">
                    {!! trans('pricelist::price_list.label.updated_at') !!}
                </label><br />
                    {!! $price_list['updated_at'] !!}
            </div>
        </div>
    </div>

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
                       {!! Form::text('features')
                       -> label(trans('pricelist::price_list.label.features'))
                       -> placeholder(trans('pricelist::price_list.placeholder.features'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::decimal('price')
                       -> label(trans('pricelist::price_list.label.price'))
                       -> placeholder(trans('pricelist::price_list.placeholder.price'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                   {!! Form::inline_radios('type')
                   -> radios(trans('pricelist::price_list.options.type'))
                   -> label(trans('pricelist::price_list.label.type'))!!}
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
                <div class='col-md-4 col-sm-6'>
                   {!! Form::inline_radios('status')
                   -> radios(trans('pricelist::price_list.options.status'))
                   -> label(trans('pricelist::price_list.label.status'))!!}
                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



