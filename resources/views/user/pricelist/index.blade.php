@include('public::notifications')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-dark  header-title m-t-0"> My PriceLists </h4>
        </div>
        <div class="col-md-6">
            <a href="{{ trans_url('/user/pricelist/pricelist/create') }}" class="btn btn-default pull-right"> {{ trans('cms.create')  }} PriceList</a>
        </div>
    </div>
    <p class="text-muted m-b-25 font-13">
        Your awesome text goes here.
    </p>
    <hr>
    <div class="row">
        <div class="col-md-4 m-b-5 pull-right">
            {!!Form::open()->method('GET')!!}
            <div class="input-group">
              {!!Form::text('search')->type('search')->class('form-control')->placeholder('Search for...')->raw()!!}
              <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">Search</button>
              </span>
            </div>
            {!! Form::close()!!}
        </div>
    </div>   
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>{!! trans('pricelist::pricelist.label.title')!!}</th>
        <th>{!! trans('pricelist::pricelist.label.sub_title')!!}</th>
        <th>{!! trans('pricelist::pricelist.label.features')!!}</th>
        <th>{!! trans('pricelist::pricelist.label.price')!!}</th>
        <th>{!! trans('pricelist::pricelist.label.type')!!}</th>
        <th>{!! trans('pricelist::pricelist.label.image')!!}</th>
                    <th width="150">{!! trans('pricelist::pricelist.label.status')!!}</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pricelists as $pricelist)
                <tr>
                    <td>{{ $pricelist->title }}</td>
                    <td>{{ $pricelist->sub_title }}</td>
                    <td>{{ $pricelist->features }}</td>
                    <td>{{ $pricelist->price }}</td>
                    <td>{{ $pricelist->type }}</td>
                    <td>{{ $pricelist->image }}</td>
                    <td><span class="label status-{{ $pricelist->status }}"> {{ $pricelist->status }} </span></td>
                    <td>
                        <a href="{{ trans_url('/user') }}/pricelist/pricelist/{!! $pricelist->getRouteKey() !!}"> View </a>
                        <a href="{{ trans_url('/user') }}/pricelist/pricelist/{!! $pricelist->getRouteKey() !!}/edit"> Edit </a>
                        <a data-action="DELETE" 
                            data-href="{{ trans_url('/user') }}/pricelist/pricelist/{!! $pricelist->getRouteKey() !!}" 
                            href="trans_url('/user')/pricelist/pricelist/{!! $pricelist->getRouteKey() !!}"> 
                            Delete 
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $pricelists->links() }}
</div>