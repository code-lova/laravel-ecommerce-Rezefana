<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\States;
use App\Models\Category;
use App\Models\Currency;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function UserAccount(){
        $data['title'] = "My Account";
        $data['currency'] = Currency::where('status','1')->first();
        $data['setting'] = SiteSettings::find(1);
        $data['state'] = States::all();
        $category=$data['category'] = Category::with(['Subcategories',])->with(['Endcategories'])->where('status', '1')->get();
        $data['user'] = User::findOrFail(Auth::user()->id);
        $data['userOrder'] = Orders::where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view('user.index', $data);
    }


    //fetch user order details
    public function FetchOrderDetails(int $product_id){
        $product = Orders::find($product_id);
        if($product){
            return response()->json([
                'status'=>200,
                'product'=>$product,
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Product ID not Found',
            ]);
        }
    }




    //Update User Details
    public function UpdateProfile(Request $request, int $user_id){
         $validator = Validator::make($request->all(),[
             'name' => 'required|string',
             'phone' => 'required',
             'zip'=> 'required',
             'state' => 'required',
             'city' => 'string',
             'country' => 'string',
             'email' => 'required|max:50|email',
             'address' => 'required|string',
         ]);

         if($validator->fails()){
             return response()->json([
                 'status'=>400,
                 'message'=>$validator->errors()->first()
             ]);
         }
         else{
             $userID = User::findOrFail($user_id);
             $userID->name = $request->name;
             $userID->phone = $request->phone;
             $userID->company_name = $request->company_name;
             $userID->zip = $request->zip;
             $userID->state = $request->state;
             $userID->city = $request->city;
             $userID->country = "Nigeria";
             $userID->email = $request->email;
             $userID->address = $request->address;
             $userID->save();
             return response()->json([
                 'status'=>200,
                 'message'=>'Details Updated Successfully',
             ]);
         }
    }


     //Update User Password
     public function UpdatePassword(Request $request, int $user_id){
         $validator = Validator::make($request->all(),[
            'oldpassword'=>'required',
            'password'=>'required|min:6|max:20|confirmed'

         ],[
            'oldpassword.required' => 'Please input your current password',
            'password.required' => 'Please input a new password',
            'password.confirmed' => 'New/confirm password does not match'

         ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'message'=>$validator->errors()->first()
            ]);
        }else{

            $update = User::findOrFail($user_id);
            if($update){
                if(Hash::check($request->oldpassword, $update->password)){
                    $update->password=Hash::make($request->password);
                    $update->save();
                    return response()->json([
                        'status'=>200,
                        'message'=>'Password Updated Successfully',
                    ]);
                 }else{
                    return response()->json([
                        'status'=>403,
                        'message'=>'Current Password Does not Match',
                    ]);
                 }
             }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'User Record Not Found',
                ]);
            }
        }
    }

}
