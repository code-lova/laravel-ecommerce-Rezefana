<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Color;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Currency;
use Illuminate\Support\Str;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\ProductColor;
use App\Models\ProductImages;
use App\Models\Products;
use App\Models\ProductSize;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $data['title'] = 'Product Table';
        $data['currency'] = Currency::where('status','1')->first();
        $data['products'] = Products::orderBy('created_at', 'DESC')->get();
        return view('admin.products.index', $data);
    }

    public function CreateProduct(){
        $data['title'] = 'Create New Product';
        $data['category'] = Category::orderBy('id', 'ASC')->where('status','1')->get();
        $data['sub_category'] = SubCategories::where('status','1')->get();
        $data['end_category'] = ItemCategory::where('status','1')->get();
        $data['brands'] = Brands::where('status','1')->get();
        $data['color'] = Color::all();
        $data['size'] = Size::all();
        $data['currency'] = Currency::where('status','1')->first();
        return view('admin.products.create', $data);
    }

    public function StoreProducts(ProductFormRequest $request){
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['cat_id']);
        $product= $category->products()->create([
            'cat_id' => $validatedData['cat_id'],
            'sub_cat_id' => $validatedData['sub_cat_id'],
            'end_cat_id' => $validatedData['end_cat_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'short_description' => $validatedData['short_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        if($request->hasFile('image'))
        {
            $uploadPath = 'uploads/products';

            $j = 1;
            foreach($request->file('image') as $ImageFile){
                $extension = $ImageFile->getClientOriginalExtension();
                $filename = time().$j++.'.'.$extension;
                $ImageFile->move($uploadPath,$filename);
                $finalImagePathName = $filename;

                $product->ProductsImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        if($request->product_size_id){
            foreach($request->product_size_id as $sizes){
                $product->ProductSize()->create([
                    'product_id' => $product->id,
                    'product_size_id' => $sizes,
                ]);
            }
        }

        if($request->product_color_id){
            foreach($request->product_color_id as $colors){
                $product->ProductColor()->create([
                    'product_id' => $product->id,
                    'product_color_id' => $colors,
                ]);
            }
        }

        return redirect('/admin/market/products')->with('message', 'Product Added Successfully');
    }



    //fetch all sub cat with main cat ID when main cat is selected
    public function fetchSubcategory(Request $request){

        $data['subcategory'] = SubCategories::where('cat_id',$request->cat_id)->where('status','1')->get(['name','id']);

        return response()->json($data);
    }

    //fetch all end cat with sub cat ID when sub cat is selected
    public function fetchEndcategory(Request $request){

        $data['endcategory'] = ItemCategory::where('sub_cat_id',$request->sub_cat_id)->where('status','1')->get(['name','id']);

        return response()->json($data);
    }


    //function to edit products
    public function EditProduct(int $product_id){
        $product=$data['product'] = Products::findOrFail($product_id);
        if($product){
            $data['title'] = 'Edit/Update Product';
            $data['category'] = Category::where('status','1')->get();
            $data['sub_category'] = SubCategories::where('cat_id',$product->cat_id)->where('status','1')->get();
            $data['end_category'] = ItemCategory::where('sub_cat_id',$product->sub_cat_id)->where('status','1')->get();
            $data['brands'] = Brands::where('status','1')->get();
            $product_color=$data['product_color'] = $product->ProductColor->pluck('product_color_id')->toArray();
            $data['color'] = Color::whereNotIn('id',$product_color)->get();

            $product_size=$data['product_size'] = $product->ProductSize->pluck('product_size_id')->toArray();
            $data['size'] = Size::whereNotIn('id',$product_size)->get();
            $data['currency'] = Currency::where('status','1')->first();
            return view('admin.products.edit', $data);
        }
        else{
            return redirect()->back()->with('error', 'ID not Found');
        }
    }

    //Update the product
    public function UpdateProduct(ProductFormRequest $request, int $product_id){
        $validatedData = $request->validated();

        $product = Category::findOrFail($validatedData['cat_id'])->products()->where('id',$product_id)->first();
        if($product){
            $product->update([
                'cat_id' => $validatedData['cat_id'],
                'sub_cat_id' => $validatedData['sub_cat_id'],
                'end_cat_id' => $validatedData['end_cat_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'short_description' => $validatedData['short_description'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $request->trending == true ? '1':'0',
                'status' => $request->status == true ? '1':'0',
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);


            if($request->hasFile('image'))
            {
                $uploadPath = 'uploads/products';

                $j = 1;
                foreach($request->file('image') as $ImageFile){
                    $extension = $ImageFile->getClientOriginalExtension();
                    $filename = time().$j++.'.'.$extension;
                    $ImageFile->move($uploadPath,$filename);
                    $finalImagePathName = $filename;

                    $product->ProductsImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }

            if($request->product_size_id){
                foreach($request->product_size_id as $sizes){
                    $product->ProductSize()->create([
                        'product_id' => $product->id,
                        'product_size_id' => $sizes,
                    ]);
                }
            }

            if($request->product_color_id){
                foreach($request->product_color_id as $colors){
                    $product->ProductColor()->create([
                        'product_id' => $product->id,
                        'product_color_id' => $colors,
                    ]);
                }
            }

            return redirect()->back()->with('message', 'Product Updated Successfully');

        }
        else{
            return redirect('/admin/market/products')->with('message', 'Product ID Not Found');
        }
    }


    //Delete product image
    public function DestroyProductImage(int $product_image_id){
        $productImage = ProductImages::findOrFail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Image Deleted Successfully');
    }

    public function DestroyProduct(int $product_id){
        $product = Products::findOrFail($product_id);
        if($product->ProductsImages){
            foreach($product->ProductsImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message', 'Product Data Deleted Successfully');

    }

    public function DestroyProductSize(int $product_size_id){
        $productSize = ProductSize::findOrFail($product_size_id);
        $productSize->delete();
        return redirect()->back()->with('message', 'Product Size Deleted Successfully');
    }

    public function DestroyProductColor(int $product_color_id){
        $productColor = ProductColor::findOrFail($product_color_id);
        $productColor->delete();
        return redirect()->back()->with('message', 'Product Color Deleted Successfully');
    }



}
