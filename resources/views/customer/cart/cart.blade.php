@extends("layoutforcustomer.extension")

@section("content")
           <!--====== Section 1 ======-->
           <div class="u-s-p-y-60">

<!--====== Section Content ======-->
<div class="section__content">
    <input type="hidden" name="" id="user_id" value="{{ Auth::user()->id }}">
    <div class="container">
        <div class="breadcrumb">
            <div class="breadcrumb__wrap">
                <ul class="breadcrumb__list">
                    <li class="has-separator">

                        <a href="{{ route('customer#homepage') }}">Home</a></li>
                    <li class="is-marked">

                        <a href="cart.html">Cart</a></li>
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
                    <h1 class="section__heading u-c-secondary">SHOPPING CART</h1>
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
            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                <div class="table-responsive">
                    <table class="table-p" id="table">
                        <tbody>
                            @if(count($cartdata) !== 0)
                        @foreach($cartdata as $item)
                            <tr>
                                <td>
                                    <div class="table-p__box">
                                        <div class="table-p__img-wrap">

                                            <img style="height:120px" class="u-img-fluid" src="{{ asset('storage/'.$item['product_image']) }}" alt=""></div>
                                        <div class="table-p__info">

                                            <span class="table-p__name">

                                                <a href="product-detail.html">{{ $item['product_name'] }}</a></span>
                                                <input type="hidden"  name="" id="product_id" value="{{ $item['product_id'] }}">

                                            <span class="table-p__category">

                                                <a href="shop-side-version-2.html">{{ $item['category_name'] }}</a></span>
                                            <ul class="table-p__variant-list">
           
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td>

                                    <span class="table-p__price" id="totalprice">{{ $item['totalprice'] }} Kyats</span></td>
                                    <input type="hidden" id="price" name="" value="{{ $item['product_price'] }}">
                                <td>
                                    <div class="table-p__input-counter-wrap">

                                        <!--====== Input Counter ======-->
                                        <div class="input-counter">

                                            <span class="input-counter__minus fas fa-minus"></span>

                                            <input class="input-counter__text input-counter--text-primary-style" type="text" value="{{ $item['quantity'] }}"  id="count" data-min="1" data-max="1000">

                                            <span class="input-counter__plus fas fa-plus"></span></div>
                                        <!--====== End - Input Counter ======-->
                                    </div>
                                </td>
                                <td>
                                    <div class="table-p__del-wrap">
                                        <div class="far fa-trash-alt table-p__delete-link" id="{{ $item['id'] }}"></div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <div class="text-center">Your cart is empty.</div>
                            @endif
                            <!--====== End - Row ======-->
                            
                            
                        </tbody>
                    </table>
                    <div class="mt-5">{{ $cartdata->appends(request()->query())->links() }}</div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="route-box">
                    <div class="route-box__g1">

                        <a class="route-box__link" href="{{ route('customer#allproduct') }}"><i class="fas fa-long-arrow-alt-left"></i>

                            <span>CONTINUE SHOPPING</span></a></div>
                    <div class="route-box__g2">

                        <a id="clear" class="route-box__link" href="#"><i class="fas fa-trash"></i>

                            <span>CLEAR CART</span>
                        </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
</div>
<!--====== End - Section 2 ======-->


<!--====== Section 3 ======-->
<div class="u-s-p-b-60">

<!--====== Section Content ======-->
<div class="section__content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                <div class="f-cart">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="f-cart__pad-box">
                                <h1 class="gl-h1">ESTIMATE SHIPPING AND TAXES</h1>

                                <span class="gl-text u-s-m-b-30">Enter your destination to get a shipping estimate.</span>
                                <div class="u-s-m-b-30">

                                    <!--====== Select Box ======-->

                                    <label class="gl-label" for="shipping-country">COUNTRY *</label>
                                    <select class="select-box select-box--primary-style" id="shipping-country">
                                        <option selected value="">Choose Country</option>
                                        <option value="uae">United Arab Emirate (UAE)</option>
                                        <option value="uk">United Kingdom (UK)</option>
                                        <option value="us">United States (US)</option>
                                        <option value="burma">Myanmar (Burma)</option>
                                    </select>
                                    <!--====== End - Select Box ======-->
                                </div>
                                <div class="u-s-m-b-30">

                                    <!--====== Select Box ======-->

                                    <label class="gl-label" for="shipping-state">STATE/PROVINCE *</label>
                                    <select class="select-box select-box--primary-style" id="shipping-province">
                                        <option selected value="">Choose State/Province</option>
                                        <option value="al">Alabama</option>
                                        <option value="al">Alaska</option>
                                        <option value="ny">New York</option>
                                    </select>
                                    <!--====== End - Select Box ======-->
                                </div>

                                <div class="u-s-m-b-30">

<!--====== Select Box ======-->

<label class="gl-label" for="shipping-state">Payments *</label>
<select class="select-box select-box--primary-style" id="shipping-payment">
    <option selected value="">Choose method/payment</option>
    <option value="paypal">Paypal</option>
    <option value="visa">Visa</option>
    <option value="wave">Wave</option>
</select>
<!--====== End - Select Box ======-->
</div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="shipping-zip">EMAIL</label>

                                    <input class="input-text input-text--primary-style" type="text" id="shipping-email" placeholder="Email...">
                                </div>
                                <div class="u-s-m-b-30">
                                <label class="gl-label" for="shipping-zip">Phnumber</label>

                                <input class="input-text input-text--primary-style" type="text" id="shipping-phnumber" placeholder="Phnumber...">
                                </div>
                                <div class="u-s-m-b-30">

                                    <button class="f-cart__ship-link btn--e-transparent-brand-b-2" id="hello">CALCULATE SHIPPING</button></div>

                                <span class="gl-text">Note: There are some countries where free shipping is available otherwise our flat rate charges or country delivery charges will be apply.</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="f-cart__pad-box">
                                <h1 class="gl-h1">NOTE</h1>

                                <span class="gl-text u-s-m-b-30">Add Special Note About Your Product</span>
                                <div>

                                    <label for="f-cart-note"></label><textarea class="text-area text-area--primary-style" id="f-cart-note"></textarea></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="f-cart__pad-box">
                                <div class="u-s-m-b-30">
                                    <table class="f-cart__table">
                                        <tbody>
                                            <tr>
                                                <td>SHIPPING</td>
                                                <td id="shippingprice">1000 Kyats</td>
                                            </tr>
                                            <tr>
                                                <td>TAX</td>
                                                <td>$0.00</td>
                                            </tr>
                                            <tr>
                                                <td>SUBTOTAL</td>
                                                <td id="subtotal">{{ $totalprice}} Kyats</td>
                                            </tr>
                                            <tr>
                                                <td>GRAND TOTAL</td>
                                                <td id="grandtotal">{{ $totalprice + 1000 }} Kyats</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>

                                    <button class="btn btn--e-brand-b-2" id="orderBtn" type="submit" data-modal="modal" data-modal-id="#add-to-cart"> PROCEED TO CHECKOUT</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
</div>
<!--====== End - Section 3 ======-->

        @if(count($cartdata) !== 0)
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

                                        <span>Thank you for order!</span>
                                        <span> <Strong>Note:</Strong>Check shipping methods before you order.</span>
                                    </div>
                                    <div class="success__info-wrap">
                                        <span class="success__name" id="Quantity"></span>

                                        <span class="success__quantity" id="Totalprice"></span>

                                        <span class="success__price"></span></div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="s-option">

                                    <span class="s-option__text">{{ $cartdata->total() }} item (s) in your cart</span>
                                    <div class="s-option__link-box">

                                        <a href="{{ route('customer#allproduct') }}" class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">CONTINUE SHOPPING</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Add to Cart Modal ======-->
        @else
        <div class="modal fade" id="add-to-cart">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-radius modal-shadow">

                    <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="success u-s-m-b-30">
                                    <div class="success__text-wrap"><i class="fas fa-cancel"></i>

                                        <span class="text-danger"><i class="fas fa-shopping-bag"></i>Cart is empty.</span>
                                        <br>
                                    </div>
                                    <div class="success__info-wrap">
                                        <span class="success__name" id="Quantity"></span>
                                        <span class="success__price"></span></div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="s-option">

                                    <span class="s-option__text">{{ $cartdata->total() }} item (s) in your cart</span>
                                    <div class="s-option__link-box">

                                        <a href="{{ route('customer#allproduct') }}"  class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">CONTINUE SHOPPING</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    

@endsection

@section("js")
<script>
    $(".fa-plus").click(function(){
        $parent = $(this).parents("tr");
        $quantity = $parent.find("#count").val();
        $price = $parent.find("#price").val().replace("Kyats","");
        $totalprice =  $quantity * $price;
        $parent.find("#totalprice").html(`${$totalprice} Kyats`);
        totalprice();
    })
    $(".fa-minus").click(function(){
        $parent = $(this).parents("tr");
        $quantity = $parent.find("#count").val();
        $price = $parent.find("#price").val().replace("Kyats","");
        $totalprice =  $quantity * $price;
        $parent.find("#totalprice").html(`${$totalprice} Kyats`);
        totalprice();
    })

    function totalprice(){
        $mainTotalPrice = 0;
        $("#table tbody tr").each(function(index,row){
            $mainTotalPrice += Number($(row).find("#totalprice").text().replace("Kyats",""));
        });
        $("#subtotal").html(`${$mainTotalPrice} Kyats`);
        $("#grandtotal").html(`${$mainTotalPrice + 1000} Kyats`);


    }

    $("#orderBtn").click(function(){
        $country = $("#shipping-country").val();
        $province = $("#shipping-province").val();
        $email = $("#shipping-email").val();
        $phnumber = $("#shipping-phnumber").val();
        $payment = $("#shipping-payment").val();
        $ordernote = $("#f-cart-note").val();
        $orderlist = [];
        $randomNumber = Math.floor(Math.random()*1000);
        $shipping = {
            "user_id" : Number($("#user_id").val()),
            "country" : $country,
            "province" : $province,
            "email" : $email,
            "phnumber" : $phnumber,
            "payment" : $payment,
            "ordernote" : $ordernote,
            "order_code" : `order:${$randomNumber}`
        }

        if($country && $province && $email && $phnumber && $payment && $ordernote !== ""){
        
        $("#table tbody tr").each(function(index,row){
            $orderlist.push({
                "user_id" : Number($("#user_id").val()),
                "product_id" : Number($(row).find("#product_id").val()),
                "quantity" : Number($(row).find("#count").val()),
                "totalprice" :Number($(row).find("#totalprice").text().replace("Kyats","")),
                "order_code" : `order:${$randomNumber}`
            });
        });
        if($orderlist.length !== 0){
            //orderlist
            $.ajax({
                type:"get",
                data:Object.assign({},$orderlist),
                url:"http://127.0.0.1:8000/customer/orderlist",
                datatype:"json",
                success:function(data){
                    console.log(data);
                }
            });

            //shipping
            $.ajax({
                type:"get",
                data:$shipping,
                url:"http://127.0.0.1:8000/customer/shipping",
                datatype:"json",
                success:function(data){
                    console.log(data);
                }
            });
        }else{
            console.log("srry");
        }
        $("#Totalprice").html(`Totalprice : ${$("#grandtotal").text().replace("Kyats","")} Kyats`);
    }else{
        console.log("need shipping");
    }

        //shipping methods


    })

    $(".fa-trash-alt").click(function(){
        $parent = $(this).parents("tr");
        $parent.remove();
        totalprice();
        $id = $parent.find(".fa-trash-alt").attr("id");
        $.ajax({
            type:"get",
            data:{"id":$id},
            url:"http://127.0.0.1:8000/customer/deletecart",
            datatype:"json",
            success:function(data){
                console.log(data);
            }
        })
    })
    $("#clear").click(function(){
        $("#table tbody").remove();
        $("#subtotal").html(` 0 Kyats`);
        $("#grandtotal").html(` 1000 Kyats`);
        $.ajax({
            type:"get",
            data:{"all":"allclear"},
            url:"http://127.0.0.1:8000/customer/clearallcart",
            datatype:"json",
            success:function(data){
                console.log(data);
            }
        })
    })
</script>
@endsection