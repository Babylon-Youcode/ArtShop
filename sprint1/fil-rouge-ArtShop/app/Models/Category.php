<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Subcategory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description'];

    public function subcategory(){
        return $this->hasMany(Subcategory::class);
    }

    public function products(){

        return $this->hasMany(Product::class);
    }
}
