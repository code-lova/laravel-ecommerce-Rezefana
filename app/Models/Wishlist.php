<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $fillable = [
        'product_id',
        'user_id',
        'item_slug',
        'item_name',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }


    public function ProductsImages(){
        return $this->hasMany(ProductImages::class, 'product_id', 'product_id');
    }


}
