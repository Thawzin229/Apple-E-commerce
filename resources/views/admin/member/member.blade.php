@extends("layoutforadmin.extension")

@section("content")

<main class="mdl-layout__content">
        <div class="mdl-grid ui-cards">
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                <h3>Members</h3>
                <a href="{{ route('admin#createmember') }}"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal mt-3">Add Member</button></a>
            </div>
            @foreach($memberlistdata as $item)
            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                <div class="mdl-card mdl-shadow--2dp">

                  <img style="width:100%;height:300px" src="{{ asset('storage/'.$item['image']) }}" alt="">
                  <h2 class=" text-light text-left ms-3 mt-3">{{ $item['name'] }}</h2>
                  <div class="mdl-card__supporting-text">

                        <small>City in China</small>
                        <b>Career:</b> {{ $item['career'] }}
                        <br>
                        <div class="d-flex justify-content-between align-items-center parent">
                        <b>Became member at : {{ $item['created_at']->format("d-M-Y") }}</b> 
                        <br>
                        <a href="{{ route('admin#deletemember',$item['id']) }}"><i class="zmdi zmdi-delete" style="font-size:30px"></i></a>
                        </div>


                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </main>
@endsection

