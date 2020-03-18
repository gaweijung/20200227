@extends('layouts/nav')



@section('style')
<style>
    .product-card{
        min-height: 500px;
        box-sizing: border-box;
        padding: 48px 48px 40px;
        margin-bottom: 60px;
        background: #fafafa;
    }
    .product-card .color{
       padding: 10px 20px;
       width: 160px;
       min-height: 58px;
       height: 100%;
       font-size: 16px;
       line-height: 20px;
       color: #757575;
       text-align: center;
       border: 1px solid #eee;
       background-color: #fff;
       -webkit-user-select: none;
       -ms-user-select: none;
       user-select: none;
       transition: opacity, border .2s linear;
       cursor: pointer;
    }
    .product-card .color .active{
        color: #424242;
        border-color: #ff6700;
        transition: opacity, border .2s linear;
    }
    .product-card .product-info .title{
        width: 100%;
        font-size: 40px;
        font-weight: 400;
        line-height: 48px;
        color: #000;
        margin: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .product-card .product-info .sub-title{

        font-size: 20px;
        line-height: 24px;
        color: #757575;
       margin-top: 8px;
    }


</style>
@endsection

@section('container')
<section class="features3 cid-rRF3umTBWU" id="features3-7" style="padding-top:100px">
<div class="container">
    <div class="row">
        <div class="col-6">

        </div>
         <div class="col-6">
             <div class="product-card">
                <div class="porduct-info">
                    <div class="title">{{$product->title}}</div>
                    <div class="sub-title">6GB+128GB, 珍珠白</div>
                    <div class="price">NT$7,599</div>
                </div>
                <div class="porduct-tips">
                    該商品可享受雙倍積分
                </div>
                <div class="porduct-capacity">
                    容量
                    <div class="row">
                        <div class="col-4">
                            <div class="color">
                               64G+65G
                            </div>
                       </div>
                       <div class="col-4">
                           <div class="color">
                               128G+128G
                           </div>
                       </div>
                </div>
                <div class="porduct-color">
                    顏色
                    <div class="row">
                        <div class="col-4">
                            <div class="color active" data-color="red">
                               紅
                            </div>
                       </div>
                       <div class="col-4">
                           <div class="color" data-color="yellow">
                               黃
                           </div>
                       </div>
                       <div class="col-4">
                           <div class="color" data-color="green">
                               綠
                           </div>
                       </div>
                       <div class="col-4">
                           <div class="color" data-color="purple">
                               紫
                           </div>
                       </div>
                    </div>
                </div>
                <form action="/add_cart/1" method="post" >
                    @csrf
                    <div class="porduct-qty">
                        數量
                        <a id="minus" href="#">-</a>
                        <input type="number" value="1" id="qty" min="0">
                        <a id="plus" href="#">+</a>
                    </div>
                    <div class="porduct-total">
                        <div>
                            <span>Redmi Note 8 Pro</span>
                            <span>珍珠白</span>
                            <span>6GB+128GB</span>*<span>1</span>
                            NT${{$product->price}}
                        </div>
                      </div>
                      <input type="text" name="product_id"  hidden>
                      <input type="text" name="capacity" id="capacity" value="6GB+128GB" hidden>
                      <input type="text" name="color" id="color" value="red" hidden>
                    <button >立即購買</button>
                </form>
             </div>
         </div>
    </div>
</div>
</section>


@endsection

@section('js')
<script>
    $('.card-box *').attr('style','');
    $('.product-card .color').click(function(){
        //交換顏色
    $('.product-card .color').removeClass("active");
    $(this).addClass("active");


    var color = $(this).attr("data-color");

    $('#color').val(color);

    })

    $(function(){

var valueElement = $('#qty');
    function incrementValue(e){
    var now_number = $('#qty').val();

    var new_number = Math.max(e.data.increment+parseInt(new_number) , 0);


    valueElement.text(Math.max(parseInt(valueElement.text()) + e.data.increment, 0));
    return false;
}

    $('#plus').bind('click', {increment: 1}, incrementValue);

    $('#minus').bind('click', {increment: -1}, incrementValue);

});
</script>
@endsection

