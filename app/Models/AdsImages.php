<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsImages extends Model
{
    use HasFactory;
    protected $table = 'ads_images';
    protected $guarded = ['adv-1','adv-2','adv-3','adv-4'];
}
