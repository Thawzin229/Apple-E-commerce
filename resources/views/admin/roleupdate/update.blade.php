@extends("layoutforadmin.extension")

@section("content")
<div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
<main class="mdl-layout__content d-flex justify-content-center">
        <div class="mdl-cell mdl-cell--7-col mdl-card__login mdl-shadow--2dp">
          <form class="" action="{{ route('admin#updating') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="idforupdate" id="" value="{{ $data['id'] }}">

                <div class="mdl-card__supporting-text color--dark-gray">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-phone p-4">
                            <span class="login-name text-color--white">Update Product<i class="zmdi zmdi-edit ms-3"></i></span>
                            <select name="role" id=""  class="mdl-textfield__input mt-4">
                              <option @if($data['role'] === 'admin') selected @endif value="admin">Admin</option>
                              <option @if($data['role'] === 'customer') selected @endif value="customer">Customer</option>
                              </select>
                        </div>
                      </div>
                      <button class="btn p-3 mdl-cell mdl-cell--12-col color--light-blue">Change</button>
                    </div>
                  </form>
            </div>
    </main>
    </div>
@endsection