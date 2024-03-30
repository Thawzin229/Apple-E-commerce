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

                                        <a href="{{ route('customer#homepage') }}">Home</a></li>
                                    <li class="is-marked">

                                        <a href="{{ route('customer#editaccpage') }}">Change Password</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->


            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="dash">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-12">

                                    <!--====== Dashboard Features ======-->
                                    <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                        <div class="dash__pad-1">

                                            <span class="dash__text u-s-m-b-16">Hello, {{ Auth::user()->name }}/span>
                                            <ul class="dash__f-list">
                                                <li>

                                                    <a class="dash-active" href="{{ route('customer#accountpage') }}">Manage My Account</a></li>
                                                <li>

                                                    <a href="{{ route('customer#editaccpage') }}">My Profile</a></li>
                                                <li>

                                                    <a href="{{ route('customer#accountaddresspage') }}">Address Book</a></li>
      
                                                <li>

                                                    <a href="{{ route('customer#accountorderpage') }}">My Orders</a></li>
  
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                        <div class="dash__pad-1">
                                            <ul class="dash__w-list">
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>

                                                        <span class="dash__w-text">{{ $orderdata->count() }}</span>

                                                        <span class="dash__w-name">Orders Placed</span></div>
                                                </li>
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                                                        <span class="dash__w-text">0</span>

                                                        <span class="dash__w-name">Cancel Orders</span></div>
                                                </li>
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                                                        <span class="dash__w-text">0</span>

                                                        <span class="dash__w-name">Wishlist</span></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Change Password.</h1>

                                            <span class="dash__text u-s-m-b-30">You can change your password safely.</span>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form action="{{ route('customer#updatepassword') }}" class="dash-edit-p" method="post">
                                                        @csrf
                                                        <div class="gl-inline">

                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="reg-lname"> Old Password *</label>
                                                                <div id="input-group" >
                                                                <input class="input-text input-text--primary-style" type="password" id="reg-lname" name="oldpassword" placeholder="Doe">
                                                                </div>
                                                                @error("oldpassword")  <small class="text-danger">{{ $message }}</small>  @enderror
                                                                @if(session("error")) <small class="text-danger">{{ session("error") }}</small>   @endif
                                                              </div>

                                                              <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="reg-lname"> New Password *</label>
                                                                <div  id="input-group" class="d-flex align-items-center">
                                                                  <input class="input-text input-text--primary-style" type="password" id="reg-lname" name="newpassword" placeholder="Doe">
                                                                <span id="showpass" class="mx-2"><i class="zmdi zmdi-eye-off"></i></span>
                                                              </div>
                                                                @error("newpassword")  <small class="text-danger">{{ $message }}</small>  @enderror
                                                                </div>


                                                      <div class="text-center"><button class="btn btn--e-brand-b-2" type="submit">Change</button></div>
                                                    </form>
                                                  </div>
                                                  @if(session("status"))
                                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <div class="d-flex align-items-center">
                                                          <strong>{{ session("status") }} , Please Logout your account here.</strong>
                                                          <form action="{{ route('logout') }}" method="post">@csrf <button  class="btn btn--e-brand-b-2 px-3">Logout</button></form>
                                                      </div>
                                                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>
                                                  @endif
                                        </div>
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
      //show pass
      $("#showpass").on("click",function(){
        let input = $(this).closest("#input-group").find("input");
        let inputType = input.attr("type");
        let newinputType = inputType === "password" ? "text" : "password";
        input.attr("type",newinputType);
        newinputType === "text" ? $("#showpass").find("i").attr("class","zmdi zmdi-eye") : $("#showpass").find("i").attr("class","zmdi zmdi-eye-off");
    })
</script>
@endsection