@extends("layoutforadmin.extension")

@section("content")
<main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="#">
                <div class="mdl-card__title">
                    <h2>Account Information</h2>
                    <div class="mdl-card__subtitle">Please complete the form</div>
                </div>

                <div class="mdl-card__supporting-text">
                    <form action="{{ route('admin#updateaccount') }}" class="form" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="form__article p-3">
                            <h3>Personal data</h3>

                            <div class=" mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                  @if(Auth::user()->image !== null)
                                  <img id="userimage" class="img-fluid" src="{{ asset('storage/'.Auth::user()->image) }}" alt="">
                                  @else
                                  @if(Auth::user()->gender === "male")
                                  <img class="img-fluid" id="userimage" src="{{ asset('male.png') }}" alt="">
                                  @else
                                  <img class="img-fluid" id="userimage" src="{{ asset('female.jpeg') }}" alt="">
                                  @endif
                                  @endif
                                  <input type="file" name="image" id="" class="mdl-textfield__input">
                                  @error("image")  <small class="text-danger">{{ $message }}</small>  @enderror
                                </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text"  name="name" id="firstName" value="{{ old('name',Auth::user()->name) }}"/>
                                    <label class="mdl-textfield__label" for="firstName">First name</label>
                                  @error("name")  <small class="text-danger">{{ $message }}</small>  @enderror
                                </div>
                               
                            </div>




                                <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                  <select name="gender" id="" class="mdl-textfield__input">
                                    <option value="male" @if(Auth::user()->gender === "male") selected @endif>male</option>
                                    <option value="female" @if(Auth::user()->gender === "female") selected @endif>female</option>
                                    </select>
                                    <label class="mdl-textfield__label" for="gender">Gender</label>
                                </div>
                            </div>
                        </div>

                        <div class="form__article employer-form__contacts">
                            <h3 class="ms-3">Contacts</h3>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="material-icons pull-left">call</i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" name="phnumber" type="text" id="phone"value="{{ old('phnumber',Auth::user()->phnumber) }}">
                                        <label class="mdl-textfield__label" for="phone">XXX-XX-XX</label>
                                  @error("phnumber")  <small class="text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="material-icons pull-left">mail_outline</i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" name="email"  type="text" id="email" value="{{ old('email',Auth::user()->email) }}"/>
                                        <label class="mdl-textfield__label" for="email">Email</label>
                                  @error("email")  <small class="text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--9-col input-group">
                                    <i class="material-icons pull-left">place</i>

                                    <div class="mdl-textfield mdl-js-textfield pull-left">
                                        <input class="mdl-textfield__input" type="text" name="address" id="address" value="{{ old('address',Auth::user()->address) }}"/>
                                        <label class="mdl-textfield__label" for="address">Address</label>
                                  @error("address")  <small class="text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="form__action p-5">
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="isInfoReliable">
                                <input type="checkbox" id="isInfoReliable" class="mdl-checkbox__input" required/>
                                <span class="mdl-checkbox__label">Are you sure to save changes ?</span>
                            </label>
                            <button id="submit_button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored px-4">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
@endsection