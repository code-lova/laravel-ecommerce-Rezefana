<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoFavicon extends Model
{
    use HasFactory;
    protected $table = 'logo_favicons';
    protected $fillable = ['logo','logo2','favicon'];
}
