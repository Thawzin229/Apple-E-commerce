@extends("layoutforauth.extension")

@section("content")
<main class="mdl-layout__content">
        <div class="mdl-card mdl-card__login mdl-shadow--2dp">
        <div class="mdl-card__supporting-text color--dark-gray">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <span class="mdl-card__title-text text-color--smooth-gray">DARKBOARD</span>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <span class="login-name text-color--white">Sign up for 
                    <i class="zmdi zmdi-apple mx-2"></i>
                    </span>
                </div>
                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input class="mdl-textfield__input" type="text" id="name" name="name" value="{{ old('name') }}">
                        <label class="mdl-textfield__label" for="name">Name</label>
                    </div>
                    @error("name") <small class="text-danger">{{ $message }}</small>  @enderror
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input class="mdl-textfield__input" type="text" id="e-mail" name="email" value="{{ old('email') }}">
                        <label class="mdl-textfield__label" for="e-mail">Email</label>
                    </div>
                    @error("email") <small class="text-danger">{{ $message }}</small>  @enderror

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                      <select name="gender" id="" class="mdl-textfield__input" value="{{ old('gender') }}">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                        <label class="mdl-textfield__label" for="name">Gender</label>
                    </div>
                    @error("gender") < class="text-danger">{{ $message }}</>  @enderror

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input class="mdl-textfield__input" type="text" id="name" name="address" value="{{ old('address') }}">
                        <label class="mdl-textfield__label" for="name">Address</label>
                    </div>
                    @error("address") <small class="text-danger">{{ $message }}</small>  @enderror

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input class="mdl-textfield__input" type="text" id="name" name="phnumber" value="{{ old('phnumber') }}">
                        <label class="mdl-textfield__label" for="name">Ph-number</label>
                    </div>
                    @error("phnumber") <small class="text-danger">{{ $message }}</small>  @enderror

                    <div id=""  class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size input-group">
                        <div class="d-flex align-items-center">
                        <input class="mdl-textfield__input" type="password" id="password" name="password" value="{{ old('password') }}">
                        <div id="generateBtn" class="mx-2 border-radius-10 text-light"><i class="zmdi zmdi-refresh-sync"></i></div>
                        <div id="showpass" class="mx-2"><i class="zmdi zmdi-eye-off"></i></div>
                        </div>
                        <label class="mdl-textfield__label" for="password">Password</label>
                    </div>
                    @error("password") <small class="text-danger">{{ $message }}</small>  @enderror

                    <div id="" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size input-group">
                        <div class="d-flex">
                        <input class="mdl-textfield__input" type="password" id="confirm_password" name="password_confirmation">
                        </div>
                        <label class="mdl-textfield__label" for="password">Comfirm Password</label>
                    </div>
                    @error("password_confirmation") <small class="text-danger">{{ $message  }}</small> @enderror

                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect checkbox--colored-light-blue checkbox--inline d-flex align-items-center my-4" for="checkbox-1">
                        <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked>
                        <span class="login-link">I agree all statements in <a href="#" class="underlined">terms of service</a></span>
                      </label>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                    <a href="{{ route('auth#loginpage') }}" class="login-link">I have already signed up</a>
                    <div class="mdl-layout-spacer"></div>
                        <button  class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                            SIGN UP
                        </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </main>
@endsection

@section("js")
<script>
    //for random pass we gonna create a fn;
    function generatePass(){
        let charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()"
        let password = "";
        let length = 15;
        
        for (let i = 0; i < length; i++) {
            password += charset.charAt(Math.floor(Math.random()* charset.length));
        }
        return password;
    }


    $("#generateBtn").on("click",function(){
        let password = generatePass();
        $("#password").val($("#name").val()+password);
        $("#confirm_password").val($("#name").val()+password);
    })
    

    //show pass
    $("#showpass").on("click",function(){
        let input = $(this).closest(".input-group").find("input");
        let inputType = input.attr("type");
        let newinputType = inputType === "password" ? "text" : "password";
        input.attr("type",newinputType);
        newinputType === "text" ? $("#showpass").find("i").attr("class","zmdi zmdi-eye") : $("#showpass").find("i").attr("class","zmdi zmdi-eye-off");
    })
</script>
@endsection