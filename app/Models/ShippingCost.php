<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
    use HasFactory;
    protected $table = 'shipping_costs';
    protected $fillable = ['state_id', 'amount'];

    public function state(){
        return $this->belongsTo(States::class, 'state_id', 'id');
    }
    
}
