<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Currency;
use App\Models\Orders;
use Illuminate\Http\Request;

class ProductOrders extends Controller
{
    public function index(){
        $data['title'] = 'Customers Placed Orders';
        $data['orders'] = Orders::orderBy('created_at', 'DESC')->get();
        $data['currency'] = Currency::where('status', '1')->first();
        return view('admin.orders.index', $data);
    }

    public function cartPage(){
        $data['title'] = 'Cart Product Items';
        $data['carts'] = Cart::orderBy('created_at', 'DESC')->get();
        $data['currency'] = Currency::where('status', '1')->first();
        return view('admin.carts.index', $data);
    }
}
