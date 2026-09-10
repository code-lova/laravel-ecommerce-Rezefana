<?php

namespace App\Http\Controllers\Admin;

use App\Models\States;
use App\Models\Currency;
use App\Models\ShippingCost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function wishListPage(){
        $data['title'] = 'Wishlist Table';
        $data['wishlist'] = Wishlist::all();
        $data['state'] = States::all();
        $data['currency'] = Currency::where('status', '1')->first();
        return view('admin.wishlist.index', $data);
    }

    public function DestroyWishlist(int $wishlist_id){
        $review = Wishlist::findOrFail($wishlist_id);
        $review->delete();
        return redirect()->back()->with('message', 'Data Deleted Successfully');
    }
}
