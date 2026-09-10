<?php

namespace App\Http\Livewire\Admin\Sizes;

use App\Models\Size;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $data['size'] = Size::orderBy('id', 'ASC')->get();
        return view('livewire.admin.sizes.index', $data)->extends('layouts.admin')->section('content');
    }

    public $size_code , $size_name, $size_id;
    public function rules(){
        return [
            'size_name'=> 'required|string|unique:size,size_name',
            'size_code'=> 'required|string',
        ];
    }

    public function StoreSize(){
        $validatedData = $this->validate();
        Size::create([
            'size_name' => $this->size_name,
            'size_code' => $this->size_code
        ]);
        session()->flash('message', 'Size Created Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function resetInput(){
        $this->size_name = NULL;
        $this->size_code = NULL;
        $this->size_id = NULL;

    }

    public function editSize(int $size_id){
        $this->size_id = $size_id;
        $size = Size::findOrFail($size_id);
        $this->size_name = $size->size_name;
        $this->size_code = $size->size_code;
    }

    //wire function to Update Brand
    public function UpdateSize(){
        $validatedData = $this->validate();
        Size::findOrFail($this->size_id)->update([
            'size_name' => $this->size_name,
            'size_code' => $this->size_code,
        ]);
        session()->flash('message', 'Size Updated Successfully');
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


