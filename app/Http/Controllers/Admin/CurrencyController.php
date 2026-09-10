<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $data['title'] = 'World Currency List';
        $data['currency'] = Currency::orderBy('id', 'ASC')->get();
        return view('admin.settings.currency', $data);
    }

    public function activateCurrency($id)
    {
        $data = Currency::all();
        foreach ($data as $datas)
        {
            $datas->status = 0;
            $datas->save();
        }
        $default = Currency::find($id);
        if($default)
        {
            $default->status = 1;
            $default->save();
            return redirect()->back()->with('message','Currency Updated Successfully');
        }
        else{
            return redirect()->back()->with('message','Currency ID not Found');
        }
    }


}
