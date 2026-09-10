<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests\ItemFormrequest;
use App\Http\Requests\SubCategoryFormRequest;
use App\Models\ItemCategory;
use App\Models\SubCategories;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $data['title'] = 'Product Category Table';
        $data['cat'] = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.index', $data);
    }

    public function StoreCategory(CategoryFormRequest $request){
        $validateData = $request->validated();

        $category = new Category;
        $category->name = $validateData['name'];
        $category->slug = Str::slug($validateData['slug']) ;
        $category->description = $validateData['description'];
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = 'image_'. time() . '.' . $file->hashName();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description = $validateData['meta_description'];
        $category->status = $request->status == true ? '1':'0';
        $category->save();
        return redirect()->back()->with('message','Category Created Successfully');

    }


    public function EditCategory(CategoryFormRequest $request, $id){
        $validateData = $request->validated();

        $category = Category::findOrFail($id);
        $category->name = $validateData['name'];
        $category->slug = Str::slug($validateData['slug']) ;
        $category->description = $validateData['description'];
        if($request->hasFile('image'))
        {
            $path = 'uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $filename = 'image_'. time() . '.' . $file->hashName();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description = $validateData['meta_description'];
        $category->status = $request->status == true ? '1':'0';
        $category->update();
        return redirect()->back()->with('message','Category Updated Successfully');
    }


    public function destroyCat($id)
    {
        $category = Category::findOrFail($id);
        $destination_path = 'uploads/category/'.$category->image;
            if(File::exists($destination_path))
            {
                File::delete($destination_path);
            }

        $category->delete();
        //$category->products()->delete();
        return redirect()->back()->with('message','Data Deleted Successfully');

    }

    //SUB CATEGORY FUNCTION
    public function subCategory()
    {
        $data['title'] = 'Product Sub Categories';
        $data['subCat'] = SubCategories::orderBy('id', 'DESC')->get();
        $data['cat'] = Category::orderBy('id', 'DESC')->where('status', '1')->get();
        return view('admin.sub-category.index', $data);
    }



    public function StoreSubcategory(SubCategoryFormRequest $request)
    {
        $validateData = $request->validated();

        $subcategory = new SubCategories();
        $subcategory->name = $validateData['name'];
        $subcategory->cat_id = $validateData['cat_id'];
        $subcategory->slug = Str::slug($validateData['slug']) ;
        $subcategory->description = $validateData['description'];
        $subcategory->meta_title = $validateData['meta_title'];
        $subcategory->meta_keyword = $validateData['meta_keyword'];
        $subcategory->meta_description = $validateData['meta_description'];
        $subcategory->status = $request->status == true ? '1':'0';
        $subcategory->save();
        return redirect()->back()->with('message','Subcategory Created Successfully');
    }


    public function EditSubCategory($id)
    {
        $val=$data['val'] = SubCategories::findorFail($id);
        if($val){
            $data['title'] = 'Update Product Sub Category';
            $data['cat'] = Category::orderBy('id', 'DESC')->where('status', '1')->get();
            return view('admin.sub-category.edit_subcat', $data);
        }
        else{
            return redirect()->back()->with('error', 'ID not Found');
        }
    }


    public function UpdateSubCategory(SubCategoryFormRequest $request, $id){
        $validateData = $request->validated();

        $subcategory = SubCategories::findOrFail($id);
        $subcategory->name = $validateData['name'];
        $subcategory->cat_id = $validateData['cat_id'];
        $subcategory->slug = Str::slug($validateData['slug']) ;
        $subcategory->description = $validateData['description'];
        $subcategory->meta_title = $validateData['meta_title'];
        $subcategory->meta_keyword = $validateData['meta_keyword'];
        $subcategory->meta_description = $validateData['meta_description'];
        $subcategory->status = $request->status == true ? '1':'0';
        $subcategory->update();
        return redirect('admin/sub-category')->with('message','Subcategory Updated Successfully');
    }

    public function destroySubCat($id){
        $subcategory = SubCategories::findOrFail($id);
        $destination_path = 'uploads/subcategory/'.$subcategory->image;
            if(File::exists($destination_path))
            {
                File::delete($destination_path);
            }

        $subcategory->delete();
        //$category->products()->delete();
        return redirect()->back()->with('message','Data Deleted Successfully');
    }




    // End Category
    public function EndCategory(){
        $data['title'] = 'Product End Category';
        $data['subCat'] = SubCategories::orderBy('id', 'DESC')->where('status', '1')->get();
        $data['cat'] = Category::orderBy('id', 'ASC')->where('status', '1')->get();
        $data['endcat'] = ItemCategory::orderBy('created_at', 'DESC')->get();
        return view('admin.end-category.index', $data);
    }

    public function StoreEndcategory(ItemFormrequest $request){
        $validateData = $request->validated();

        $itemcategory = new ItemCategory();
        $itemcategory->name = $validateData['name'];
        $itemcategory->cat_id = $validateData['cat_id'];
        $itemcategory->sub_cat_id = $validateData['sub_cat_id'];
        $itemcategory->slug = Str::slug($validateData['slug']) ;
        $itemcategory->description = $validateData['description'];
        $itemcategory->meta_title = $validateData['meta_title'];
        $itemcategory->meta_keyword = $validateData['meta_keyword'];
        $itemcategory->meta_description = $validateData['meta_description'];
        $itemcategory->status = $request->status == true ? '1':'0';
        $itemcategory->save();
        return redirect()->back()->with('message','End category Created Successfully');
    }


    public function EditEndCategory($id){
        $val=$data['val'] = ItemCategory::findorFail($id);
        if($val){
            $data['title'] = 'Update Product End Category';
            $data['cat'] = Category::orderBy('id', 'DESC')->where('status', '1')->get();
            $data['subCat'] = SubCategories::where('cat_id', $val->cat_id)->where('status','1')->orderBy('id', 'DESC')->get();
            return view('admin.end-category.edit_endcat', $data);
        }
        else{
            return redirect()->back()->with('error', 'ID not Found');
        }
    }

    public function UpdateEndCategory(ItemFormrequest $request, $id){
        $validateData = $request->validated();

        $itemcategory = ItemCategory::findOrFail($id);
        $itemcategory->name = $validateData['name'];
        $itemcategory->cat_id = $validateData['cat_id'];
        $itemcategory->sub_cat_id = $validateData['sub_cat_id'];
        $itemcategory->slug = Str::slug($validateData['slug']) ;
        $itemcategory->description = $validateData['description'];
        $itemcategory->meta_title = $validateData['meta_title'];
        $itemcategory->meta_keyword = $validateData['meta_keyword'];
        $itemcategory->meta_description = $validateData['meta_description'];
        $itemcategory->status = $request->status == true ? '1':'0';
        $itemcategory->update();
        return redirect('admin/end-category')->with('message','End category Updated Successfully');
    }


    public function destroyEndCat($id){
        $itemcategory = ItemCategory::findOrFail($id);
        $destination_path = 'uploads/itemcategory/'.$itemcategory->image;
            if(File::exists($destination_path))
            {
                File::delete($destination_path);
            }

        $itemcategory->delete();
        //$category->products()->delete();
        return redirect()->back()->with('message','Data Deleted Successfully');
    }



}
