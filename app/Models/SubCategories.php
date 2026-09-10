<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';
    protected $fillable = [
        'cat_id',
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function Endcategories(){
        return $this->hasMany(ItemCategory::class, 'sub_cat_id', 'id')->where('status', '1');
    }
}
