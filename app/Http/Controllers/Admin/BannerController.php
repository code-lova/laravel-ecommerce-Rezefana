<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index(){
        $data['title'] = 'Home Banner Setting';
        $data['banner'] = Banner::find(1);
        return view('admin.settings.banner-setting', $data);
    }


    public function StoreBanner(Request $request){

        $validator = Validator::make($request->all(),[
            'banner1_first_note' => 'required|string',
            'banner1_second_note' => 'required|string',
            'banner1_third_note' => 'required|string',
            'banner1_fourth_note' => 'required|string',
            'banner1_image' => 'mimes:png,jpg,jpeg',
            'banner2_first_note' => 'required|string',
            'banner2_second_note' => 'required|string',
            'banner2_third_note' => 'required|string',
            'banner2_fourth_note' => 'required|string',
            'banner2_image' => 'mimes:png,jpg,jpeg',
            'banner3_first_note' => 'required|string',
            'banner3_second_note' => 'required|string',
            'banner3_third_note' => 'required|string',
            'banner3_fourth_note' => 'required|string',
            'banner3_image' => 'mimes:png,jpg,jpeg',
            'banner4_first_note' => 'required|string',
            'banner4_second_note' => 'required|string',
            'banner4_third_note' => 'required|string',
            'banner4_fourth_note' => 'required|string',
            'banner4_fifth_note' => 'required|string',
            'banner4_image' => 'mimes:png,jpg,jpeg',


        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else{
            $settings = Banner::where('id', '1')->first();
            if($settings)
            {
                $settings->banner1_first_note = $request->banner1_first_note;
                $settings->banner1_second_note = $request->banner1_second_note;
                $settings->banner1_third_note = $request->banner1_third_note;
                $settings->banner1_fourth_note = $request->banner1_fourth_note;

                if($request->hasFile('banner1_image'))
                {
                    $destination_path = 'uploads/banner/'.$settings->banner1_image;
                    if(File::exists($destination_path)){
                        File::delete($destination_path);
                    }
                    $file = $request->file('banner1_image');
                    $filename = 'banner_image_1_'. time() . '.' . $file->hashName();
                    $file->move('uploads/banner/', $filename);
                    $settings->banner1_image = $filename;
                }

                $settings->banner2_first_note = $request->banner2_first_note;
                $settings->banner2_second_note = $request->banner2_second_note;
                $settings->banner2_third_note = $request->banner2_third_note;
                $settings->banner2_fourth_note = $request->banner2_fourth_note;
                if($request->hasFile('banner2_image'))
                {
                    $destination_path = 'uploads/banner/'.$settings->banner2_image;
                    if(File::exists($destination_path))
                    {
                        File::delete($destination_path);
                    }
                    $file = $request->file('banner2_image');
                    $filename = 'banner_image_2_'. time() . '.' . $file->hashName();
                    $file->move('uploads/banner/', $filename);
                    $settings->banner2_image = $filename;
                }
                $settings->banner3_first_note = $request->banner3_first_note;
                $settings->banner3_second_note = $request->banner3_second_note;
                $settings->banner3_third_note = $request->banner3_third_note;
                $settings->banner3_fourth_note = $request->banner3_fourth_note;
                if($request->hasFile('banner3_image'))
                {
                    $destination_path = 'uploads/banner/'.$settings->banner3_image;
                    if(File::exists($destination_path))
                    {
                        File::delete($destination_path);
                    }
                    $file = $request->file('banner3_image');
                    $filename = 'banner_image_3_'. time() . '.' . $file->hashName();
                    $file->move('uploads/banner/', $filename);
                    $settings->banner3_image = $filename;
                }

                $settings->banner4_first_note = $request->banner4_first_note;
                $settings->banner4_second_note = $request->banner4_second_note;
                $settings->banner4_third_note = $request->banner4_third_note;
                $settings->banner4_fourth_note = $request->banner4_fourth_note;
                $settings->banner4_fifth_note = $request->banner4_fifth_note;
                if($request->hasFile('banner4_image'))
                {
                    $destination_path = 'uploads/banner/'.$settings->banner4_image;
                    if(File::exists($destination_path))
                    {
                        File::delete($destination_path);
                    }
                    $file = $request->file('banner4_image');
                    $filename = 'banner_image_4_'. time() . '.' . $file->hashName();
                    $file->move('uploads/banner/', $filename);
                    $settings->banner4_image = $filename;
                }

                $settings->save();
                return redirect()->back()->with('message', 'Banner Settings Updated Successfully');
            }
            else
            {
                $settings = new Banner();
                $settings->banner1_first_note = $request->banner1_first_note;
                $settings->banner1_second_note = $request->banner1_second_note;
                $settings->banner1_third_note = $request->banner1_third_note;
                $settings->banner1_fourth_note = $request->banner1_fourth_note;
                if($request->hasFile('banner1_image'))
                {
                    $file = $request->file('banner1_image');
                    $filename = 'banner_image_1_'. time() . '.' . $file->hashName();
                    $file->move('uploads/banner/', $filename);
                    $settings->banner1_image = $filename;
                }

                $settings->banner2_first_note = $request->banner2_first_note;
                $settings->banner2_second_note = $request->banner2_second_note;
                $settings->banner2_third_note = $request->banner2_third_note;
                $settings->banner2_fourth_note = $request->banner2_fourth_note;

                if($request->hasFile('banner2_image'))
                {
                    $file = $request->file('banner2_image');
                    $filename = 'banner_image_2_'. time() . '.' . $file->hashName();
                    $file->move('uploads/banner/', $filename);
                    $settings->banner2_image = $filename;
                }

                $settings->banner3_first_note = $request->banner3_first_note;
                $settings->banner3_second_note = $request->banner3_second_note;
                $settings->banner3_third_note = $request->banner3_third_note;
                $settings->banner3_fourth_note = $request->banner3_fourth_note;

                if($request->hasFile('banner3_image'))
                {
                    $file = $request->file('banner3_image');
                    $filename = 'banner_image_3_'. time() . '.' . $file->hashName();
                    $file->move('uploads/banner/', $filename);
                    $settings->banner3_image = $filename;
                }

                $settings->banner4_first_note = $request->banner4_first_note;
                $settings->banner4_second_note = $request->banner4_second_note;
                $settings->banner4_third_note = $request->banner4_third_note;
                $settings->banner4_fourth_note = $request->banner4_fourth_note;
                $settings->banner4_fifth_note = $request->banner4_fifth_note;

                if($request->hasFile('banner4_image'))
                {
                    $file = $request->file('banner4_image');
                    $filename = 'banner_image_4_'. time() . '.' . $file->hashName();
                    $file->move('uploads/banner/', $filename);
                    $settings->banner4_image = $filename;
                }

                $settings->save();
                return redirect()->back()->with('message', 'Banner Settings Created Successfully');
            }
        }

    }


}
