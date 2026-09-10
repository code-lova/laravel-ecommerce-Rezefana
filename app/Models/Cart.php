<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'table_carts';
    protected $fillable = [
        'product_id',
        'user_id',
        'price',
        'total_price',
        'quantity',
        'color_id',
        'size_id',
        'brand',
        'item_slug',
        'item_name',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }

    public function colors(){
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }



    public function sizes(){
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    public function ProductsImages(){
        return $this->hasMany(ProductImages::class, 'product_id', 'product_id');
    }



}
