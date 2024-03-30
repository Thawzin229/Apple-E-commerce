@extends("layoutforadmin.extension")

@section("content")
<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
<div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title" id="title">
                        <h1 class="mdl-card__title-text">Customer table
                          <span class="mx-2"><i class="zmdi zmdi-walk"></i></span>
                        </h1>
                        <form action="{{ route('admin#customerlist') }}" method="get">
                          @csrf
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                    <i class="material-icons">search</i>
                </label>

                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search" name="searchval"/>
                    <label class="mdl-textfield__label" for="search">Enter your query...</label>
                </div>
            </div>
            </form>
                    </div>
                    <div class="mdl-card__supporting-text no-padding">
                    <table class="mdl-data-table mdl-js-data-table bordered-table col-lg-12 col-md-3 text-center">
                            <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric text-center">Id</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Image</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Name</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Email</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Gender</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Address</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Ph-Number</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Role</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Date</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($data) !== 0)
                            @foreach($data as $item)
                              <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['id'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">
                                @if($item['image'] !== null)
                                <img class="productimage" src="{{ asset('storage/'.$item['image']) }}" alt="">
                                @else
                                @if($item['gender'] === "male")
                                <img class="productimage" id="" src="{{ asset('male.png') }}" alt="">
                                @else
                                <img class="productimage" id="" src="{{ asset('female.jpeg') }}" alt="">
                                @endif
                                @endif
                                </td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['name'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['email'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['gender'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['address'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['phnumber'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['role'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['created_at']->format("d / M / Y") }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">
                                  <a href="{{ route('admin#deletecustomer',$item['id']) }}" class="text-decoration-none"><span class="label label--mini background-color--secondary p-2"><i class="zmdi zmdi-delete me-2"></i>Delete</span></a>
                                  <a href="{{ route('admin#updaterole',$item['id']) }}" class="text-decoration-none"><span class="label label--mini background-color--primary p-2"><i class="zmdi zmdi-edit me-2"></i>Change Role</span></a>

                              </td>
                            </tr>
                              @endforeach
                              @else
                              <h4 class="text-light text-center p-4">No Customer found : <span class="text-danger">'{{ request('searchval') }}'</span></h4>
                              @endif
                            </tbody>
                        </table>
                </div>
                </div>
@endsection