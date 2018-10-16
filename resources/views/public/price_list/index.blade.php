@include('pricelist::price_list.partial.header')
<section class="content bg-grey">
    <div class="container">
        <div class="price-list">
            <div class="row">
                @foreach($price_lists as $price_list)
                <div class="col-md-4">
                    <div class="item text-center">
                        <div class="title">
                            <h2>{{$price_list['title']}}</h2>
                            <p>{{$price_list['sub_title']}}</p>
                        </div>
                        <div class="content">
                            <div class="price">
                                <span>$</span>{{$price_list['price']}}
                            </div>
                            <ul class="features">
                                <li><i class="fa fa-check"></i>{{$price_list['features']}}</li>
                               
                            </ul>
                            <button type="button" class="btn theme-btn">Choose Plan</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div> 
    </div>
</section>
<style type="text/css">
    .price-list .col-md-4:nth-child(2) .item {
        background-color: #fff;
        border-radius: 10px;
        -webkit-box-shadow: 0px 20px 51px -1px rgba(144,155,165,0.29);
        -moz-box-shadow: 0px 20px 51px -1px rgba(144,155,165,0.29);
        box-shadow: 0px 20px 51px -1px rgba(144,155,165,0.29);          
    }
</style>
            
