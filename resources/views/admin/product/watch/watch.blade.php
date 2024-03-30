@extends("layoutforadmin.extension")

@section("content")
<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
<div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title" id="title">
                        <h1 class="mdl-card__title-text">I-watch product table
                          <span class="mx-2"><i class="zmdi zmdi-watch"></i></span>
                        </h1>
                        <form action="{{ route('admin#watchpage') }}" method="get">
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
                        <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('admin#createwatchpage') }}"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal">Add i-watch</button></a></td>
                    </div>
                    <div class="mdl-card__supporting-text no-padding">
                    <table class="mdl-data-table mdl-js-data-table bordered-table col-lg-12 col-md-3 text-center">
                            <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric text-center">Id</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Name</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Category Name</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Type Name</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Price</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Specification</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Description</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Image</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Date</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                              @if(count($data) !== 0)
                            @foreach($data as $item)
                              <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['id'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['name'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['category_name'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['type_name'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['price'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['specification'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['description'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center"><img src="{{ asset('storage/'.$item['image']) }}" class="productimage" alt=""></td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['created_at']->format("d / M / Y") }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">
                                  <a href="{{ route('admin#deleteproduct',$item['id']) }}" class="text-decoration-none"><span class="label label--mini background-color--secondary p-3"><i class="zmdi zmdi-delete me-2"></i>Delete</span></a>
                                  <a href="{{ route('admin#updatepage',$item['id']) }}" class="text-decoration-none"><span class="label label--mini background-color--primary p-3"><i class="zmdi zmdi-border-color">Edit</i></span></a>
                                </td>
                            </tr>
                              @endforeach
                              @else
                              <h4 class="text-center p-5">No result found <span class="text-danger">{{ request("searchval") }}</span></h4>
                              @endif
                            </tbody>
                        </table>
                        <div class="mt-4">{{ $data->appends(request()->query())->links() }}</div>
                </div>
                </div>
@endsection