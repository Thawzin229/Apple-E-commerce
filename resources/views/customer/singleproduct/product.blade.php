@extends("layoutforcustomer.extension")

@section("content")
     <!--====== Section 1 ======-->
     <div class="u-s-p-t-90">
        <!-- ajax data -->
        <input type="hidden" name="" id="userid" value="{{ Auth::user()->id }}">
        <input type="hidden" name="" id="productid" value="{{ $singledata['id'] }}">
        <input type="hidden" name="" id="price" value="{{ $singledata['price'] }}">
        <!-- ajax data -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">

                            <!--====== Product Breadcrumb ======-->
                            <div class="pd-breadcrumb u-s-m-b-30">
                                <ul class="pd-breadcrumb__list">
                                    <li class="has-separator">

                                        <a href="{{ route('customer#homepage') }}">Home</a></li>
                                    <li class="has-separator">

                                        <a href="{{ route('customer#searchcategory',$singledata['category_id']) }}">{{ $singledata['category_name'] }}</a></li>
                                    <li class="has-separator">

                                        <a href="">{{ $singledata['type_name'] }}</a></li>
                                    <li class="is-marked">

                                        <a href="">{{ $singledata['name'] }}</a></li>
                                </ul>
                            </div>
                            <!--====== End - Product Breadcrumb ======-->


                            <!--====== Product Detail Zoom ======-->
                            <div class="pd u-s-m-b-30">
                                <div class="slider-fouc pd-wrap">
                                    <div id="pd-o-initiate">
                                        <div class="pd-o-img-wrap" data-src="images/product/product-d-1.jpg">

                                            <img  style="width:500px;height:350px" class="u-img-fluid" src="{{ asset('storage/'.$singledata['image']) }}" data-zoom-image="{{ asset('storage/'.$data['image']) }}" alt="">
                                          </div>

                                    </div>

                                    <span class="pd-text">Click for larger zoom</span>
                                </div>
                                <div class="u-s-m-t-15">
                                    <div class="slider-fouc">
                                        <div id="pd-o-thumbnail">
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-1.jpg" alt=""></div>
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-2.jpg" alt=""></div>
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-3.jpg" alt=""></div>
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-4.jpg" alt=""></div>
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-5.jpg" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Product Detail Zoom ======-->
                        </div>
                        <div class="col-lg-7">

                            <!--====== Product Right Side Details ======-->
                            <div class="pd-detail">
                                <div>

                                    <span class="pd-detail__name">{{ $singledata['name'] }}</span></div>
                                <div>
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__price">{{ $singledata['price'] }} Kyats</span>

                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                        <span class="pd-detail__review u-s-m-l-4">

                                            <a data-click-scroll="#view-review">{{ $viewcount->total() }} Reviews</a></span></div>
                                </div>
             
                                <div class="u-s-m-b-15">

                                    <span class="pd-detail__preview-desc">{{ $singledata['description'] }}</span></div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__click-wrap"><i id="heart" class="far fa-heart u-s-m-r-6"></i>

                                            <span class="addtowishlist">Add to Wishlist</span>

                                            <span class="pd-detail__click-count">({{ $wishlistcount->total() }})</span></span></div>
                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>

                                            <a href="#">Email me When the price drops</a>

                                            <span class="pd-detail__click-count">(20)</span></span></div>
                                </div>
                                <div class="u-s-m-b-15">
                                    <ul class="pd-social-list">
                                        <li>

                                            <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li>

                                            <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li>

                                            <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li>

                                            <a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a></li>
                                        <li>

                                            <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__form">
                                        <div class="pd-detail-inline-2">
                                            <div class="u-s-m-b-15">

                                                <!--====== Input Counter ======-->
                                                <div class="input-counter">

                                                    <span class="input-counter__minus fas fa-minus"></span>

                                                    <input id="count" class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000">

                                                    <span class="input-counter__plus fas fa-plus"></span></div>
                                                <!--====== End - Input Counter ======-->
                                            </div>
                                            <div class="u-s-m-b-15">

                                                <button id="addtochartBtn" class="btn btn--e-brand-b-2" type="submit"data-modal="modal" data-modal-id="#add-to-cart">Add to Cart</button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="u-s-m-b-15">

                                    <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                                    <ul class="pd-detail__policy-list">
                                        <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                            <span>Buyer Protection.</span></li>
                                        <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                            <span>Full Refund if you don't receive your order.</span></li>
                                        <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                            <span>Returns accepted if product not as described.</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!--====== End - Product Right Side Details ======-->
                        </div>
                    </div>
                </div>
            </div>

            <!--====== Product Detail Tab ======-->
            <div class="u-s-p-y-90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pd-tab">
                                <div class="u-s-m-b-30">
                                    <ul class="nav pd-tab__list">
                                        <li class="nav-item">

                                            <a class="nav-link active" data-toggle="tab" href="#pd-desc">DESCRIPTION</a></li>
                                        <li class="nav-item">

                                            <a class="nav-link" data-toggle="tab" href="#pd-tag">TAGS</a></li>
                                        <li class="nav-item">

                                            <a class="nav-link" id="view-review" data-toggle="tab" href="#pd-rev">REVIEWS

                                                <span>({{ $reviewdata->total() }})</span></a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">

                                    <!--====== Tab 1 ======-->
                                    <div class="tab-pane fade show active" id="pd-desc">
                                        <div class="pd-tab__desc">
                                            <div class="u-s-m-b-15">
                                                <p>{{ $singledata['description'] }}</p>
                                            </div>
                                            <div class="u-s-m-b-30"><iframe src="https://www.youtube.com/embed/qKqSBm07KZk" allowfullscreen></iframe></div>
                                            <div class="u-s-m-b-30">
                                                <ul>
                                                    <li><i class="fas fa-check u-s-m-r-8"></i>

                                                        <span>Buyer Protection.</span></li>
                                                    <li><i class="fas fa-check u-s-m-r-8"></i>

                                                        <span>Full Refund if you don't receive your order.</span></li>
                                                    <li><i class="fas fa-check u-s-m-r-8"></i>

                                                        <span>Returns accepted if product not as described.</span></li>
                                                </ul>
                                            </div>
                                            <div class="u-s-m-b-15">
                                                <h4>PRODUCT INFORMATION</h4>
                                            </div>
                                            <div class="u-s-m-b-15">
                                                <div class="pd-table gl-scroll">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>Specification</td>
                                                                <td>{{ $singledata['specification'] }}</td>
                                                            </tr>

                                                      
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--====== End - Tab 1 ======-->


                                    <!--====== Tab 2 ======-->
                                    <div class="tab-pane" id="pd-tag">
                                        <div class="pd-tab__tag">
                                            <h2 class="u-s-m-b-15">ADD YOUR TAGS</h2>
                                            <div class="u-s-m-b-15">
                                                <form>

                                                    <input class="input-text input-text--primary-style" type="text">

                                                    <button class="btn btn--e-brand-b-2" type="submit">ADD TAGS</button></form>
                                            </div>

                                            <span class="gl-text">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                        </div>
                                    </div>
                                    <!--====== End - Tab 2 ======-->


                                    <!--====== Tab 3 ======-->
                                    <div class="tab-pane" id="pd-rev">
                                        <div class="pd-tab__rev">
                                            <div class="u-s-m-b-30">
                                                <div class="pd-tab__rev-score">
                                                    <div class="u-s-m-b-8">
                                                        <h2>{{ $reviewdata->total() }} Reviews - 4.6 (Overall)</h2>
                                                    </div>
                                                    <div class="gl-rating-style-2 u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                                                    <div class="u-s-m-b-8">
                                                        <h4>We want to hear from you!</h4>
                                                    </div>

                                                    <span class="gl-text">Tell us what you think about this item</span>
                                                </div>
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <form class="pd-tab__rev-f1">
                                                    <div class="rev-f1__group">
                                                        <div class="u-s-m-b-15">
                                                            <h2>{{ $reviewdata->total() }} reviews for  {{ $singledata['name'] }}</h2>
                                                        </div>
                                                    </div>
                                                    <div class="rev-f1__review">
                                                        @foreach($reviewdata as $item)
                                                        <div class="review-o u-s-m-b-15">
                                                            <div class="review-o__info u-s-m-b-8">

                                                                <span class="review-o__name">{{ $item['name'] }}</span>

                                                                <span class="review-o__date">{{ $item['created_at']->format("d-M-Y") }}</span></div>
                                                            <div class="review-o__rating gl-rating-style u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>

                                                                <span>(4)</span></div>
                                                            <p class="review-o__text">{{ $item['review'] }}</p>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <form class="pd-tab__rev-f2" action="{{ route('customer#review') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" id="" value="{{ $singledata['id'] }}">
                                                    <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}">
                                                    <h2 class="u-s-m-b-15">Add a Review</h2>

                                                    <span class="gl-text u-s-m-b-15">Your email address will not be published. Required fields are marked *</span>
                                                    <div class="u-s-m-b-30">

                                                    </div>
                                                    <div class="rev-f2__group">
                                                        <div class="u-s-m-b-15">

                                                            <label class="gl-label" for="reviewer-text">YOUR REVIEW *</label>
                                                            <textarea class="text-area text-area--primary-style" id="reviewer-text" name="review"></textarea>
                                                            @error("review")  <small class="text-danger">{{ $message }}</small> @enderror
                                                        </div>
                                                        <div>
                                                            <p class="u-s-m-b-30">

                                                                <label class="gl-label" for="reviewer-name">NAME *</label>

                                                                <input class="input-text input-text--primary-style" type="text" id="reviewer-name" name="name"></p>
                                                                @error("name")  < class="text-danger">{{ $message }}</> @enderror
                                                            <p class="u-s-m-b-30">

                                                                <label class="gl-label" for="reviewer-email">EMAIL *</label>

                                                                <input class="input-text input-text--primary-style" type="text" id="reviewer-email" name="email"></p>
                                                                @error("email")  <small class="text-danger">{{ $message }}</small> @enderror
                                                        </div>
                                                    </div>
                                                    <div>

                                                        <button class="btn btn--e-brand-shadow" type="submit">SUBMIT</button></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--====== End - Tab 3 ======-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Product Detail Tab ======-->
            <div class="u-s-p-b-90">

                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-46">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary u-s-m-b-12">CUSTOMER ALSO VIEWED</h1>

                                    <span class="section__span u-c-grey">PRODUCTS THAT CUSTOMER VIEWED</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->


                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="slider-fouc">
                            <div class="owl-carousel product-slider" data-item="4">
                                @foreach($overalldata as $item) 
                                <div class="u-s-m-b-30">
                                    <div class="product-o product-o--hover-on">
                                        <div class="product-o__wrap">

                                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                                <img class="aspect__img" src="{{ asset('storage/'.$item['image']) }}" alt=""></a>
                                            <div class="product-o__action-wrap">
                                                <ul class="product-o__action-list">
                                                    <li>
                                                        <a data-modal="modal" href="{{ route('customer#singleproduct',$item['id']) }}" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                                    </li>
          
                                                </ul>
                                            </div>
                                        </div>

                                        <span class="product-o__category">

                                            <a href="shop-side-version-2.html">{{ $item['category_name'] }}</a></span>

                                        <span class="product-o__name">

                                            <a href="product-detail.html">{{ $item['name'] }}</a></span>
                                        <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>


                                        <span class="product-o__price">{{ $item['price'] }} Kyats

                                            <span class="product-o__discount">$160.00</span></span>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 1 ======-->

        <!--====== Add to Cart Modal ======-->
        <div class="modal fade" id="add-to-cart">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-radius modal-shadow">

                    <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="success u-s-m-b-30">
                                    <div class="success__text-wrap"><i class="fas fa-check"></i>

                                        <span>Item is added successfully!</span></div>
                                    <div class="success__img-wrap">
                                        <img style="width:100px;height:120px" class="u-img-fluid" @if(isset($singledata['image'])) src="{{ asset('storage/'.$singledata['image']) }}" @endif alt="">
                                    </div>
                                    <div class="success__info-wrap">
                                        @if(isset($singledata['name']))
                                        <span class="success__name">{{ $singledata['name'] }}</span>
                                        @endif

                                        <span class="success__quantity"></span>
                                        @if(isset($singledata['price']))
                                        <span class="success__price">{{ $singledata['price'] }}</span></div>
                                        @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="s-option">

                                    <span class="s-option__text">{{ $cartdata->total() }}item (s) in your cart</span>
                                    <div class="s-option__link-box">

                                        <a class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">CONTINUE SHOPPING</a>

                                        <a class="s-option__link btn--e-white-brand-shadow" href="{{ route('customer#cartpage') }}">VIEW CART</a>

                                        <a class="s-option__link btn--e-brand-shadow" href="checkout.html">PROCEED TO CHECKOUT</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Add to Cart Modal ======-->
@endsection
@section("js")
<script>
    $("#addtochartBtn").click(function(){
        $user_id = $("#userid").val();
        $product_id = $("#productid").val();
        $quantity = $("#count").val();
        $price = $("#price").val();
        $data = {
            "user_id" : $user_id,
            "product_id" : $product_id,
            "quantity" : $quantity,
            "totalprice" : $quantity * $price
        }
        $(".success__quantity").html("Quantity: " + $quantity);
        $(".success__price").html("Price: " + $data.totalprice);
        $.ajax({
            type:"get",
            data:$data,
            url:"http://127.0.0.1:8000/customer/addtocart",
            datatype:"json",
            success:function(data){
                console.log(data);
            }
        })
    })
    $(".addtowishlist").click(function(){
        $user_id = $("#userid").val();
        $product_id = $("#productid").val();
        $heart = $("#heart");
        $heart.attr("id","turnred");
        $data = {
            "user_id":$user_id,
            "product_id":$product_id,
        }
        $.ajax({

            type:"get",
            data:$data,
            url:"http://127.0.0.1:8000/customer/addtowishlist",
            datatype:"json",
            success:function(data){
                console.log(data);
            }

        })
    })
</script>
@endsection