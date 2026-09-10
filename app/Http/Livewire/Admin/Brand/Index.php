<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brands;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class Index extends Component
{
    public function render()
    {
        $data['categories'] = Category::where('status','1')->get();
        $data['brands'] = Brands::orderBy('id', 'DESC')->get();
        return view('livewire.admin.brand.index', $data)
                    ->extends('layouts.admin')
                    ->section('content');
    }

    //Wire function to store brand
    public $name, $slug, $status, $brandID, $category_id;
    public function rules()
    {
        return [
            'name'=> 'required|string',
            'slug'=> 'required|string',
            'status'=> 'nullable',
            'category_id'=> 'required|integer',

        ];
    }
    public function StoreBrand(){
        $validatedData = $this->validate();
        Brands::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
            'category_id' => $this->category_id,
        ]);
        session()->flash('message', 'Brand Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    //Resetting input fields
    public function resetInput(){
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brandID = NULL;
        $this->category_id = NULL;
    }

    //wire function to fetch brand
    public function editBrand(int $brandID){
        $this->brandID = $brandID;
        $brand = Brands::findOrFail($brandID);
            $this->name = $brand->name;
            $this->slug = $brand->slug;
            $this->status = $brand->status;
            $this->category_id = $brand->category_id;
    }

    //wire function to Update Brand
    public function UpdateBrand(){
        $validatedData = $this->validate();
        Brands::findOrFail($this->brandID)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1':'0',
            'category_id' => $this->category_id,
        ]);
        session()->flash('message', 'Brand Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    //Wire function to delete Brand Data
    public function deleteBrand($brandID){
        $this->brandID = $brandID;
    }
    public function destroyBrand(){
        Brands::findOrFail($this->brandID)->delete();
        session()->flash('message', 'Date Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    //function to close the modal
    public function closeModal(){
        $this->resetInput();
    }

    //function to open the modal
    public function openModal(){
        $this->resetInput();
    }


}
