<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Switcher;
use Illuminate\Http\Request;

class SwitcherController extends Controller
{
    //On and off Switcher setting function below
    public function SwitcherSettings(){
        $data['switcher'] = Switcher::where('id', '1')->first();
        $data['title'] = 'On & Off Settings';
        return view('admin.settings.on-off-setting', $data);
    }

    public function switchAds(Request $request){

        $AdsSetting = Switcher::find(1);
        if($AdsSetting){
            $AdsSetting->ads_1 = $request->ads_1 == true ? '1':'0';
            $AdsSetting->ads_2 = $request->ads_2 == true ? '1':'0';
            $AdsSetting->ads_3 = $request->ads_3 == true ? '1':'0';
            $AdsSetting->ads_4 = $request->ads_4 == true ? '1':'0';
            $AdsSetting->save();
            return response()->json([
                'status'=>200,
                'message'=>'Advert Settings Updated Successfully',
            ]);
        }
    }

    public function SponsorSett(Request $request){
        $SponsorSetting = Switcher::find(1);
        if($SponsorSetting){
            $SponsorSetting->sponsors = $request->sponsors == true ? '1':'0';
            $SponsorSetting->save();
            return response()->json([
                'status'=>200,
                'message'=>'Sponsors Settings Updated Successfully',
            ]);
        }
    }

    public function SubscriberSett(Request $request){
        $SubscriberSetting = Switcher::find(1);
        if($SubscriberSetting){
            $SubscriberSetting->popup_subscriber = $request->popup_subscriber == true ? '1':'0';
            $SubscriberSetting->save();
            return response()->json([
                'status'=>200,
                'message'=>'Subscriber Updated Successfully',
            ]);
        }
    }
}
