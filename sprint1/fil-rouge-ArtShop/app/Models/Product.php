<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'price', 'description', 'additional_info', 'category_id'];

    public function category(){
        return $this->hasOne(Category::class, 'id','category_id');
        // return $this->belongsTo(Category::class,'id','category_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
