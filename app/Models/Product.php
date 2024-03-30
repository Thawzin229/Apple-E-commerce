<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Viewcount;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "category_id",
        "type_id",
        "specification",
        "description",
        "image",
        "price",


    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function scopeFetchData($query,$filter_data)
    {
        $search  = "%".preg_replace('/[^A-Za-z0-9]/','',$filter_data['search'])."%";
        $query->select("name",'id','price',DB::raw("DATE_FORMAT(created_at,'%M %e %Y') as date"))
        ->when($filter_data,function($table,$filter_data) use ($search){
            $table->orwhereRaw("regexp_replace(name,'[^A-Za-z0-9]','') like ?",[$search])
            ->orwhere('category_id',$filter_data['category_id'])
            ->orwhere('type_id',$filter_data['type_id'])
            ->paginate();
        })
        ->addSelect(['category' => Category::select('name')->whereColumn('id','products.category_id')])
        ->addSelect(['type' => Type::select('name')->whereColumn('id','products.type_id')])
        ->addSelect(['view' => Viewcount::select(DB::raw("COUNT(product_id) as view"))->whereColumn('product_id','products.id')])
        ->addSelect(['comments' => Feedback::select(DB::raw("COUNT(product_id) as comment"))->whereColumn('product_id','products.id')]);
    }
}
