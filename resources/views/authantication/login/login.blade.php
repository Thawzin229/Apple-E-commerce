<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="images/DB_16х16.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Material Dashboard Lite</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">


    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/lib/getmdl-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/lib/nv.d3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/application.min.css') }}">
    <!-- endinject -->

</head>
<body>

<div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
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
</div>

<!-- inject:js -->
<script src="{{ asset('admin/js/d3.min.js') }}"></script>
<script src="{{ asset('admin/js/getmdl-select.min.js') }}"></script>
<script src="{{ asset('admin/js/material.min.js') }}"></script>
<script src="{{ asset('admin/js/nv.d3.min.js') }}"></script>
<script src="{{ asset('admin/js/layout/layout.min.js') }}"></script>
<script src="{{ asset('admin/js/scroll/scroll.min.js') }}"></script>
<script src="{{ asset('admin/js/widgets/charts/discreteBarChart.min.js') }}"></script>
<script src="{{ asset('admin/js/widgets/charts/linePlusBarChart.min.js') }}"></script>
<script src="{{ asset('admin/js/widgets/charts/stackedBarChart.min.js') }}"></script>
<script src="{{ asset('admin/js/widgets/employer-form/employer-form.min.js') }}"></script>
<script src="{{ asset('admin/js/widgets/line-chart/line-charts-nvd3.min.js') }}"></script>
<script src="{{ asset('admin/js/widgets/map/maps.min.js') }}"></script>
<script src="{{ asset('admin/js/widgets/pie-chart/pie-charts-nvd3.min.js') }}"></script>
<script src="{{ asset('admin/js/widgets/table/table.min.js') }}"></script>
<script src="{{ asset('admin/js/widgets/todo/todo.min.js') }}"></script>
<!-- endinject -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>
</html>
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
