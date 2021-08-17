<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'price', 'description', 'additional_info', 'category_id'];

    protected $table = 'products';
    public function category(){
        return $this->hasOne(Category::class, 'id','category_id');
        // return $this->belongsTo(Category::class,'id','category_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function categoriies(){

        return $this->belongsTo('Category');
    }
}
