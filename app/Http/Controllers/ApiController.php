<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Product;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\OrderList;
use App\Models\Viewcount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    // product 
    public function Product()
    {
        $sorting  = request("sorting");
        if($sorting !== null)
        {
            switch ($sorting) {
                case 'asc':return Product::orderBy('created_at',$sorting)->paginate();
                break;
                case 'desc':return Product::orderBy('created_at',$sorting)->paginate();
                break;
                case 'high':return Product::orderBy('price','desc')->paginate();
                break;
                case 'low':return Product::orderBy('price','asc')->paginate();
                break;
                
                default:
                    return;
                    break;
            }
        }
        $filter_data = [
            'search' => request("search"),
            'category_id' => request("category_id"),
            'type_id' => request("type_id"),
        ];
        $data = Product::query()->FetchData($filter_data)->paginate();
        return response()->json(['data'=>$data]);
    }
    // single product 
    public function Single($id)
    {
        $data = Product::where("id",$id)->first();
        return response()->json(['data'=>$data]);

    }

    // helper 
    public function validation()
    {
        return [
            'name' => "required",
            'price' => "required",
            'description' => "required",
            'specification' => "required",
            'category_id' => "required",
            'type_id' => "required",
        ];
    }

    // create 
    public function Create(Request $request)
    {
        $data = $request->validate($this->validation());
        Product::create($data);
        return response()->json(['status' => "created"]);

    }
    


    // updae 
    public function Update(Request $request,$id)
    {
        $data = $request->validate($this->validation());
        Product::where('id',$id)->update($data);
        return response()->json(['status' => "update"]);
    }
    // delete 
    public function Delete($id)
    {
        Product::where("id",$id)->delete();
        return response()->json(['status' => "delete"]);

    }
}
