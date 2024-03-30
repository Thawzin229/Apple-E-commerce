@extends("layoutforcustomer.extension")

@section("content")
     <!--====== Section 1 ======-->
     <div class="u-s-p-y-60">

<!--====== Section Content ======-->
<div class="section__content">
    <div class="container">
        <div class="breadcrumb">
            <div class="breadcrumb__wrap">
                <ul class="breadcrumb__list">
                    <li class="has-separator">

                        <a href="index.html">Home</a></li>
                    <li class="is-marked">

                        <a href="wishlist.html">Wishlist</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!--====== End - Section 1 ======-->


<!--====== Section 2 ======-->
<div class="u-s-p-b-60">

<!--====== Section Intro ======-->
<div class="section__intro u-s-m-b-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__text-wrap">
                    <h1 class="section__heading u-c-secondary">Wishlist</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Intro ======-->


<!--====== Section Content ======-->
<div class="section__content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12" id="container">
              @if(count($wishlistdata) !== 0)
              @foreach($wishlistdata as $item)
                <!--====== Wishlist Product ======-->
                <div class="w-r u-s-m-b-30" >
                    <div class="w-r__container" >
                        <div class="w-r__wrap-1">
                            <div class="w-r__img-wrap">

                                <img style="height:120px;" class="u-img-fluid" src="{{ asset('storage/'.$item['product_image']) }}" alt=""></div>
                            <div class="w-r__info">

                                <span class="w-r__name">

                                    <a href="product-detail.html">{{ $item['product_name'] }}</a></span>

                                <span class="w-r__category">

                                    <a href="shop-side-version-2.html">{{ $item['category_name'] }}</a></span>

                                <span class="w-r__price">{{ $item['product_price'] }} Kyats

                                    <span class="w-r__discount">$160.00</span></span></div>
                        </div>
                        <div class="w-r__wrap-2" id="container" >


                            <a class="w-r__link btn--e-transparent-platinum-b-2" href="{{ route('customer#singleproduct',$item['product_id']) }}">VIEW</a>
                            <a class="w-r__link btn--e-transparent-platinum-b-2" href="{{ route('customer#deletewishlist',$item['id']) }}">REMOVE</a>
                          </div>
                    </div>
                </div>
                <!--====== End - Wishlist Product ======-->
                @endforeach
                <div class="mb-2">{{ $wishlistdata->links() }}</div>
                @else
                <div class="text-center my-5 text-danger">No data.</div>
                @endif
            </div>
            <div class="col-lg-12">
                <div class="route-box">
                    <div class="route-box__g">

                        <a class="route-box__link" href="{{ route('customer#allproduct') }}"><i class="fas fa-long-arrow-alt-left"></i>

                            <span>CONTINUE SHOPPING</span></a></div>
                    <div class="route-box__g">

                        <div class="route-box__link" id="clearall"><i class="fas fa-trash"></i>

                            <span>CLEAR WISHLIST</span></div>
                          </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
</div>
<!--====== End - Section 2 ======-->
@endsection

@section("js")
<script>
  $("#clearall").click(function(){
    $("#container").remove();

    //ajax
    $.ajax({
      type:'get',
      data:{"status":"allclear"},
      url:"http://127.0.0.1:8000/customer/clearallwishlist",
      datatype:"json",
      success:function(data){
        console.log(data);
      }
    })
  })
</script>
@endsection