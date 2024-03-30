@extends("layoutforadmin.extension")

@section("content")
<div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
<main class="mdl-layout__content">
        <div class="mdl-card mdl-card__login mdl-shadow--2dp">
          <form action="{{ route('admin#createcategory') }}" method="post">
            @csrf
                <div class="mdl-card__supporting-text color--dark-gray">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                            <span class="login-name text-color--white">Create Category</span>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="text" id="e-mail" name="name">
                                <label class="mdl-textfield__label" for="e-mail">Category...</label>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                          <div class="mdl-layout-spacer"></div>
                          <button class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                              Create
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
            </div>
    </main>
    </div>
@endsection