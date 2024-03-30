@extends("layoutforadmin.extension")
@section("content")

<main class="mdl-layout__content ui-form-components">

<div class="mdl-grid mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top d-flex justify-content-center">

    <div class="mdl-cell mdl-cell--7-col-desktop mdl-cell--7-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h5 class="mdl-card__title-text text-color--white">Put a member</h5>
            </div>
            <div class="mdl-card__supporting-text">
                <form method="post" action="{{ route('admin#createteam') }}" class="form form--basic" enctype="multipart/form-data">
                  @csrf
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone form__article">
                            <h3 class="text-color--smooth-gray">Be stay tune !</h3>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input name="name" class="mdl-textfield__input" type="text" id="floating-first-name">
                                <label class="mdl-textfield__label" for="floating-first-name">Name</label>
                                @error("name") <div><small class="text-danger">{{ $message}}</small></div> @enderror
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input name="career" class="mdl-textfield__input" type="text" id="floating-last-name">
                                <label class="mdl-textfield__label" for="floating-last-name">Profession</label>
                                @error("career") <div><small class="text-danger">{{ $message}}</small></div> @enderror
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input name="image" class="mdl-textfield__input" type="file" id="floating-e-mail">
                                <label class="mdl-textfield__label" for="floating-e-mail">Image</label>
                            </div>
                              <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal mt-4">Create</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

</main>

@endsection  
