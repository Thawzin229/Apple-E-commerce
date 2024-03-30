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

                                        <a href="{{ route('customer#editaccpage') }}">Edit Account</a></li>
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

                                                    <a href="{{ route('customer#accountaddresspage') }}">Address Book</a>
                                                </li>
                 
                                                <li>

                                                    <a href="{{ route('customer#accountorderpage') }}">My Orders</a>
                                                </li>
                   
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
                                            <h1 class="dash__h1 u-s-m-b-14">Edit Profile</h1>

                                            <span class="dash__text u-s-m-b-30">Looks like you haven't update your profile</span>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form action="{{ route('customer#updateAcc') }}" class="dash-edit-p" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                    <div class="dash__link dash__link--secondary u-s-m-b-30 text-center">
                                                        <div class="">
                                                        @if(Auth::user()->image === null)
                                                        @if(Auth::user()->gender === "male")
                                                        <img style="width:250px;height:250px;border:2px solid #FA4400" class="shadow" src="{{ asset('male.png') }}" alt="">
                                                        @else
                                                        <img style="width:250px;height:250px;border:2px solid #FA4400" class="shadow" src="{{ asset('female.jpeg') }}" alt="">
                                                        @endif
                                                        @else
                                                        <img style="width:250px;height:250px;border:2px solid #FA4400" class="shadow" src="{{ asset('storage/'. Auth::user()->image ) }}" alt="">
                                                        @endif
                                                        </div>
                                                        <input style="width:250px;margin:0 auto;border:2px solid #FA4400;" type="file" name="image" id="" class="input-file input-file--primary-style form-control">

                                                        </div>
                                                        <div class="gl-inline">

                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="reg-lname"> NAME *</label>

                                                                <input class="input-text input-text--primary-style" type="text" id="reg-lname" name="name" placeholder="Doe" value="{{ old('name',Auth::user()->name) }}">
                                                            @error("name")  <small class="text-danger">{{ $message }}</small>  @enderror
                                                              </div>

                                                              <div class="u-s-m-b-30">

                                                            <label class="gl-label" for="gender">GENDER</label>
                                                            <select class="select-box select-box--primary-style u-w-100" id="gender" name="gender">
                                                                <option selected>Select</option>
                                                                <option value="male" @if(Auth::user()->gender === "male") selected @endif>Male</option>
                                                                <option value="female" @if(Auth::user()->gender === "female") selected @endif>Female</option>
                                                            </select>
                                                            @error("gender")  <small class="text-danger">{{ $message }}</small>  @enderror
                                                            </div>
                                                        </div>
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">
                                                                <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>

                                                                <input class="input-text input-text--primary-style" type="text" id="reg-lname" name="email" placeholder="Doe" value="{{ old('email',Auth::user()->email) }}">
                                                            @error("email")  <small class="text-danger">{{ $message }}</small>  @enderror
                                                                </div>

                                                            <div class="u-s-m-b-30">
                                                                <h2 class="dash__h2 u-s-m-b-8">Phone</h2>

                                                                <input class="input-text input-text--primary-style" type="text" id="reg-lname" name="phnumber" placeholder="Doe" value="{{ old('phnumber', Auth::user()->phnumber) }}">
                                                            @error("phnumber")  <small class="text-danger">{{ $message }}</small>  @enderror
                                                        </div>
                                                      </div>
                                                      <div class="gl-inline">
                                                                <div class="u-s-m-b-30">
                                                                <h2 class="dash__h2 u-s-m-b-8">Address</h2>
                                                                <input class="input-text input-text--primary-style" type="text" id="reg-lname" name="address" placeholder="Doe" value="{{ old('address',Auth::user()->address) }}">
                                                            @error("address")  <small class="text-danger">{{ $message }}</small>  @enderror
                                                                </div>
                                                      </div>


                                                      <div class="text-center"><button class="btn btn--e-brand-b-2 w-50" type="submit">SAVE</button></div>
                                                    </form>
                                                    <div><a href="{{ route('customer#changepasswordpage') }}">change password?</a></div>
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
            <!--====== End - Section 2 ======-->
@endsection