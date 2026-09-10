<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function CustomersPage(){
        $data['title'] = 'All Customers Account';
        $data['users'] = User::orderBy('created_at', 'DESC')->get();
        return view('admin.users.index', $data);
    }

    public function EditUser($id)
    {
        $data['userProfile'] = User::findOrFail($id);
        return view('admin.users.profile', $data);
    }

    public function UserUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|max:255',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'message'=>$validator->errors()->first()
            ]);
        }
        else
        {
            $userID = User::findOrFail($id);
            $userID->name = $request->name;
            $userID->email = $request->email;
            $userID->role_as = $request->role_as == true ? '1':'0';
            //$userID->customer_type = $request->customer_type == true ? '1':'0';
            $userID->save();
            return response()->json([
                'status'=>200,
                'message'=>'User Settings Updated Successfully',
            ]);

        }
    }

    public function BlockUser($id)
    {
        $blockUser = User::findOrFail($id);
        $blockUser->is_active = 0;
        $blockUser->save();
        return response()->json([
            'status'=>200,
            'message'=>'User Account Blocked Successfully',
        ]);
    }


    public function UnBlockUser($id)
    {
        $blockUser = User::findOrFail($id);
        $blockUser->is_active = 1;
        $blockUser->save();
        return response()->json([
            'status'=>200,
            'message'=>'User Account UnBlocked Successfully',
        ]);
    }

    public function destroyUser($id)
    {
        $userID = User::find($id);
        if($userID)
        {
            $userID->delete();
            $userID->orders()->delete();
            $userID->wishlists()->delete();
            $userID->comments()->delete();
            $userID->cart()->delete();
            return response()->json([
                'status'=>200,
                'message'=>'All User Data Deleted Successfully',
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'User ID Not Found',
            ]);
        }
    }
}
