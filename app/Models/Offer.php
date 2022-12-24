<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table="offers";
    protected $fillable=[
        'id', 'active', 'name', 'discount_role', 'category', 'main_items', 'relative_items', 'discount_value', 'discount_type', 'main_condition', 'relative_condition', 'place', 'show_offer', 'start_date', 'expire_date', 'shop_id', 'created_at', 'updated_at'
    ];
}
