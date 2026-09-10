<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaQ extends Model
{
    use HasFactory;
    protected $table = "fa_q_s";
    protected $fillable = ['http','head_title','question','answer'];

}
