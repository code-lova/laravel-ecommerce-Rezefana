<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingCostRequest;
use App\Models\Currency;
use App\Models\ShippingCost;
use App\Models\ShippingCostAll;
use App\Models\States;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShippingCostController extends Controller
{
    public function index()
    {
        $data['title'] = 'Shipping Cost Table';
        $data['shipcost'] = ShippingCost::all();
        $data['state'] = States::all();
        $data['currency'] = Currency::where('status', '1')->first();
        return view('admin.shippingcost.index', $data);
    }

    public function StoreShippingCost(ShippingCostRequest $request)
    {
        $validatedData = $request->validated();
        $shippingCost = new ShippingCost();
        $shippingCost->state_id = $validatedData['state_id'];
        $shippingCost->amount = $validatedData['amount'];
        $shippingCost->save();
        return redirect()->back()->with('message', 'New Shipping Cost Created');
    }


    public function UpdateShippingCost(ShippingCostRequest $request, int $shipping_id){
        $validatedData = $request->validated();

        $shippingcost = ShippingCost::findOrFail($shipping_id);
        $shippingcost->state_id = $validatedData['state_id'];
        $shippingcost->amount = $validatedData['amount'];
        $shippingcost->update();
        return redirect()->back()->with('message', 'Shipping Cost Updated Successfully');
    }

    public function destroyShippingCost($id){
        $shippingCost = ShippingCost::findOrFail($id);
        $shippingCost->delete();
        return redirect()->back()->with('message', 'ShippingCost deleted successfully.');
    }

    //Shipping cost all
    public function ShippingCostAll(){
        $data['title'] = 'Shipping Cost- Rest of States.';
        $data['shipcostall'] = ShippingCostAll::find(1);
        $data['currency'] = Currency::where('status', '1')->first();
        return view('admin.shippingcost-all.index', $data);
    }

    public function storeShipcostAll(Request $request){

        $validator = Validator::make($request->all(),[
            'amount' => 'required|integer',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        else{
            $shipingCostAll = ShippingCostAll::where('id', '1')->first();
            if($shipingCostAll){
                $shipingCostAll->amount = $request->amount;
                $shipingCostAll->save();
                return redirect()->back()->with('message', 'ShippingCost for rest of states Updated.');
            }
            else{
                $shipingCostAll = new ShippingCostAll;
                $shipingCostAll->amount = $request->amount;
                $shipingCostAll->save();
                return redirect()->back()->with('message', 'ShippingCost for rest of states Created.');
            }
        }
    }
}
