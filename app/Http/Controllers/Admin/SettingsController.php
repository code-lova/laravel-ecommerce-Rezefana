<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalltoActionRequestForm;
use App\Http\Requests\SitesettingFormRequest;
use App\Models\CallToAction;
use App\Models\HomePageTopSlider;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index(){
        $data['title'] = 'General Site Settings';
        $data['settings'] = SiteSettings::find(1);
        return view('admin.settings.site-setting', $data);
    }

    public function StoreSiteSettings(SitesettingFormRequest $request){
        $ValidatedData = $request->validated();

        $settings = SiteSettings::find(1);
        if($settings){
            $settings->title = $ValidatedData['title'];
            $settings->site_name = $ValidatedData['site_name'];
            $settings->site_desc = $ValidatedData['site_desc'];
            $settings->keywords = $ValidatedData['keywords'];
            $settings->live_chat_id = $ValidatedData['live_chat_id'];
            $settings->email = $ValidatedData['email'];
            $settings->mobile = $ValidatedData['mobile'];
            $settings->address = $ValidatedData['address'];
            $settings->opening_days = $ValidatedData['opening_days'];
            $settings->payment = $request->payment == true ? '1':'0';
            $settings->registration = $request->registration == true ? '1':'0';
            $settings->email_notify = $request->email_notify == true ? '1':'0';
            $settings->seller = $request->seller == true ? '1':'0';
            $settings->save();
            return redirect()->back()->with('message', 'Site Settings Updated Successfully');
        }
        else{
            $settings = new SiteSettings();
            $settings->title = $ValidatedData['title'];
            $settings->site_name = $ValidatedData['site_name'];
            $settings->site_desc = $ValidatedData['site_desc'];
            $settings->keywords = $ValidatedData['keywords'];
            $settings->live_chat_id = $ValidatedData['live_chat_id'];
            $settings->email = $ValidatedData['email'];
            $settings->mobile = $ValidatedData['mobile'];
            $settings->address = $ValidatedData['address'];
            $settings->opening_days = $ValidatedData['opening_days'];
            $settings->payment = $request->payment == true ? '1':'0';
            $settings->registration = $request->registration == true ? '1':'0';
            $settings->email_notify = $request->email_notify == true ? '1':'0';
            $settings->seller = $request->seller == true ? '1':'0';
            $settings->save();
            return redirect()->back()->with('message', 'Site Settings Created Successfully');
        }
    }

    //Other settings function here
    public function OtherSettings(){
        $data['title'] = 'Other Settings on Ecommerce';
        $data['cta'] = CallToAction::find(1);
        return view('admin.settings.othersettings', $data);
    }

    public function StoreCalltoaction(Request $request){

        $validator = Validator::make($request->all(),[
            'cta_heading_1' => 'required|max:60',
            'cta_sub_1' => 'required|max:60',
            'cta_heading_2' => 'required|max:60',
            'cta_sub_2' => 'required|max:60',
            'cta_heading_3' => 'required|max:60',
            'cta_sub_3' => 'required|max:60',
            'cta_heading_4' => 'required|max:60',
            'cta_sub_4' => 'required|max:60',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'msg'=>$validator->errors()->first()
            ]);
        }
        else{

            $cta = CallToAction::find(1);
            if($cta){
                $cta->cta_heading_1 = $request->cta_heading_1;
                $cta->cta_sub_1 = $request->cta_sub_1;
                $cta->cta_heading_2 = $request->cta_heading_2;
                $cta->cta_sub_2 = $request->cta_sub_2;
                $cta->cta_heading_3 = $request->cta_heading_3;
                $cta->cta_sub_3 = $request->cta_sub_3;
                $cta->cta_heading_4 = $request->cta_heading_4;
                $cta->cta_sub_4 = $request->cta_sub_4;
                $cta->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Call to action Updated Successfully',
                ]);
            }
            else{
                $cta = new CallToAction();
                $cta->cta_heading_1 = $request->cta_heading_1;
                $cta->cta_sub_1 = $request->cta_sub_1;
                $cta->cta_heading_2 = $request->cta_heading_2;
                $cta->cta_sub_2 = $request->cta_sub_2;
                $cta->cta_heading_3 = $request->cta_heading_3;
                $cta->cta_sub_3 = $request->cta_sub_3;
                $cta->cta_heading_4 = $request->cta_heading_4;
                $cta->cta_sub_4 = $request->cta_sub_4;
                $cta->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Call to action Created Successfully',
                ]);
            }
        }


    }



}
