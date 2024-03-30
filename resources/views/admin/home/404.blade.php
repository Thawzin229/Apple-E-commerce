@extends("layoutforadmin.extension")

@section("content")
<div class="mdl-layout mdl-js-layout is-small-screen not-found">
    <main class="mdl-layout__content">
        <div class="mdl-card mdl-card__login mdl-shadow--2dp">
        <div class="mdl-card__supporting-text color--dark-gray">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <span class="mdl-card__title-text text-color--smooth-gray">DARKBOARD</span>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <span class="text--huge color-text--light-blue">404</span>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <span class="text--sorry text-color--white">Sorry, but there's nothing here</span>
                </div>
                <!--<a href="index.html">-->
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <a href="{{ route('admin#homepage') }}" class="mdl-button mdl-js-button color-text--light-blue pull-right">
                        Go Back
                    </a>
                </div>
                <!--</a>alignment--bottom-right-->
            </div>
        </div>
    </div>
    </main>
</div>
@endsection