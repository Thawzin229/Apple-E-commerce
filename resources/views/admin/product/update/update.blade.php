@extends('layoutforadmin.extension')

@section('content')
    <div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
        <main class="mdl-layout__content d-flex justify-content-center">
            <div class="mdl-cell mdl-cell--7-col mdl-card__login mdl-shadow--2dp">
                <form class="" action="{{ route('admin#update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="idforupdate" id="" value="{{ $data['id'] }}">

                    <div class="mdl-card__supporting-text color--dark-gray">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-phone">
                                <span class="login-name text-color--white">Update Product<i
                                        class="zmdi zmdi-edit ms-3"></i></span>
                                <div class="text-center mt-3"><img class="img-fluid" id="updateproductimage"
                                        src="{{ asset('storage/' . $data['image']) }}" alt=""></div>
                            </div>

                            <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-phone">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input value="{{ old('name', $data['name']) }}" class="mdl-textfield__input"
                                        type="text" id="e-mail" name="name">
                                    <label class="mdl-textfield__label" for="e-mail">Name...</label>
                                </div>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <select name="category_id" id="" class="mdl-textfield__input">
                                        @foreach ($categories as $item)
                                            <option @if ($item['id'] === $data['category_id']) selected @endif
                                                value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <label class="mdl-textfield__label" for="e-mail">Category...</label>
                                </div>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <select name="type_id" id="" class="mdl-textfield__input">
                                        @foreach ($types as $item)
                                            <option @if ($item['id'] === $data['type_id']) selected @endif
                                                value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <label class="mdl-textfield__label" for="e-mail">Type...</label>
                                </div>
                                @error('type_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <textarea class="mdl-textfield__input" name="specification" id="" cols="30" rows="4">
                                {{ $data['specification'] }}
                              </textarea>
                                    <label class="mdl-textfield__label" for="e-mail">Specification...</label>
                                </div>
                                @error('specification')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <textarea class="mdl-textfield__input" name="description" id="" cols="30" rows="4">
                              {{ $data['description'] }}
                            </textarea>
                                    <label class="mdl-textfield__label" for="e-mail">Description...</label>
                                </div>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input value="{{ old('price', $data['price']) }}" class="mdl-textfield__input"
                                        type="text" id="e-mail" name="price">
                                    <label class="mdl-textfield__label" for="e-mail">Price...</label>
                                </div>
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="file" id="e-mail" name="image">
                                    <label class="mdl-textfield__label" for="e-mail">Image...</label>
                                </div>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                                <div class="mdl-layout-spacer"></div>
                                <div class="text-center">
                                    <button
                                        class="mdl-button mdl-cell--12-col mdl-js-button mdl-button--raised color--light-blue">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
