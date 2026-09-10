<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'
    ];

    public function products(){
        return $this->hasMany(Products::class, 'cat_id', 'id');
    }

    public function Subcategories(){
        return $this->hasMany(SubCategories::class, 'cat_id', 'id')->where('status', '1');
    }

    public function Endcategories(){
        return $this->hasMany(ItemCategory::class, 'cat_id', 'id')->where('status', '1');
    }

    public function brands(){
        return $this->hasMany(Brands::class, 'category_id', 'id')->where('status', '1');
    }



}
