<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table="pages";
    protected $fillable=[
        'id', 'title', 'image', 'text', 'english_text', 'category_id', 'name', 'created_at', 'updated_at', 'shop_id'
    ];
    protected $appends = array('image_url');
    public function scopeSelection($query)
    {
        return $query->select( 'title', 'image', 'text','english_text' );
    }

    public function getImageUrlAttribute()
    {
        if ($this->image && file_exists(public_path($this->image))) {
            return url($this->image);
        }

        return asset('V1/assets/images/blog/01.webp');
    }
}
