<?php

namespace App\Models;

use App\Models\Color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = 'product_colors';
    protected $fillable = ['product_id', 'product_color_id'];

    public function pcolorName(){
        return $this->belongsTo(Color::class, 'product_color_id', 'id');
    }
}
