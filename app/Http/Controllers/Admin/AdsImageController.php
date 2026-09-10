<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdsImageController extends Controller
{
    public function index(){
        $data['title'] = 'Adverts Images Settings';
        $data['ads'] = AdsImages::find(1);
        return view('admin.settings.ads-images', $data);
    }

    public function StoreAdverts(Request $request){
        $validator = Validator::make($request->all(),[
            'adv_1' => 'mimes:png,jpg,jpeg',
            'adv_2' => 'mimes:png,jpg,jpeg',
            'adv_3' => 'mimes:png,jpg,jpeg',
            'adv_4' => 'mimes:png,jpg,jpeg',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        else{
            $adImg = AdsImages::where('id', '1')->first();
            if($adImg){
                if($request->hasFile('adv_1'))
                {
                    $destination_path = 'uploads/ads/'.$adImg->adv_1;
                    if(File::exists($destination_path)){
                        File::delete($destination_path);
                    }
                    $file = $request->file('adv_1');
                    $filename = 'ads_image_1'. time() . '.' . $file->hashName();
                    $file->move('uploads/ads/', $filename);
                    $adImg->adv_1 = $filename;
                }
                if($request->hasFile('adv_2'))
                {
                    $destination_path = 'uploads/ads/'.$adImg->adv_2;
                    if(File::exists($destination_path)){
                        File::delete($destination_path);
                    }
                    $file = $request->file('adv_2');
                    $filename = 'ads_image_2'. time() . '.' . $file->hashName();
                    $file->move('uploads/ads/', $filename);
                    $adImg->adv_2 = $filename;
                }
                if($request->hasFile('adv_3'))
                {
                    $destination_path = 'uploads/ads/'.$adImg->adv_3;
                    if(File::exists($destination_path)){
                        File::delete($destination_path);
                    }
                    $file = $request->file('adv_3');
                    $filename = 'ads_image_3'. time() . '.' . $file->hashName();
                    $file->move('uploads/ads/', $filename);
                    $adImg->adv_3 = $filename;
                }
                if($request->hasFile('adv_4'))
                {
                    $destination_path = 'uploads/ads/'.$adImg->adv_4;
                    if(File::exists($destination_path)){
                        File::delete($destination_path);
                    }
                    $file = $request->file('adv_4');
                    $filename = 'ads_image_4'. time() . '.' . $file->hashName();
                    $file->move('uploads/ads/', $filename);
                    $adImg->adv_4 = $filename;
                }
                $adImg->save();
                return redirect()->back()->with('message', 'Advert Image Updated Successfully');
            }
            else{
                $adImg = new AdsImages();
                if($request->hasFile('adv_1'))
                {
                    $file = $request->file('adv_1');
                    $filename = 'ads_image_1'. time() . '.' . $file->hashName();
                    $file->move('uploads/ads/', $filename);
                    $adImg->adv_1 = $filename;
                }
                if($request->hasFile('adv_2'))
                {
                    $file = $request->file('adv_2');
                    $filename = 'ads_image_2'. time() . '.' . $file->hashName();
                    $file->move('uploads/ads/', $filename);
                    $adImg->adv_2 = $filename;
                }
                if($request->hasFile('adv_3'))
                {
                    $file = $request->file('adv_3');
                    $filename = 'ads_image_3'. time() . '.' . $file->hashName();
                    $file->move('uploads/ads/', $filename);
                    $adImg->adv_3 = $filename;
                }
                if($request->hasFile('adv_4'))
                {
                    $file = $request->file('adv_4');
                    $filename = 'ads_image_4'. time() . '.' . $file->hashName();
                    $file->move('uploads/ads/', $filename);
                    $adImg->adv_4 = $filename;
                }

                $adImg->save();
                return redirect()->back()->with('message', 'Advert Image Created Successfully');
            }
        }
    }
}
