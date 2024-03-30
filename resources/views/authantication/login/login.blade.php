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
                            <span class="login-name text-color--white">Sign in</span>
                            <span class="login-secondary-text text-color--smoke">Enter fields to enjoy your exploration</span>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                          <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="text" id="e-mail" name="email" value="{{ old('email') }}">
                                <label class="mdl-textfield__label" for="e-mail">Email</label>
                            </div>
                            @error("email") <small class="text-danger">{{ $message }}</small> @enderror
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <div class="d-flex justify-content-center align-items-center" id="input-group">
                                <input class="mdl-textfield__input" type="password" id="password" name="password" value="{{ old('password') }}">
                                <div id="showpass" class="mx-2"><i class="zmdi zmdi-eye-off"></i></div>
                                </div>
                                <label class="mdl-textfield__label" for="password">Password</label>
                            </div>
                            @error("password") <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                            <a href="{{ route('auth#registerpage') }}" class="login-link">Don't have account?</a>
                            <div class="mdl-layout-spacer"></div>

                                <button class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                                    SIGN IN
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