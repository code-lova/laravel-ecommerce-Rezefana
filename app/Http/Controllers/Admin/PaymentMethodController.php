<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentMethodController extends Controller
{
    public function index(){
        $data['title'] = 'Payment Method Page';
        $data['payment'] = PaymentMethod::latest()->get();
        return view('admin.payment-method.index', $data);
    }

    public function StorePaymentMethod(Request $request){
        $validator = Validator::make($request->all(), [
            'payment_name' => 'required|string',
            'payment_details' => 'required|string',
            'href' => 'required|string',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $payment = new PaymentMethod();
            $payment->payment_name = $request->payment_name;
            $payment->payment_details = $request->payment_details;
            $payment->href = $request->href;
            $payment->status = $request->status == true ? '1':'0';
            $payment->save();
            return redirect()->back()->with('message', 'Method Successfully Added');
        }
    }

    public function DestroyPayment(int $payment_id){
        $payment = PaymentMethod::findOrFail($payment_id);
        $payment->delete();
        return redirect()->back()->with('message','Data Deleted Successfully');
    }


    public function UpdatePayment(Request $request, int $payment_id){
        $validator = Validator::make($request->all(), [
            'payment_name' => 'required|string',
            'payment_details' => 'required|string',
            'href' => 'required|string',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $payment = PaymentMethod::findOrFail($payment_id);
            $payment->payment_name = $request->payment_name;
            $payment->payment_details = $request->payment_details;
            $payment->href = $request->href;
            $payment->status = $request->status == true ? '1':'0';
            $payment->update();
            return redirect()->back()->with('message', 'Method Successfully Added');

        }
    }
}
