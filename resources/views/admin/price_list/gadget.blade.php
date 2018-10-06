@forelse($price_list as $key => $val)
<div class="price_list-gadget-box">
    <p>{!!@$val->name!!}</p>
    <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$val->user->name!!} at {!! format_date($val->created_at)!!}</small></p>
</div>
@empty
<div class="price_list-gadget-box">
    <p>No PriceList</p>
</div>
@endif