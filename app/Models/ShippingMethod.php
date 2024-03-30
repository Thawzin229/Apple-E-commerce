<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "order_code",
        "email",
        "phnumber",
        "country",
        "province",
        "order_note",
        "payment_method",
    ];
}
