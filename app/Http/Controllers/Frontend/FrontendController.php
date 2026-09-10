<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Cart;
use App\Models\User;
use App\Models\Banner;
use App\Models\Orders;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Products;
use App\Models\Switcher;
use App\Models\AdsImages;
use App\Models\StarRating;
use App\Models\LogoFavicon;
use App\Models\ProductSize;
use App\Models\CallToAction;
use App\Models\ItemCategory;
use App\Models\ProductColor;
use App\Models\ShippingCost;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\SubCategories;
use App\Models\HomepageSlider;
use App\Models\ShippingCostAll;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function Frontend(){
        $data['setting'] = SiteSettings::find(1);
        $data['homeSlider'] = HomepageSlider::find(1);
        $category=$data['category'] = Category::with(['Subcategories',])->with(['Endcategories'])->where('status', '1')->get();
        $data['logo'] = LogoFavicon::find(1);
        $data['currency'] = Currency::where('status','1')->first();
        $data['cta'] = CallToAction::find(1);
        $data['banner'] = Banner::find(1);
        $data['switcher'] = Switcher::find(1);
        $data['adsImage'] = AdsImages::find(1);
        $data['trendingWomenClothing'] = Products::where('cat_id','3')->where('sub_cat_id','4')->where('trending','1')->limit(7)->latest()->get();
        $data['trendingMenClothing'] = Products::where('cat_id','1')->where('sub_cat_id','1')->where('trending','1')->limit(7)->latest()->get();
        $data['featuredWomenfootware'] = Products::where('cat_id','3')->where('sub_cat_id','5')->limit(5)->latest()->get();
        $data['featuredMenfootware'] = Products::where('cat_id','1')->where('sub_cat_id','2')->limit(5)->latest()->get();
        $data['WomenBags'] = Products::where('cat_id','3')->where('sub_cat_id','6')->limit(5)->latest()->get();
        $data['MenBags'] = Products::where('cat_id','1')->where('sub_cat_id','11')->limit(5)->latest()->get();
        return view('frontend.index', $data);
    }


    public function SearchPage(Request $request){
        //return $request->input();
        $data['name'] = $request->input('query');
        $data['title'] = 'Serach Result';
        $category=$data['category'] = Category::with(['Subcategories',])->with(['Endcategories'])->where('status', '1')->get();
        $data['currency'] = Currency::where('status','1')->first();
        $data['setting'] = SiteSettings::find(1);
        $data['result'] = Products::where('name', 'like', '%'.$request->input('query').'%')->paginate(10);
        $data['productcount'] = Products::where('name', 'like', '%'.$request->input('query').'%')->where('status', '1')->count();
        return view('frontend.search.index', $data);
    }


    //Here goes Sub category function view......

    public function viewSubcatProduct(string $subcategory_slug){
        $subcategory=$data['subcategory'] = SubCategories::where('slug', $subcategory_slug)->first();
        if($subcategory){
            $data['products']= Products::where('sub_cat_id', $subcategory->id)->where('status', '1')->paginate(10);
            $data['currency'] = Currency::where('status','1')->first();
            $data['productcount'] = Products::where('sub_cat_id', $subcategory->id)->where('status', '1')->count();
            $data['setting'] = SiteSettings::find(1);
            $data['brands'] = Brands::where('status', '1')->latest()->get();
            $category=$data['category'] = Category::with(['Subcategories',])->with(['Endcategories'])->where('status', '1')->get();
            if(FacadesRequest::get('filterbrand')){
                $checked = $_GET['filterbrand'];

                //Filter with name
                $subcategory_filter = Brands::whereIn('name', $checked)->get();
                $subcateid = [];
                foreach($subcategory_filter as $scid_list){
                    array_push($subcateid, $scid_list->name);
                }
                //End filter with name

                $data['products']= Products::whereIn('brand', $subcateid)->where('sub_cat_id', $subcategory->id)->where('status', '1')->paginate(10);

            }
            return view('frontend.collections.subcatproducts.index', $data);
        }else{
            return redirect()->back();
        }
    }


    //Here goes End category function view......
    public function viewEndcatProduct(string $endcategory_slug){
        $endcategory=$data['endcategory'] = ItemCategory::where('slug', $endcategory_slug)->first();
        if($endcategory){
            $productItem = $data['productItem'] = Products::where('end_cat_id', $endcategory->id)->where('status', '1')->get();
            $data['currency'] = Currency::where('status','1')->first();
            $data['productcount'] = Products::where('end_cat_id', $endcategory->id)->where('status', '1')->count();
            $data['setting'] = SiteSettings::find(1);
            $category=$data['category'] = Category::with(['Subcategories',])->with(['Endcategories'])->where('status', '1')->get();
            if(FacadesRequest::get('filterbrand')){
                $checked = $_GET['filterbrand'];

                //Filter with name
                $subcategory_filter = Brands::whereIn('name', $checked)->get();
                $subcateid = [];
                foreach($subcategory_filter as $scid_list){
                    array_push($subcateid, $scid_list->name);
                }
                //End filter with name

                $data['products']= Products::whereIn('brand', $subcateid)->where('sub_cat_id', $endcategory->id)->where('status', '1')->paginate(10);

            }
            return view('frontend.collections.endcatproducts.index', $data);
        }else{
            return redirect()->back();
        }
    }



    //Here is for viewing the product
    public function ViewProduct(string $category_slug, string $product_slug){
        $category_data = $data['category_data'] = Category::where('slug', $category_slug)->where('status', '1')->first();
        if ($category_data){
            $productItem = $data['productItem'] = Products::where('cat_id', $category_data->id)->where('slug', $product_slug)->where('status', '1')->first();
            $category=$data['category'] = Category::with(['Subcategories',])->with(['Endcategories'])->where('status', '1')->get();
            $relatedProduct=$data['relatedProduct'] = Products::where('cat_id', $category_data->id)->where('status', '1')->orderBy('created_at', 'DESC')->get()->take(5);
            $data['currency'] = Currency::where('status','1')->first();
            $data['setting'] = SiteSettings::find(1);
            $data['size'] = ProductSize::where('product_id', $productItem->id)->get();
            $data['color'] = ProductColor::where('product_id', $productItem->id)->get();
            $data['totalReview'] = Comment::where('product_id', $productItem->id)->count();
            $data['allReviews'] = Comment::where('product_id', $productItem->id)->orderBy('created_at', 'DESC')->get();
            $data['existingReviews'] = Comment::where('product_id', $productItem->id)->get();

            //$data['getRelatedProductReview'] = Comment::where('product_id', $products->id)->count();
            //Star Rating Starts Here
            $ratingCount=$data['ratingCount'] = Comment::where('product_id', $productItem->id)->get();
            $ratingSum=$data['ratingSum'] = Comment::where('product_id', $productItem->id)->sum('star_rating');
            if($ratingCount->count() > 0){
                $data['ratingValue'] = $ratingSum/$ratingCount->count();
            }
            else{
                $data['ratingValue'] = 0;
            }
            return view('frontend.collections.product_item', $data);
        }else{
            return redirect()->back();
        }
    }






    //Storing Review
    public function StoreReview(Request $request){
        if(Auth::check()){
            $validator = Validator::make($request->all(), [
                'comment'=> 'required|max:2000',
                'star_rating'=> 'required',
            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>400,
                    'message'=>$validator->errors()->first()
                ]);
            }
            $product = Products::where('id', $request->product_id)->where('status', '1')->first();
            if($product){
                $checkOrder= Orders::where('user_id', Auth::user()->id)->where('product_id', $product->id)->where('payment_status', '1')->first();
                if($checkOrder){

                    Comment::create([
                        'product_id' => $product->id,
                        'user_id' => Auth::user()->id,
                        'comment' => $request->comment,
                        'star_rating' => $request->star_rating,

                    ]);

                    return response()->json([
                        'status'=>200,
                        'message'=>'Product has been rated',
                    ]);
                }
                else{
                    return response()->json([
                        'status'=>403,
                        'message'=>'Please purchase this product first',
                    ]);
                }
            }
            else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Product was NOT Found',
                ]);
            }
        }
        else{
            return response()->json([
                'status'=>401,
                'message'=>'Please login to leave a review',
            ]);
        }
    }




    public function StoreCart(Request $request){

        if(Auth::check()){
            $validator = Validator::make($request->all(), [
                'product_id' => 'required',
                'price' => 'required',
                'brand' => 'required',
                'quantity' => 'required',
                'color_id' => 'required',
                'size_id' => 'required'
            ],[
                'color_id.required' => 'Please select a color for the product',
                'size_id.required' => 'Please select a size for the product',
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }else{
                $productAvability = Products::findOrFail($request->product_id);
                if($productAvability->quantity <= 0){
                    return redirect()->back()->with('error', 'Product is out of stock');
                }else{
                    $product = Products::where('id', $request->product_id)->where('status', '1')->first();
                    if($product){
                        $exitingCartProduct = Cart::where('product_id', $request->product_id)->get();
                        if($exitingCartProduct->count() > 0){
                            return redirect()->back()->with('warning', 'Product Already in Cart');
                        }else{
                            $qty = $request->quantity;

                            $carts = new Cart;
                            $carts->product_id = $product->id;
                            $carts->user_id = Auth::user()->id;
                            $carts->price = $request->price;
                            $carts->total_price = $request->price * $qty;
                            $carts->brand = $request->brand;
                            $carts->quantity = $qty;
                            $carts->color_id = $request->color_id;
                            $carts->size_id = $request->size_id;
                            $carts->item_slug = $request->item_slug;
                            $carts->item_name = $request->item_name;

                            $carts->save();
                            return redirect()->back()->with('message', 'Product Successfully Added to Cart');
                        }

                    }else{
                        return redirect()->back()->with('error', 'Product Was not found.');
                    }
                }

            }

        }else{
            return redirect('/login');
        }
    }


    //View Cart items
    public function ViewCartProducts(Request $request){
        if(Auth::check()){
            $data['title'] = "Shopping Cart";
            $data['currency'] = Currency::where('status','1')->first();
            $data['setting'] = SiteSettings::find(1);
            $category=$data['category'] = Category::with(['Subcategories',])->with(['Endcategories'])->where('status', '1')->get();
            $data['cartProducts'] = Cart::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
            $data['itemTotalPrice']= Cart::where('user_id', Auth::user()->id)->sum('total_price');
            //$data['catslug'] = DB::table('categories')->join('products', 'categories.id', '=', 'products.cat_id')->select('categories.slug')->get();
            return view('frontend.collections.cart.index', $data);
        }else{
            return redirect('/login');
        }
    }


    //Delete Item in cart
    public function destroyItem($id){
        if(Auth::check()){
            $CartID = Cart::where('id', $id)->where('user_id', Auth::user()->id)->first();
            if($CartID){
                $CartID->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Product Removed Successfully'
                ]);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Something Went Wrong'
                ]);
            }
        }else{
            return response()->json([
                'status'=>401,
                'message'=>'Please Login..!',
            ]);
        }
    }



    //Delete item in Wishlist
    public function deleteWishlistItem(int $item_id){
        if(Auth::check()){
            $WishlistID = Wishlist::where('id', $item_id)->where('user_id', Auth::user()->id)->first();
            if($WishlistID){
                $WishlistID->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Product Removed Successfully'
                ]);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Something Went Wrong'
                ]);
            }
        }else{
            return response()->json([
                'status'=>401,
                'message'=>'Please Login..!',
            ]);
        }
    }


    //Update Cart Quantity
    public function UpdateQuantity(Request $request){

        $prod_id = $request->input('prod_id');
        $quantity = $request->input('qty');
        $zeronum = ".00";
        $currency = Currency::where('status', '1')->first();
        $cc = $currency->symbol;

        $cartUpdate = Cart::findOrFail($prod_id);
        $cartUpdate->quantity = $quantity;
        $gtprice= $cartUpdate->total_price = $cartUpdate->price * $quantity;
        $finalprice = number_format($gtprice);
        $cartUpdate->save();
        return response()->json([
            'status' => 200,
            'message' => 'Product Updated Successfully',
            'totalprice' => ''.$cc.''.$finalprice.''.$zeronum.''
        ]);

    }

    //Adding product to wishlist
    public function AddItemtoWishlist(Request $request){
        if(Auth::check()){
            $prod_id = $request->input('prod_id');
            $prod_slug = $request->input('prod_slug');
            $prod_name = $request->input('prod_name');

            //Check if the product exist in our system
            if(Products::findOrFail($prod_id)){
                //Lets check if the product already exist in wishlist too
                $exitingWishlistProduct = Wishlist::where('product_id', $prod_id)->get();
                if($exitingWishlistProduct->count() > 0){
                    return response()->json([
                        'status' => 404,
                        'message' => 'Product Already in Wishlist',
                    ]);
                }else{
                    $wishlist = new Wishlist();
                    $wishlist->product_id = $prod_id;
                    $wishlist->user_id = Auth::user()->id;
                    $wishlist->item_slug = $prod_slug;
                    $wishlist->item_name = $prod_name;
                    $wishlist->save();
                    return response()->json([
                        'status' => 200,
                        'message' => 'Product added to wishlist',
                    ]);
                }

            }else{
                return redirect()->back();
            }
        }else{
            return redirect('/login');
        }

    }


    //Wishlist Page
    public function Wishlistpage(){
        if(Auth::check()){
            $data['title'] = "Wishlist";
            $data['currency'] = Currency::where('status','1')->first();
            $data['setting'] = SiteSettings::find(1);
            $category=$data['category'] = Category::with(['Subcategories',])->with(['Endcategories'])->where('status', '1')->get();
            $data['wishlistProducts'] = Wishlist::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
            $data['product'] = Products::where('status', '1')->get();
            $data['user'] = User::findOrFail(Auth::user()->id);
            return view('frontend.collections.wishlist.index', $data);

        }else{
            return redirect('/login');
        }
    }


    //Checkout page
    public function CheckoutPage(){
        if(Auth::check()){
            $checkcart = Cart::where('user_id', Auth::user()->id)->count();
            if($checkcart > 0){
                $data['title'] = "Checkout";
                $data['currency'] = Currency::where('status','1')->first();
                $data['setting'] = SiteSettings::find(1);
                $category=$data['category'] = Category::with(['Subcategories',])->with(['Endcategories'])->where('status', '1')->get();
                $data['cartProducts'] = Cart::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
                $data['itemTotalPrice']= Cart::where('user_id', Auth::user()->id)->sum('total_price');
                $data['user'] = User::findOrFail(Auth::user()->id);
                $data['shippingCost'] = ShippingCost::where('id', '1')->first();
                $data['shippingrestofstates'] = ShippingCostAll::findOrFail(1);
                $data['paymentMethodbk'] = PaymentMethod::where('id','1')->where('status', '1')->first();
                $data['paymentMethodcod'] = PaymentMethod::where('id','2')->where('status', '1')->first();
                $data['paymentMethodcc'] = PaymentMethod::where('id','3')->where('status', '1')->first();

                return view('frontend.collections.checkout.index', $data);
            }else{
                return redirect()->back();
            }

        }else{
            return redirect('/login');
        }
    }


    public function PlaceOrder(Request $request){

        if(Auth::check()){
            $checkcart = Cart::where('user_id', Auth::user()->id)->get();
            $ref = substr(str_shuffle("0123456789ABCDEFGHIJKLMONPQRSTUVWXYZ"), 0, 12);
            $user = User::findOrFail(Auth::user()->id);
            $restStates = ShippingCostAll::findOrFail(1);
            $Shipping = ShippingCost::findOrFail(1);
            $updateOrder_img = Orders::where('user_id', Auth::user()->id)->where('method', '1')->where('payment_status', '1')->get();


            if($user->state != $Shipping->state_id){
                $cost = $restStates->amount;
            }else{
                $cost = $Shipping->amount;
            }


                if($request->method == 1){
                    $validator = Validator::make($request->all(), [
                        'payment_receipt'=> 'required|mimes:png,jpg,jpeg',
                    ]);
                    if($validator->fails()){
                        return redirect()->back()->with('error', 'Payment Receipt Not Found');
                    }else{
                        //Looping through each data in the cart table
                        //Then getting the data to order table
                        foreach($checkcart as $data){
                            $makeorder = new Orders();
                            $makeorder->product_id = $data->product_id;
                            $makeorder->reference = $ref;
                            if($request->method == 1){
                                $makeorder->payment_receipt = "Generated";
                            }else{
                                $makeorder->payment_receipt = "No Receipt";
                            }
                            $makeorder->payment_status = 0;
                            $makeorder->user_id = Auth::user()->id;
                            $makeorder->email = Auth::user()->email;
                            $makeorder->price = $data->price;
                            $makeorder->total_price = $data->total_price;
                            $makeorder->item_slug = $data->item_slug;
                            $makeorder->item_name = $data->item_name;
                            $makeorder->quantity = $data->quantity;
                            $makeorder->color = $data->color_id;
                            $makeorder->size = $data->size_id;
                            $makeorder->brand = $data->brand;
                            $makeorder->method = $request->method;
                            $makeorder->save();

                            $cart_id = $data->id;
                            $cart = Cart::findOrFail($cart_id);
                            $cart->delete();
                        }

                        if($request->hasFile('payment_receipt')){
                            $file = $request->file('payment_receipt');
                            $filename = 'payment_receipt'. time() . '.' . $file->hashName();
                            $file->move('uploads/orders/', $filename);
                            $makeorder->payment_receipt = $filename;
                        }
                        $makeorder->save();
                    }

                    return redirect()->route('pay.success_page');



                }elseif($request->method == 2){
                    //Looping through each data in the cart table
                    //Then getting the data to order table
                    foreach($checkcart as $data){
                        $makeorder = new Orders();
                        $makeorder->product_id = $data->product_id;
                        $makeorder->reference = $ref;
                        if($request->method == 1){
                            $makeorder->payment_receipt = "Generated";
                        }else{
                            $makeorder->payment_receipt = "No Receipt";
                        }
                        $makeorder->user_id = Auth::user()->id;
                        $makeorder->email = Auth::user()->email;
                        $makeorder->price = $data->price;
                        $makeorder->total_price = $data->total_price;
                        $makeorder->item_slug = $data->item_slug;
                        $makeorder->item_name = $data->item_name;
                        $makeorder->quantity = $data->quantity;
                        $makeorder->color = $data->color_id;
                        $makeorder->size = $data->size_id;
                        $makeorder->brand = $data->brand;
                        $makeorder->method = $request->method;
                        $makeorder->save();

                        $cart_id = $data->id;
                        $cart = Cart::findOrFail($cart_id);
                        $cart->delete();
                    }
                    return redirect()->route('pay.success_page');


                }elseif($request->method == 3){
                    //Looping through each data in the cart table
                    //Then getting the data to order table
                    foreach($checkcart as $data){
                        $makeorder = new Orders();
                        $makeorder->product_id = $data->product_id;
                        $saferef=$makeorder->reference = $ref;
                        if($request->method == 1){
                            $makeorder->payment_receipt = "Generated";
                        }else{
                            $makeorder->payment_receipt = "No Receipt";
                        }
                        $makeorder->user_id = Auth::user()->id;
                        $makeorder->email = Auth::user()->email;
                        $makeorder->price = $data->price;
                        $rtmo = $makeorder->total_price = $data->total_price;
                        $makeorder->item_slug = $data->item_slug;
                        $makeorder->item_name = $data->item_name;
                        $makeorder->quantity = $data->quantity;
                        $makeorder->color = $data->color_id;
                        $makeorder->size = $data->size_id;
                        $makeorder->brand = $data->brand;
                        $mtd=$makeorder->method = $request->method;
                        $makeorder->save();

                        $checkReference = Orders::where('user_id', Auth::user()->id)->where('reference', $saferef)->where('payment_status','0')->first();
                        $sumtotal = DB::table('orders')->where('user_id', Auth::user()->id)->where('payment_status', '0')->where('method', $mtd)->latest()->sum(DB::raw('total_price'));
                        $final = $cost + $sumtotal;
                        $formData = [
                            'amount' => $final * 100,
                            'email' =>  Auth::user()->email,
                            'callback_url' => route('pay.callback', $checkReference->reference)
                        ];
                    }



                    $pay = json_decode($this->initiate_payment($formData));
                    if($pay){
                        //Check status of data if true or false
                        if($pay->status){
                            //dd($pay);
                            return redirect($pay->data->authorization_url);

                        }else{
                            return redirect()->back()->with('error', $pay->message);
                        }

                    }else{
                        return redirect()->back()->with('error', 'Something is Wrong');
                    }

                }

        }else{
            return redirect()->route('login');
        }


    }

    //starting payement request from paystack
    public function initiate_payment($formData){

        $url = "https://api.paystack.co/transaction/initialize";

        $fields_string = http_build_query($formData);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . env("PAYSTACK_SECRETE_KEY"),
            "Cache-Control: no-cache"
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;

    }

    //getting an verifying both reference from paystack URL
    //and product reference.
    public function PaymentCallback($reference){
        if(Auth::check()){
            $data['title'] = "Payment Success";
            $data['setting'] = SiteSettings::find(1);
            $category=$data['category'] = Category::with(['Subcategories',])->with(['Endcategories'])->where('status', '1')->get();
            $response = json_decode($this->verify_payment(request('reference')));
            //dd($response);
            if($response){
                if($response->status){
                    //check for the product and change status to processing if reference is verified.
                    $checkOrder = Orders::where('user_id', Auth::user()->id)->where('reference', $reference)->where('payment_status','0')->get();
                    foreach($checkOrder as $data_order){
                        $data_order->payment_status = 1;
                        $data_order->save();
                    }
                    //getting the product ID that matches the refrence passed as a request for each product
                    $getpid = Orders::where('reference', $reference)->where('payment_status', '1')->get();
                    if($getpid){
                        foreach($getpid as $data_pid){

                            $the_pid=$data_pid->product_id;

                            $productQuantity = Products::where('id', $the_pid)->where('status','1')->first();
                            //Reducing the product quantity by the number paid for in the product table
                            $productQuantity->quantity = $productQuantity->quantity - $data_pid->quantity;
                            $productQuantity->save();
                        }
                    }
                    //deleting the product from user cart after product has been paid for
                    $checkusercart = Cart::where('user_id', Auth::user()->id)->get();
                    foreach($checkusercart as $data_id){
                        $cart_id = $data_id->id;
                        $cart = Cart::findOrFail($cart_id);
                        $cart->delete();
                    }
                    return view('frontend.pay.call_back', $data);

                }else{
                    return redirect()->back()->with('error', $response->message);
                }
            }else{
                return redirect()->back()->with('error', 'Something is Wrong');
            }

        }else{
            return redirect()->route('login');

        }
    }


    //verifying payment with card method with reference
    public function verify_payment($reference){

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . env("PAYSTACK_SECRETE_KEY"),
                "Cache-Control: no-cache"
            )
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }



    public function SuccessPage(){
        if(Auth::check()){
            $data['title'] = "Order Success";
            $data['currency'] = Currency::where('status','1')->first();
            $data['setting'] = SiteSettings::find(1);
            $category=$data['category'] = Category::with(['Subcategories',])->with(['Endcategories'])->where('status', '1')->get();
            $data['user'] = User::findOrFail(Auth::user()->id);
            return view('frontend.pay.success', $data);
        }else{
            return redirect('/login');
        }
    }



}
