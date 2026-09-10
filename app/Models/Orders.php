<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'product_id',
        'reference',
        'payment_status',
        'user_id',
        'email',
        'delivery_status',
        'price',
        'total_price',
        'item_slug',
        'item_name',
        'quantity',
        'color',
        'size',
        'brand',
        'method',
        'payment_receipt',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }

    public function colors(){
        return $this->belongsTo(Color::class, 'color', 'id');
    }

    public function sizes(){
        return $this->belongsTo(Size::class, 'size', 'id');
    }

    public function ProductsImages(){
        return $this->hasMany(ProductImages::class, 'product_id', 'product_id');
    }

}
