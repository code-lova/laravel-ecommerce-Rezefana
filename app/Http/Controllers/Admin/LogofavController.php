<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogoFormRequest;
use App\Models\LogoFavicon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogofavController extends Controller
{
    public function index(){
        $data['title'] = 'Logo & Favicon Settings';
        $data['logofav'] = LogoFavicon::find(1);
        return view('admin.settings.logo-favicon', $data);
    }

    public function StoreLogofav(LogoFormRequest $request){
        $ValidateDate = $request->validated();

        $logoFav = LogoFavicon::find(1);
        if($logoFav){
            if($request->hasFile('logo')){
                $destination_path = 'uploads/logofav/'.$logoFav->logo;
                if(File::exists($destination_path)){
                    File::delete($destination_path);
                }
                $file = $request->file('logo');
                $filename = 'logo_1'. time() . '.' . $file->hashName();
                $file->move('uploads/logofav/', $filename);
                $logoFav->logo = $filename;
            }
            if($request->hasFile('logo2')){
                $destination_path = 'uploads/logofav/'.$logoFav->logo2;
                if(File::exists($destination_path)){
                    File::delete($destination_path);
                }
                $file = $request->file('logo2');
                $filename = 'logo_2'. time() . '.' . $file->hashName();
                $file->move('uploads/logofav/', $filename);
                $logoFav->logo2 = $filename;
            }
            if($request->hasFile('favicon')){
                $destination_path = 'uploads/logofav/'.$logoFav->favicon;
                if(File::exists($destination_path)){
                    File::delete($destination_path);
                }
                $file = $request->file('favicon');
                $filename = 'favicon'. time() . '.' . $file->hashName();
                $file->move('uploads/logofav/', $filename);
                $logoFav->favicon = $filename;
            }

            $logoFav->save();
            return redirect()->back()->with('message', 'Logo & Favicon Updated Successfully');
        }
        else{
            $logoFav = new LogoFavicon();
            if($request->hasFile('logo'))
            {
                $file = $request->file('logo');
                $filename = 'logo_1'. time() . '.' . $file->hashName();
                $file->move('uploads/logofav/', $filename);
                $logoFav->logo = $filename;
            }
            if($request->hasFile('logo2'))
            {
                $file = $request->file('logo2');
                $filename = 'logo_2'. time() . '.' . $file->hashName();
                $file->move('uploads/logofav/', $filename);
                $logoFav->logo2 = $filename;
            }
            if($request->hasFile('favicon'))
            {
                $file = $request->file('favicon');
                $filename = 'favicon'. time() . '.' . $file->hashName();
                $file->move('uploads/logofav/', $filename);
                $logoFav->favicon = $filename;
            }

            $logoFav->save();
            return redirect()->back()->with('message', 'Logo & Favicon Created Successfully');
        }
    }
}
