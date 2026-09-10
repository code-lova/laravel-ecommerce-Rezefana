<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\FaQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    //ABOUT US PAGE BEGINS HERE
    public function AboutusPage(){
        $data['title'] = 'About Us Page';
        $data['about'] = AboutUs::find(1);
        return view('admin.web.about-us', $data);
    }

    public function StoreAbout(Request $request){

        $validator = Validator::make($request->all(),[
            'banner_title' => 'required',
            'banner_sub_title' => 'required',
            'banner' => 'mimes:png,jpg,jpeg',
            'our_vision' => 'required',
            'our_mission' => 'required',
            'who_we_are_1' => 'required',
            'who_we_are_2' => 'required',
            'img_1' => 'mimes:png,jpg,jpeg',
            'img_2' => 'mimes:png,jpg,jpeg'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'msg' => $validator->errors()->first()
            ]);
        }
        else{
            $about = AboutUs::where('id', '1')->first();
            if($about){
                $about->banner_title = $request->banner_title;
                $about->banner_sub_title = $request->banner_sub_title;
                if($request->hasFile('banner'))
                {
                    $destination_path = 'uploads/about/'.$about->banner;
                    if(File::exists($destination_path)){
                        File::delete($destination_path);
                    }
                    $file = $request->file('banner');
                    $filename = 'about_image_'. time() . '.' . $file->hashName();
                    $file->move('uploads/about/', $filename);
                    $about->banner = $filename;
                }

                $about->our_vision = $request->our_vision;
                $about->our_mission = $request->our_mission;
                $about->who_we_are_1 = $request->who_we_are_1;
                $about->who_we_are_2 = $request->who_we_are_2;

                if($request->hasFile('img_1'))
                {
                    $destination_path = 'uploads/about/'.$about->img_1;
                    if(File::exists($destination_path))
                    {
                        File::delete($destination_path);
                    }
                    $file = $request->file('img_1');
                    $filename = 'img_1_'. time() . '.' . $file->hashName();
                    $file->move('uploads/about/', $filename);
                    $about->img_1 = $filename;
                }

                if($request->hasFile('img_2'))
                {
                    $destination_path = 'uploads/about/'.$about->img_2;
                    if(File::exists($destination_path))
                    {
                        File::delete($destination_path);
                    }
                    $file = $request->file('img_2');
                    $filename = 'img_2_'. time() . '.' . $file->hashName();
                    $file->move('uploads/about/', $filename);
                    $about->img_2 = $filename;
                }
                $about->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'AboutPage Updated Successfully',
                ]);
            }
            else{
                $about = new AboutUs();
                $about->banner_title = $request->banner_title;
                $about->banner_sub_title = $request->banner_sub_title;
                if($request->hasFile('banner')){
                    $file = $request->file('banner');
                    $filename = 'about_image_'. time() . '.' . $file->hashName();
                    $file->move('uploads/about/', $filename);
                    $about->banner = $filename;
                }

                $about->our_vision = $request->our_vision;
                $about->our_mission = $request->our_mission;
                $about->who_we_are_1 = $request->who_we_are_1;
                $about->who_we_are_2 = $request->who_we_are_2;

                if($request->hasFile('img_1')){
                    $destination_path = 'uploads/about/'.$about->img_1;
                    $file = $request->file('img_1');
                    $filename = 'img_1_'. time() . '.' . $file->hashName();
                    $file->move('uploads/about/', $filename);
                    $about->img_1 = $filename;
                }

                if($request->hasFile('img_2')){
                    $destination_path = 'uploads/about/'.$about->img_2;
                    $file = $request->file('img_2');
                    $filename = 'img_2_'. time() . '.' . $file->hashName();
                    $file->move('uploads/about/', $filename);
                    $about->img_2 = $filename;
                }
                $about->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'AboutPage Created Successfully',
                ]);

            }
        }
    }
    //ABOUT US PAGE ENDS HERE..

    //CONTACT US PAGE BEGINS HERE
    public function CreateContactUs(){
        $data['title'] = 'Contact Us Page';
        $data['contact'] = ContactUs::find(1);
        return view('admin.web.contact-us', $data);
    }

    public function StoreContact(Request $request){
        $validator = Validator::make($request->all(),[
            'banner' => 'mimes:png,jpg,jpeg',
            'banner_title' => 'required',
            'banner_sub_title' => 'required',
            'contact_info' => 'required',
            'contact_info_details' => 'required',
            'address_head' => 'required',
            'days_time_head' => 'required',
            'days1' => 'required',
            'time1' => 'required',
            'days2' => 'required',
            'time2' => 'required',
            'question_head' => 'required',
            'question_details' => 'required',
            'store_heading' => 'required',
            'store_details_1' => 'required',
            'store_img_1' => 'mimes:png,jpg,jpeg',
            'store_details_2' => 'required',
            'store_img_2' => 'mimes:png,jpg,jpeg',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'msg' => $validator->errors()->first()
            ]);
        }else{
            $contact = ContactUs::where('id', '1')->first();
            if($contact){
                if($request->hasFile('banner'))
                {
                    $destination_path = 'uploads/contact/'.$contact->banner;
                    if(File::exists($destination_path)){
                        File::delete($destination_path);
                    }
                    $file = $request->file('banner');
                    $filename = 'contact_image_'. time() . '.' . $file->hashName();
                    $file->move('uploads/contact/', $filename);
                    $contact->banner = $filename;
                }
                $contact->banner_title = $request->banner_title;
                $contact->banner_sub_title = $request->banner_sub_title;
                $contact->contact_info = $request->contact_info;
                $contact->contact_info_details = $request->contact_info_details;
                $contact->address_head = $request->address_head;
                $contact->days_time_head = $request->days_time_head;
                $contact->days1 = $request->days1;
                $contact->time1 = $request->time1;
                $contact->days2 = $request->days2;
                $contact->time2 = $request->time2;
                $contact->question_head = $request->question_head;
                $contact->question_details = $request->question_details;
                $contact->store_heading = $request->store_heading;
                $contact->store_details_1 = $request->store_details_1;
                if($request->hasFile('store_img_1'))
                {
                    $destination_path = 'uploads/contact/'.$contact->store_img_1;
                    if(File::exists($destination_path)){
                        File::delete($destination_path);
                    }
                    $file = $request->file('store_img_1');
                    $filename = 'contact_image_'. time() . '.' . $file->hashName();
                    $file->move('uploads/contact/', $filename);
                    $contact->store_img_1 = $filename;
                }
                $contact->store_details_2 = $request->store_details_2;
                if($request->hasFile('store_img_2'))
                {
                    $destination_path = 'uploads/contact/'.$contact->store_img_2;
                    if(File::exists($destination_path)){
                        File::delete($destination_path);
                    }
                    $file = $request->file('store_img_2');
                    $filename = 'contact_image_'. time() . '.' . $file->hashName();
                    $file->move('uploads/contact/', $filename);
                    $contact->store_img_2 = $filename;
                }
                $contact->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Contact Page Updated Successfully',
                ]);
            }else{
                $contact = new ContactUs();
                if($request->hasFile('banner'))
                {
                    $destination_path = 'uploads/contact/'.$contact->banner;
                    $file = $request->file('banner');
                    $filename = 'contact_image_'. time() . '.' . $file->hashName();
                    $file->move('uploads/contact/', $filename);
                    $contact->banner = $filename;
                }
                $contact->banner_title = $request->banner_title;
                $contact->banner_sub_title = $request->banner_sub_title;
                $contact->contact_info = $request->contact_info;
                $contact->contact_info_details = $request->contact_info_details;
                $contact->address_head = $request->address_head;
                $contact->days_time_head = $request->days_time_head;
                $contact->days1 = $request->days1;
                $contact->time1 = $request->time1;
                $contact->days2 = $request->days2;
                $contact->time2 = $request->time2;
                $contact->question_head = $request->question_head;
                $contact->question_details = $request->question_details;
                $contact->store_heading = $request->store_heading;
                $contact->store_details_1 = $request->store_details_1;
                if($request->hasFile('store_img_1'))
                {
                    $destination_path = 'uploads/contact/'.$contact->store_img_1;
                    $file = $request->file('store_img_1');
                    $filename = 'contact_image_'. time() . '.' . $file->hashName();
                    $file->move('uploads/contact/', $filename);
                    $contact->store_img_1 = $filename;
                }
                $contact->store_details_2 = $request->store_details_2;
                if($request->hasFile('store_img_2'))
                {
                    $destination_path = 'uploads/contact/'.$contact->store_img_2;
                    $file = $request->file('store_img_2');
                    $filename = 'contact_image_'. time() . '.' . $file->hashName();
                    $file->move('uploads/contact/', $filename);
                    $contact->store_img_2 = $filename;
                }
                $contact->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Contact Page Created Successfully',
                ]);
            }
        }

    }
    //CONTACT US PAGE ENDS HERE


    //FAQ BEGINS HERE
    public function FaqPage(){
        $data['title'] = 'FaQ Page';
        $data['help'] = FaQ::latest()->paginate(5);
        return view('admin.web.faq.index', $data);
    }

    //Storing Faq
    public function storeFaq(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'http'=> 'required|string|unique:fa_q_s,http',
            'head_title'=> 'required|unique:fa_q_s,head_title',
            'question'=> 'required|max:100|unique:fa_q_s,question',
            'answer'=> 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'msg'=>$validator->errors()->first()
            ]);
        }
        else{

            $Faq = new FaQ();
            $Faq->http = $request->http;
            $Faq->head_title = $request->head_title;
            $Faq->question = $request->question;
            $Faq->answer = $request->answer;
            $Faq->save();
            return response()->json([
                'status'=>200,
                'message'=>'FaQ and Help Created Successfully',
            ]);

        }
    }


    //Fetching Help and Faq ID
    public function FetchFaq($id)
    {
        $FaqID = FaQ::find($id);
        if($FaqID){
            return response()->json([
                'status'=>200,
                'faq'=>$FaqID,
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Sorry ID Not Found',
            ]);
        }
    }


    //Updating the Faq ID
    public function UpdateFaq(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'http'=> 'required',
            'head_title'=> 'required',
            'question'=> 'required|max:100',
            'answer'=> 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'message'=>$validator->errors()->first()
            ]);
        }
        else{

            $Faq = FaQ::find($id);
            if($Faq)
            {
                $Faq->http = $request->http;
                $Faq->head_title = $request->head_title;
                $Faq->question = $request->question;
                $Faq->answer = $request->answer;
                $Faq->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'FaQ and Help Updated Successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=>404,
                    'message'=>'FaQ ID Not Found',
                ]);
            }
        }
    }


    //Deleting the Faq ID
    public function DestroyFaq($id)
    {
        $FaqID = FaQ::find($id);
        if($FaqID){
            $FaqID->delete();
            return response()->json([
                'status'=>200,
                'message'=>'FaQ Data Deleted Successfully',
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'msg'=>'FAQ ID not Found',
            ]);
        }
    }





}
