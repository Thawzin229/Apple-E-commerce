@extends("layoutforcustomer.extension")

@section("content")
<div class="u-s-p-y-90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <div class="shop-w-master">
                                <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>

                                    <span>FILTERS</span></h1>
                                <div class="shop-w-master__sidebar">
                                    <div class="u-s-m-b-30">
                                        <div class="shop-w shop-w--style">
                                            <div class="shop-w__intro-wrap">
                                                <h1 class="shop-w__h">CATEGORY</h1>

                                                <span class="fas fa-minus shop-w__toggle" data-target="#s-category" data-toggle="collapse"></span>
                                            </div>
                                            <div class="shop-w__wrap collapse show" id="s-category">
                                                <ul class="shop-w__category-list gl-scroll">
                                                <li class="has-list my-3">
                                                    <a href="{{ route('customer#allproduct') }}">All</a>
                                                  </li>
                                                  @foreach($categories as $item)
                                                    <li class="has-list my-3">
                                                    <a href="{{ route('customer#searchcategory',$item['id']) }}" id="{{ $item['id'] }}">{{ $item['name'] }}</a>
                                                  </li>
                                                  @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="shop-p">
                                <div class="shop-p__toolbar u-s-m-b-30">
                                    <div class="shop-p__meta-wrap u-s-m-b-60">

                                        <span class="shop-p__meta-text-1">FOUND {{ $data->total() }} RESULTS</span>
                                        <div class="shop-p__meta-text-2">

                                            <span>Related Searches:</span>
                                            @if(count($data) !== 0)
                                            <a class="gl-tag btn--e-brand-shadow" href="#">{{ $data[0]['category_name'] }}</a>
                                            @else
                                            @endif

                                            @if(count($data) !== 0)
                                            <a class="gl-tag btn--e-brand-shadow" href="#">{{ $data[0]['name'] }}</a>
                                            @else
                                            @endif

                                    </div>
                                    <div class="shop-p__tool-style">
                                        <div class="tool-style__group u-s-m-b-8">

                                            <span class="js-shop-grid-target is-active">Grid</span>

                                            <span class="js-shop-list-target">List</span></div>
                                        <form>
                                            <div class="tool-style__form-wrap">

                                                <div class="u-s-m-b-8">
                                                    <select class="select-box select-box--transparent-b-2" id="sortingBtn">
                                                        <option selected>Sorting By</option>
                                                        <option  value="latest">Sort By: Latest Items</option>
                                                        <option value="lowestprice">Sort By: Lowest Price</option>
                                                        <option value="highestprice">Sort By: Highest Price</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="shop-p__collection">
                                    <div class="row is-grid-active" id="productlist">
                                      @if(count($productdata)!==0)
                                    @foreach($productdata as $item)
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product-m">
                                                <div class="product-m__thumb">

                                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="#">

                                                        <img class="aspect__img" src="{{ asset('storage/'.$item['image']) }}" alt=""></a>
                                                    <div class="product-m__quick-look">

                                                        <a class="fas fa-search" href="{{ route('customer#singleproduct',$item['id']) }}" data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a></div>
                                                    <div class="product-m__add-cart">

                                                        <a class="btn--e-brand" data-modal="modal" data-modal-id="#add-to-cart">Add to Cart</a></div>
                                                </div>
                                                <div class="product-m__content">
                                                    <div class="product-m__category">

                                                        <a href="shop-side-version-2.html">{{ $item['category_name'] }}</a></div>
                                                    <div class="product-m__name">

                                                        <a href="product-detail.html">{{ $item['name'] }}</a></div>
                                                    <div class="product-m__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                        <span class="product-m__review">(23)</span></div>
                                                    <div class="product-m__price">{{ $item['price'] }}</div>
                                                    <div class="product-m__hover">
                                                        <div class="product-m__preview-description">

                                                            <span>{{ $item['description'] }}</span></div>
                                                        <div class="product-m__wishlist">

                                                            <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @else
                                    <div class="col-lg-12 col-md-12 u-s-m-b-30">
                                <div class="empty">
                                    <div class="empty__wrap">

                                        <span class="empty__big-text">SORRY</span>

                                        <span class="empty__text-1">Your search, did not match any products. A partial match of your keywords is listed below.</span>

                                    </div>
                                </div>
                            </div>
                                    @endif
                                    </div>
                                </div>
                                <div class="u-s-p-y-60">

                                    <!--====== Pagination ======-->
                                    <div>{{ $productdata->links() }}</div>
                                    <!--====== End - Pagination ======-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section("js")
<script>
    $("#sortingBtn").change(function(){
        $val = $("#sortingBtn").val();
        if($val === "latest"){
            $.ajax({
                type:"get",
                data:{"val":$val},
                url:"http://127.0.0.1:8000/customer/latestitem",
                datatype:"json",
                success:function(data){
                    $list = "";
                    for (let $i = 0; $i < data.data.length; $i++) {
                        $list += `<div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product-m">
                                                <div class="product-m__thumb">

                                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="#">

                                                        <img class="aspect__img" src="{{ asset('storage/${data.data[$i].image}') }}" alt=""></a>
                                                    <div class="product-m__quick-look">

                                                        <a href="http://127.0.0.1:8000/customer/singleproduct/${data.data[$i].id}" class="fas fa-search" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a></div>
                                                    <div class="product-m__add-cart">

                                                        <a class="btn--e-brand" data-modal="modal" data-modal-id="#add-to-cart">Add to Cart</a></div>
                                                </div>
                                                <div class="product-m__content">
                                                    <div class="product-m__category">

                                                        <a href="shop-side-version-2.html">${data.data[$i].category_name}</a></div>
                                                    <div class="product-m__name">

                                                        <a href="product-detail.html">${data.data[$i].name}</a></div>
                                                    <div class="product-m__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                        <span class="product-m__review">(23)</span></div>
                                                    <div class="product-m__price">${data.data[$i].price}</div>
                                                    <div class="product-m__hover">
                                                        <div class="product-m__preview-description">

                                                            <span>${data.data[$i].description}</span></div>
                                                        <div class="product-m__wishlist">

                                                            <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;
                                        $("#productlist").html($list);
                    }
                },
                error:function(){

                }
            })
        }

        if($val === "lowestprice"){
            $.ajax({
                type:"get",
                data:{"val":$val},
                url:"http://127.0.0.1:8000/customer/latestitem",
                datatype:"json",
                success:function(data1){
                    $list = "";
                    for (let $i = 0; $i < data1.data.length; $i++) {
                        $list += `<div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product-m">
                                                <div class="product-m__thumb">

                                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="#">

                                                        <img class="aspect__img" src="{{ asset('storage/${data1.data[$i].image}') }}" alt=""></a>
                                                    <div class="product-m__quick-look">

                                                        <a href="http://127.0.0.1:8000/customer/singleproduct/${data1.data[$i].id}" class="fas fa-search"   data-tooltip="tooltip" data-placement="top" title="Quick Look"></a></div>
                                                    <div class="product-m__add-cart">

                                                        <a class="btn--e-brand" data-modal="modal" data-modal-id="#add-to-cart">Add to Cart</a></div>
                                                </div>
                                                <div class="product-m__content">
                                                    <div class="product-m__category">

                                                        <a href="shop-side-version-2.html">${data1.data[$i].category_name}</a></div>
                                                    <div class="product-m__name">

                                                        <a href="product-detail.html">${data1.data[$i].name}</a></div>
                                                    <div class="product-m__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                        <span class="product-m__review">(23)</span></div>
                                                    <div class="product-m__price">${data1.data[$i].price}</div>
                                                    <div class="product-m__hover">
                                                        <div class="product-m__preview-description">

                                                            <span>${data1.data[$i].description}</span></div>
                                                        <div class="product-m__wishlist">

                                                            <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;
                                        $("#productlist").html($list);
                    }
                },
                error:function(){

                }
            })
        }

        if($val === "highestprice"){
            $.ajax({
                type:"get",
                data:{"val":$val},
                url:"http://127.0.0.1:8000/customer/latestitem",
                datatype:"json",
                success:function(data2){
                    $list = "";
                    for (let $i = 0; $i < data2.data.length; $i++) {
                        $list += `<div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product-m">
                                                <div class="product-m__thumb">

                                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="">

                                                        <img class="aspect__img" src="{{ asset('storage/${data2.data[$i].image}') }}" alt=""></a>
                                                    <div class="product-m__quick-look">

                                                        <a href="http://127.0.0.1:8000/customer/singleproduct/${data2.data[$i].id}" class="fas fa-search"  data-tooltip="tooltip" data-placement="top" title="Quick Look"></a></div>
                                                    <div class="product-m__add-cart">

                                                        <a class="btn--e-brand" data-modal="modal" data-modal-id="#add-to-cart">Add to Cart</a></div>
                                                </div>
                                                <div class="product-m__content">
                                                    <div class="product-m__category">

                                                        <a href="shop-side-version-2.html">${data2.data[$i].category_name}</a></div>
                                                    <div class="product-m__name">

                                                        <a href="product-detail.html">${data2.data[$i].name}</a></div>
                                                    <div class="product-m__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                        <span class="product-m__review">(23)</span></div>
                                                    <div class="product-m__price">${data2.data[$i].price}</div>
                                                    <div class="product-m__hover">
                                                        <div class="product-m__preview-description">

                                                            <span>${data2.data[$i].description}</span></div>
                                                        <div class="product-m__wishlist">

                                                            <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;
                                        $("#productlist").html($list);
                    }
                },
                error:function(){

                }
            })
        }
    })
</script>
@endsection