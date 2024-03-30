<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="icon" type="image/png" href="images/DB_16х16.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">


    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">


</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <div class="mdl-layout-spacer"></div>
            <!-- Search-->



            <div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon message" id="inbox" data-badge="{{ $message->total() }}">
                mail_outline
            </div>
            <!-- Messages dropdown-->
            <ul class="mdl-menu mdl-list mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right mdl-shadow--2dp messages-dropdown"
                for="inbox">
                <li class="mdl-list__item">
                    You have {{$message->total()}} new messages!
                </li>
                @foreach($message as $item)
                <a class="text-decoration-none" href="http://127.0.0.1:8000/chatify/{{ $item['user_id'] }}">
                <li class="mdl-menu__item mdl-list__item mdl-list__item--two-line list__item--border-top">
                    <span class="mdl-list__item-primary-content">
                        <span class="mdl-list__item-avatar background-color--primary">
                            <text>U</text>
                        </span>
                        <span>{{ $item['name'] }}</span>
                        <span class="mdl-list__item-sub-title">{{ $item['body'] }}</span>
                    </span>
                    <span class="mdl-list__item-secondary-content">
                      <span class="label label--transparent">{{ $item['created_at']->format("i") }} min ago</span>
                    </span>
                </li>
                </a>
                @endforeach

            </ul>

            <div class="avatar-dropdown" id="icon">
                <span>{{ Auth::user()->name }}</span>
                @if(Auth::user()->image !== null)
                <img id="dropdownimage" class="img-fluid" src="{{ asset('storage/'.Auth::user()->image) }}" alt="">
                @else
                @if(Auth::user()->gender === "male")
                <img class="img-fluid" id="dropdownimage" src="{{ asset('male.png') }}" alt="">
                @else
                <img class="img-fluid" id="dropdownimage" src="{{ asset('female.jpeg') }}" alt="">
                @endif
                @endif
            </div>
            <!-- Account dropdawn-->
            <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
                for="icon">
                <li class="mdl-list__item mdl-list__item--two-line">
                    <span class="mdl-list__item-primary-content">
                        <span class="mdl-list__item-avatar">
                @if(Auth::user()->image !== null)
                <img id="innerimage" class="img-fluid" src="{{ asset('storage/'.Auth::user()->image) }}" alt="">
                @else
                @if(Auth::user()->gender === "male")
                <img class="img-fluid" id="innerimage" src="{{ asset('male.png') }}" alt="">
                @else
                <img class="img-fluid" id="innerimage" src="{{ asset('female.jpeg') }}" alt="">
                @endif
                @endif
                        </span>
                        <span>{{ Auth::user()->name }}</span>
                        <span class="mdl-list__item-sub-title">{{ Auth::user()->email }}</span>
                    </span>
                </li>
                <li class="list__item--border-top"></li>
                <li class="mdl-menu__item mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">account_circle</i>
                        <a href="{{ route('admin#accountpage') }}" class="text-decoration-none text-light">My account</a>
                    </span>
                </li>
                <li class="list__item--border-top"></li>

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <li class="mdl-menu__item mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <button class="mdl-cell mdl-cell--12-col mdl-btn btn-dark px-3 d-flex justify-content-center align-items-center">
                                <i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i>
                                LOGOUT
                            </button>
                        </span>
                    </li>
                    </form>
            </ul>

            <button id="more"
                    class="mdl-button mdl-js-button mdl-button--icon">
                <i class="material-icons">more_vert</i>
            </button>

            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp settings-dropdown"
                for="more">
                <li class="mdl-menu__item">
                    Settings
                </li>
                <a class="mdl-menu__item" href="https://github.com/CreativeIT/getmdl-dashboard/issues">
                    Support
                </a>
                <li class="mdl-menu__item">
                    F.A.Q.
                </li>
            </ul>
        </div>
    </header>

    <div class="mdl-layout__drawer">
        <header>darkboard</header>
        <div class="scroll__wrapper" id="scroll__wrapper">
            <div class="scroller" id="scroller">
                <div class="scroll__container" id="scroll__container">
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link mdl-navigation__link--current" href="{{ route('admin#homepage') }}">
                            <i class="material-icons" role="presentation">dashboard</i>
                            Category
                        </a>
                        <a class="mdl-navigation__link mdl-navigation__link--current" href="{{ route('admin#typepage') }}">
                            <i class="material-icons" role="presentation">dashboard</i>
                            Model
                        </a>
                        <div class="sub-navigation">
                            <a class="mdl-navigation__link">
                                <i class="material-icons">view_comfy</i>
                                product
                                <i class="material-icons">keyboard_arrow_down</i>
                            </a>
                            <div class="mdl-navigation">
                                <a class="mdl-navigation__link" href="{{ route('admin#iphoneproductpage') }}">
                                    I-Phone
                                </a>
                                <a class="mdl-navigation__link" href="{{ route('admin#macbookpage') }}">
                                    Macbook  
                                </a>
                                <a class="mdl-navigation__link" href="{{ route('admin#watchpage') }}">
                                    i-watch
                                </a>
                                <a class="mdl-navigation__link" href="{{ route('admin#ipadpage') }}">
                                    i-pad
                                </a>
                            </div>
                        </div>
                        <a class="mdl-navigation__link" href="{{ route('admin#customerlist') }}">
                            <i class="material-icons">developer_board</i>
                            Customers
                        </a>
                        <a class="mdl-navigation__link" href="{{ route('admin#accountpage') }}">
                            <i class="material-icons" role="presentation">person</i>
                            Account
                        </a>
                        <a class="mdl-navigation__link" href="{{ route('admin#orderlistpage') }}">
                            <i class="material-icons" role="presentation">map</i>
                            OrderLists
                        </a>
                        <a class="mdl-navigation__link" href="{{ route('admin#memberlist') }}">
                            <i class="material-icons">multiline_chart</i>
                            Members
                        </a>

                        <div class="mdl-layout-spacer"></div>
                        <hr>
                        <a class="mdl-navigation__link" href="https://github.com/CreativeIT/getmdl-dashboard">
                            <i class="material-icons" role="presentation">link</i>
                            GitHub
                        </a>
                    </nav>
                </div>
            </div>
            <div class='scroller__bar' id="scroller__bar"></div>
        </div>
    </div>

    <main class="mdl-layout__content">

        <div class="mdl-grid mdl-grid--no-spacing dashboard">

            <div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
              @yield("content")              
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- endinject -->
@yield("js")

</body>
</html>
