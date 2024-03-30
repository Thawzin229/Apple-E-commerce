@extends("layoutforadmin.extension")

@section("content")
<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
<div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title" id="title">
                        <h1 class="mdl-card__title-text">Type table
                          <span class="mx-2"><i class="zmdi zmdi-collection-bookmark"></i></span>
                        </h1>
                        <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('admin#createtypepage') }}"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal">Add Type</button></a></td>
                    </div>
                    <div class="mdl-card__supporting-text no-padding">
                    <table class="mdl-data-table mdl-js-data-table bordered-table col-lg-12 col-md-3">
                            <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric">Id</th>
                                <th class="mdl-data-table__cell--non-numeric">Name</th>
                                <th class="mdl-data-table__cell--non-numeric">Date</th>
                                <th class="mdl-data-table__cell--non-numeric">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                              <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['id'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['name'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['created_at']->format("d / M / Y") }}</td>
                                <td class="mdl-data-table__cell--non-numeric"><a href="{{ route('admin#deletetype',$item['id']) }}" class="text-decoration-none"><span class="label label--mini background-color--secondary p-2"><i class="zmdi zmdi-delete me-2"></i>Delete</span></a></td>
                            </tr>
                              @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">{{ $data->links() }}</div>
                </div>
                </div>
@endsection