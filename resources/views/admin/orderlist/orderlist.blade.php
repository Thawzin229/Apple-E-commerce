@extends("layoutforadmin.extension")

@section("content")
<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
<div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title" id="title">
                      <div>
                      <h1 class="mdl-card__title-text">Customer's orderlists
                          <span class="mx-2"><i class="zmdi zmdi-bookmark"></i></span>
                        </h1>
                      </div>
                      <div>
                      <button class="btn btn-primary text-light"><a  style="text-decoration:none;color:white;" href="{{ url('admin/orderstatus/?status=1') }}">Pending</a></button>
                      <button class="btn btn-success text-light"><a  style="text-decoration:none;color:white;" href="{{ url('admin/orderstatus/?status=3') }}">Delivered</a></button>
                      <button class="btn btn-warning text-light"><a  style="text-decoration:none;color:white;" href="{{ url('admin/orderstatus/?status=2') }}">Processing</a></button>
                      </div>

                    </div>
                    <div class="mdl-card__supporting-text no-padding">
                    <table class="mdl-data-table mdl-js-data-table bordered-table col-lg-12 col-md-3 text-center">
                            <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric text-center">User</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Image</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Product Name</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Quantity</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Total Price</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">OrderCode</th>
                                <th class="mdl-data-table__cell--non-numeric text-center">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                              @if(count($orderlistdata) !== 0)
                            @foreach($orderlistdata as $item)
                              <tr>
                                <input type="hidden" name="" id="orderid" value="{{ $item['id'] }}">
                              <td class="mdl-data-table__cell--non-numeric text-center">User - {{ $item['user_id'] }}</td>
                              <td class="mdl-data-table__cell--non-numeric text-center"><img src="{{ asset('storage/'.$item['product_image']) }}" class="productimage" alt=""></td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $item['product_name'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['quantity'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['totalprice'] }} Kyats</td>
                                <td class="mdl-data-table__cell--non-numeric text-center">{{ $item['order_code'] }}</td>
                                <td class="mdl-data-table__cell--non-numeric d-flex justify-content-center align-items-center mt-5">
                                  <select class="form-control text-center w-50 changestatus" name="status" id="">
                                    <option @if($item['status'] === 1 ) selected @endif value="1">Pending</option>
                                    <option @if($item['status'] === 2 ) selected @endif value="2">Processing</option>
                                    <option @if($item['status'] === 3 ) selected @endif value="3">Delivered</option>
                                  </select>
                                </td>
                            </tr>
                              @endforeach
                              @else
                              <h4 class="text-center p-5">No result found <span class="text-danger">{{ request("searchval") }}</span></h4>
                              @endif
                            </tbody>
                          </table>
                          <div class="mt-3">{{ $orderlistdata->links() }}</div>
                        <div class="mt-4"></div>
                </div>
                </div>
@endsection

@section("js")
<script>
$(".changestatus").change(function(){
  $status = $(this).val();
  $parent = $(this).parents("tr");
  $orderid =$parent.find("#orderid").val();
  $data = {"status":$status,"id":$orderid};
  console.log($data);
  $.ajax({
            type:"get",
            data:$data,
            url:"http://127.0.0.1:8000/admin/changestatus",
            datatype:"json",
            success:function(data){
              if(data["status"] === "success"){
                window.location.href = "http://127.0.0.1:8000/admin/orderlist";
              }
                console.log(data);
            }
        })
})
</script>
@endsection