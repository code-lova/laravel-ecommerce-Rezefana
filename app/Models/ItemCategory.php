<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory;
    protected $table = 'item_categories';
    protected $fillable = [
        'cat_id',
        'sub_cat_id',
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

    public function subcategory(){
        return $this->belongsTo(SubCategories::class, 'sub_cat_id', 'id');
    }
}
