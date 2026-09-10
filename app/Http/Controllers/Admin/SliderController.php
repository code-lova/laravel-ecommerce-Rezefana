<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function TopsliderSettings()
    {
        $data['title'] = 'Home Slider Setting';
        $data['slider'] = HomepageSlider::find(1);
        return view('admin.settings.slider-setting', $data);
    }

    public function StoreTopSlider(Request $request){

        $validator = Validator::make($request->all(),[
            'slider1_first_note' => 'nullable|string',
            'slider1_second_note' => 'required|string',
            'slider1_third_note' => 'required|string',
            'slider1_fourth_note' => 'nullable|string',
            'slider1_fifth_note' => 'required|string',
            'slider1_image' => 'mimes:png,jpg,jpeg',
            'slider2_first_note' => 'nullable|string',
            'slider2_second_note' => 'required|string',
            'slider2_third_note' => 'required|string',
            'slider2_fourth_note' => 'required|string',
            'slider2_image' => 'mimes:png,jpg,jpeg',
            'slider3_first_note' => 'nullable|string',
            'slider3_second_note' => 'required|string',
            'slider3_third_note' => 'required|string',
            'slider3_fourth_note' => 'nullable|string',
            'slider3_image' => 'mimes:png,jpg,jpeg'

        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else{
            $settings = HomepageSlider::where('id', '1')->first();
            if($settings)
            {
                $settings->slider1_first_note = $request->slider1_first_note;
                $settings->slider1_second_note = $request->slider1_second_note;
                $settings->slider1_third_note = $request->slider1_third_note;
                $settings->slider1_fourth_note = $request->slider1_fourth_note;
                $settings->slider1_fifth_note = $request->slider1_fifth_note;

                if($request->hasFile('slider1_image'))
                {
                    $destination_path = 'uploads/slider/'.$settings->slider1_image;
                    if(File::exists($destination_path)){
                        File::delete($destination_path);
                    }
                    $file = $request->file('slider1_image');
                    $filename = 'slider_image_1_'. time() . '.' . $file->hashName();
                    $file->move('uploads/slider/', $filename);
                    $settings->slider1_image = $filename;
                }

                $settings->slider2_first_note = $request->slider2_first_note;
                $settings->slider2_second_note = $request->slider2_second_note;
                $settings->slider2_third_note = $request->slider2_third_note;
                $settings->slider2_fourth_note = $request->slider2_fourth_note;
                if($request->hasFile('slider2_image'))
                {
                    $destination_path = 'uploads/slider/'.$settings->slider2_image;
                    if(File::exists($destination_path))
                    {
                        File::delete($destination_path);
                    }
                    $file = $request->file('slider2_image');
                    $filename = 'slider_image_2_'. time() . '.' . $file->hashName();
                    $file->move('uploads/slider/', $filename);
                    $settings->slider2_image = $filename;
                }
                $settings->slider3_first_note = $request->slider3_first_note;
                $settings->slider3_second_note = $request->slider3_second_note;
                $settings->slider3_third_note = $request->slider3_third_note;
                $settings->slider3_fourth_note = $request->slider3_fourth_note;
                if($request->hasFile('slider3_image'))
                {
                    $destination_path = 'uploads/slider/'.$settings->slider3_image;
                    if(File::exists($destination_path))
                    {
                        File::delete($destination_path);
                    }
                    $file = $request->file('slider3_image');
                    $filename = 'slider_image_3_'. time() . '.' . $file->hashName();
                    $file->move('uploads/slider/', $filename);
                    $settings->slider3_image = $filename;
                }


                $settings->save();
                return redirect()->back()->with('message', 'Slider Settings Updated Successfully');
            }
            else
            {
                $settings = new HomepageSlider;
                $settings->slider1_first_note = $request->slider1_first_note;
                $settings->slider1_second_note = $request->slider1_second_note;
                $settings->slider1_third_note = $request->slider1_third_note;
                $settings->slider1_fourth_note = $request->slider1_fourth_note;
                $settings->slider1_fifth_note = $request->slider1_fifth_note;
                if($request->hasFile('slider1_image'))
                {
                    $file = $request->file('slider1_image');
                    $filename = 'slider_image_1_'. time() . '.' . $file->hashName();
                    $file->move('uploads/slider/', $filename);
                    $settings->slider1_image = $filename;
                }

                $settings->slider2_first_note = $request->slider2_first_note;
                $settings->slider2_second_note = $request->slider2_second_note;
                $settings->slider2_third_note = $request->slider2_third_note;
                $settings->slider2_fourth_note = $request->slider2_fourth_note;

                if($request->hasFile('slider2_image'))
                {
                    $file = $request->file('slider2_image');
                    $filename = 'slider_image_2_'. time() . '.' . $file->hashName();
                    $file->move('uploads/slider/', $filename);
                    $settings->slider2_image = $filename;
                }

                $settings->slider3_first_note = $request->slider3_first_note;
                $settings->slider3_second_note = $request->slider3_second_note;
                $settings->slider3_third_note = $request->slider3_third_note;
                $settings->slider3_fourth_note = $request->slider3_fourth_note;

                if($request->hasFile('slider3_image'))
                {
                    $file = $request->file('slider3_image');
                    $filename = 'slider_image_3_'. time() . '.' . $file->hashName();
                    $file->move('uploads/slider/', $filename);
                    $settings->slider3_image = $filename;
                }

                $settings->save();
                return redirect()->back()->with('message', 'Slider Settings Created Successfully');
            }
        }

    }


}
