@extends("layoutforcustomer.extension")

@section("content")
<section class="h-100">
                <img src="{{ asset('iphone152.jpeg') }}" alt="" class="text-center w-100">
            </section>
         
            <section class="h-100">
                <img src="{{ asset('visionpro.jpeg') }}" alt="" class="text-center w-100">
            </section>
            <section class="h-100">
                <img src="{{ asset('all.jpeg') }}" alt="" class="text-center w-100 border-0">
            </section>
           
            <section class="">

                <div style="" class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 p-1 h-75"><img  style="height:700px;width:100%" class="img-fluid" src="{{ asset('visionmini.jpeg') }}" alt=""></div>
                    <div class="col-lg-6 col-md-12 col-sm-12 p-1 h-75"><img  style="height:700px;width:100%;padding:170px"  class="img-fluid" src="{{ asset('watch.jpeg') }}" alt=""></div>
                </div>
                <div style="" class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 p-1 h-75"><img  style="height:700px;width:100%;padding:200px"class="img-fluid" src="{{ asset('card.jpeg') }}" alt=""></div>
                    <div class="col-lg-6 col-md-12 col-sm-12 p-1 h-75"><img  style="height:700px;width:100%" class="img-fluid" src="{{ asset('iphone15.jpg') }}" alt=""></div>
                </div>

            </section>
           <!--====== Primary Slider ======-->
           <div style="height:600px" class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
                <div class="owl-carousel primary-style-1" id="hero-slider">
                    <div class="hero-slide hero-slide--1">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slider-content slider-content--animation">

                                        <span class="content-span-1 u-c-white">Latest Update Stock</span>

                                        <span class="content-span-2 u-c-white">50% Off On Macbook Air For Students</span>

                                        <span class="content-span-3 u-c-white">Find macbook on best prices, Also Discover most selling products of macs</span>

                                        <span class="content-span-4 u-c-white">Starting At

                                            <span class="u-c-brand">300,000,0 MMK</span></span>

                                        <a class="shop-now-link btn--e-brand" href="{{ route('customer#searchcategory',2) }}">SHOP NOW</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hero-slide hero-slide--2">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slider-content slider-content--animation">

                                        <span class="content-span-1 u-c-white">Find i-pad for better days!</span>

                                        <span class="content-span-2 u-c-white">10% Off On Desiger</span>

                                        <span class="content-span-3 u-c-white">Find i-pad on best prices, Also Discover most selling products of i-pad</span>

                                        <span class="content-span-4 u-c-white">Starting At

                                            <span class="u-c-brand">200,000,00 MMK</span></span>

                                        <a class="shop-now-link btn--e-brand" href="{{ route('customer#searchcategory',3) }}">SHOP NOW</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hero-slide hero-slide--3">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slider-content slider-content--animation">

                                        <span class="content-span-1 u-c-white">Find i-watch ? </span>

                                        <span class="content-span-2 u-c-white">30% Off On Sporters</span>

                                        <span class="content-span-3 u-c-white">Find watch  on best prices, Also Discover most selling products of iwatches</span>

                                        <span class="content-span-4 u-c-white">Starting At

                                            <span class="u-c-brand">150,000,0 MMK</span></span>

                                        <a class="shop-now-link btn--e-brand" href="{{ route('customer#searchcategory',4) }}">SHOP NOW</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hero-slide hero-slide--4">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slider-content slider-content--animation">

                                        <span class="content-span-1 u-c-white">Iphone 15 pro,</span>

                                        <span class="content-span-2 u-c-white">Best product ever ! </span>

                                        <span class="content-span-3 u-c-white">Find others on best prices, Also Discover most selling products of iphones</span>

                                        <span class="content-span-4 u-c-white">Starting At

                                            <span class="u-c-brand">500,000,0 MMK</span></span>

                                        <a class="shop-now-link btn--e-brand" href="{{ route('customer#searchcategory',1) }}">SHOP NOW</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hero-slide hero-slide--5">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slider-content slider-content--animation">

                                        <span class="content-span-1 u-c-white">I-Phone Titanium</span>

                                        <span class="content-span-2 u-c-white">Ultra Titan.</span>

                                        <span class="content-span-3 u-c-white">Find electronics on best prices, Also Discover most selling products of apples.</span>

                                        <span class="content-span-4 u-c-white">Starting At

                                            <span class="u-c-brand">600,000,00MMK</span></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!--====== End - Primary Slider ======-->
<!--====== Section 1 ======-->
<div class="u-s-p-y-60">

<!--====== Section Intro ======-->
<div class="section__intro u-s-m-b-46">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__text-wrap">
                    <h1 class="section__heading u-c-secondary u-s-m-b-12">SHOP BY DEALS</h1>

                    <span class="section__span u-c-silver">BROWSE FAVOURITE DEALS</span>
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
            <div class="col-lg-5 col-md-5 u-s-m-b-30">

                <a class="collection" href="shop-side-version-2.html">
                    <div class="aspect aspect--bg-grey aspect--square">

                        <img class="aspect__img collection__img" src="{{ asset('customer/images/collection/iphone14pro.jpg') }}" alt=""></div>
                </a></div>
            <div class="col-lg-7 col-md-7 u-s-m-b-30">

                <a class="collection" href="shop-side-version-2.html">
                    <div class="aspect aspect--bg-grey aspect--1286-890">

                        <img class="aspect__img collection__img" src="{{ asset('customer/images/collection/macbook.jpg') }}" alt=""></div>
                </a></div>
            <div class="col-lg-7 col-md-7 u-s-m-b-30">

                <a class="collection" href="shop-side-version-2.html">
                    <div class="aspect aspect--bg-grey aspect--1286-890">

                        <img class="aspect__img collection__img" src="{{ asset('customer/images/collection/ipad.jpg') }}" alt=""></div>
                </a></div>
            <div class="col-lg-5 col-md-5 u-s-m-b-30">

                <a class="collection" href="shop-side-version-2.html">
                    <div class="aspect aspect--bg-grey aspect--square">

                        <img class="aspect__img collection__img" src="{{ asset('customer/images/collection/iwatch.jpg') }}" alt=""></div>
                </a></div>
        </div>
    </div>
</div>

<!--====== Section Content ======-->
</div>
<!--====== End - Section 1 ======-->


<!--====== Section 2 ======-->
<div class="u-s-p-b-60 mb-5" style="min-height:100vh;">

<!--====== Section Intro ======-->
<div class="section__intro u-s-m-b-16">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__text-wrap">
                    <h1 class="section__heading u-c-secondary u-s-m-b-12">Featured Products</h1>

                    <span class="section__span u-c-silver">CHOOSE CATEGORY</span>
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
            <div class="col-lg-12">
                <div class="filter-category-container">
                    <div class="filter__category-wrapper">
                        <a  href="{{ route('customer#homepage') }}" class=" filter__btn filter__btn--style-1 js-checked" type="button" data-filter="*">ALL</a>
                      </div>
                      @foreach($categories as $item)
                      <div class="filter__category-wrapper" id="group">
                        <div id="{{ $item['id'] }}" class="filter__btn filter__btn--style-1 category" type="button">{{ $item['name'] }}</div>
                      </div>
                      @endforeach
                </div>
                <div class="filter__grid-wrapper u-s-m-t-30">
                    <div class="row" id="item">
                      @if(count($data) !== 0)
                      @foreach($data as $item)
                      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone item">
                            <div class="product-o product-o--hover-on product-o--radius">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="">

                                        <img class="aspect__img" src="{{ asset('storage/'.$item['image']) }}" alt="">
                                    </a>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                                <a data-modal="modal" href="{{ route('customer#singleproduct',$item['id']) }}"  data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                    <a href="shop-side-version-2.html">{{ $item['category_name'] }}</a></span>

                                <span class="product-o__name">

                                    <a href="product-detail.html">{{ $item['name'] }}</a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                    <span class="product-o__review">(23)</span></div>

                                <span class="product-o__price">{{ $item['price'] }} Kyats

                            </div>
                        </div>
                      @endforeach
                      @else
                      <div>Sorry We can't provide any information what you searched</div>
                      @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
</div>
<div class="d-flex justify-content-center mb-5">
    <div class="col-lg-8">{{$data->links()}}</div>
</div>
<!--====== End - Section 2 ======-->













<!--====== Section 8 ======-->
<div class="u-s-p-b-60">

<!--====== Section Content ======-->
<div class="section__content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                <div class="column-product">

                    <span class="column-product__title u-c-secondary u-s-m-b-25">TRENDING PRODUCTS</span>
                    <ul class="column-product__list">
                        @foreach($trendingdata as $item)
                        <li class="column-product__item">
                            <div class="product-l">
                                <div class="product-l__img-wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="{{ route('customer#singleproduct',$item['id']) }}">

                                        <img class="aspect__img" src="{{ asset('storage/'.$item['image']) }}" alt=""></a></div>
                                <div class="product-l__info-wrap">

                                    <span class="product-l__category">

                                        <a href="shop-side-version-2.html">{{ $item['count'] }} Views</a></span>

                                    <span class="product-l__name">

                                        <a href="product-detail.html">{{ $item['name'] }}</a></span>

                                    <span class="product-l__price">{{ $item['price'] }} Kyats</span></div>
                                </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                <div class="column-product">

                    <span class="column-product__title u-c-secondary u-s-m-b-25">LATEST PRODUCTS</span>
                    <ul class="column-product__list">
                        @foreach($recentproductdata as $item)
                        <li class="column-product__item">
                            <div class="product-l">
                                <div class="product-l__img-wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="{{ route('customer#singleproduct',$item['id']) }}">

                                        <img class="aspect__img" src="{{ asset('storage/'.$item['image']) }}" alt=""></a></div>
                                <div class="product-l__info-wrap">

                                    <span class="product-l__category">

                                        <a href="shop-side-version-2.html">{{ $item['category_name'] }}</a></span>

                                    <span class="product-l__name">

                                        <a href="product-detail.html">{{ $item['name'] }}</a></span>

                                    <span class="product-l__price">{{ $item['price'] }} Kyats

                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                <div class="column-product">

                    <span class="column-product__title u-c-secondary u-s-m-b-25">HIGHEST PRICE PRODUCTS</span>
                    <ul class="column-product__list">
                        @foreach($highpricedata as $item)
                        <li class="column-product__item">
                            <div class="product-l">
                                <div class="product-l__img-wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="{{ route('customer#singleproduct',$item['id']) }}">

                                        <img class="aspect__img" src="{{ asset('storage/'.$item['image']) }}" alt=""></a></div>
                                <div class="product-l__info-wrap">
                                    <div class="product-l__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>

                                    <span class="product-l__category">

                                        <a href="shop-side-version-2.html">{{ $item['category_name'] }}</a></span>

                                    <span class="product-l__name">

                                        <a href="product-detail.html">{{ $item['name'] }}</a></span>

                                    <span class="product-l__price">{{ $item['price'] }} Kyats</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
</div>
<!--====== End - Section 8 ======-->


<!--====== Section 9 ======-->
<div class="u-s-p-b-60">

<!--====== Section Content ======-->
<div class="section__content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                <div class="service u-h-100">
                    <div class="service__icon"><i class="fas fa-truck"></i></div>
                    <div class="service__info-wrap">

                        <span class="service__info-text-1">Free Shipping</span>

                        <span class="service__info-text-2">Free shipping on all US order or order above $200</span></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                <div class="service u-h-100">
                    <div class="service__icon"><i class="fas fa-redo"></i></div>
                    <div class="service__info-wrap">

                        <span class="service__info-text-1">Shop with Confidence</span>

                        <span class="service__info-text-2">Our Protection covers your purchase from click to delivery</span></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                <div class="service u-h-100">
                    <div class="service__icon"><i class="fas fa-headphones-alt"></i></div>
                    <div class="service__info-wrap">

                        <span class="service__info-text-1">24/7 Help Center</span>

                        <span class="service__info-text-2">Round-the-clock assistance for a smooth shopping experience</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
</div>
<!--====== End - Section 9 ======-->





<!--====== Section 11 ======-->
<div class="u-s-p-b-90 u-s-m-b-30">

<!--====== Section Intro ======-->
<div class="section__intro u-s-m-b-46">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__text-wrap">
                    <h1 class="section__heading u-c-secondary u-s-m-b-12">CLIENTS FEEDBACK</h1>

                    <span class="section__span u-c-silver">WHAT OUR CLIENTS SAY</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Intro ======-->


<!--====== Section Content ======-->
<div class="section__content">
    <div class="container">

        <!--====== Testimonial Slider ======-->
        <div class="slider-fouc">
            <div class="owl-carousel" id="testimonial-slider">
                @foreach($feedbackdata as $item)
                <div class="testimonial">
                    <div class="testimonial__img-wrap">

                        <img class="testimonial__img" src="images/about/test-1.jpg" alt=""></div>
                    <div class="testimonial__content-wrap">

                        <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                        <blockquote class="testimonial__block-quote">
                            <p>{{ $item['review'] }}</p>
                        </blockquote>

                        <span class="testimonial__author">{{ $item['name'] }} / DVNTR Inc.</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!--====== End - Testimonial Slider ======-->
    </div>
</div>
<!--====== End - Section Content ======-->
</div>
<!--====== End - Section 11 ======-->




<!--====== End - App Content ======-->



@endsection

@section("js")
<script>

    $(".category").click(function(){
        $id  = $(this).parent("#group").find("div").attr("id");
        $.ajax({
            type:"get",
            url:"http://127.0.0.1:8000/customer/returncategorydata",
            data:{"id":$id},
            datatype:"json",
            success:function(data){
                $list = "";
                console.log(data);
                for (let $i = 0; $i < data.length; $i++) {
                    $list +=`<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone item">
                            <div class="product-o product-o--hover-on product-o--radius">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                        <img class="aspect__img" src="{{ asset('storage/${data[$i].image}') }}" alt=""></a>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                            <li>

                                                <a href="http://127.0.0.1:8000/customer/singleproduct/${data[$i].id}" data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-search-plus"></i></a>
                                                </li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                    <a href="shop-side-version-2.html">${data[$i].category_name}</a></span>

                                <span class="product-o__name">

                                    <a href="product-detail.html">${data[$i].name}</a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                    <span class="product-o__review">(23)</span></div>

                                <span class="product-o__price">${data[$i].price} Kyats

                            </div>
                        </div>`
                        $("#item").html($list);
                }
            }
        })
    })
</script>
@endsection