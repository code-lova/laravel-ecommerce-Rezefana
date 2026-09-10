<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Wishlist;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $data['title'] = 'Dashboard';
            $data['users'] = User::select("*")
                            ->whereNotNull('last_seen')
                            ->orderBy('last_seen', 'DESC')
                            ->paginate(5);
        $data['totalusers'] = User::count();

        $data['totalorders'] = Orders::count();
        // $data['pendingOrders'] = Orders::where('payment_status', '0')->count();
        // $data['PaidOrders'] = Orders::where('payment_status', '2')->count();
        // $data['ProcessingOrders'] = Orders::where('payment_status', '1')->count();
        // $data['CancelledOrders'] = Orders::where('payment_status', '3')->count();
        $data['totalproducts'] = Products::count();
        $data['totalWishlist'] = Wishlist::count();
        $data['totalCart'] = Cart::count();
        return view('admin.dashboard', $data);

    }
}
