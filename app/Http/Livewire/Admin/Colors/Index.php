<?php

namespace App\Http\Livewire\Admin\Colors;

use App\Models\Color;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $data['colors'] = Color::orderBy('id', 'ASC')->get();
        return view('livewire.admin.colors.index', $data)->extends('layouts.admin')->section('content');
    }

    public $color_name, $color_code, $color_id;
    public function rules(){
        return [
            'color_name'=> 'required|string|unique:color,color_name',
            'color_code'=> 'required|string',
        ];
    }

    public function StoreColor(){
        $validatedData = $this->validate();
        Color::create([
            'color_name' => $this->color_name,
            'color_code' => $this->color_code
        ]);
        session()->flash('message', 'Color Created Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function resetInput(){
        $this->color_name = NULL;
        $this->color_code = NULL;
        $this->color_id = NULL;

    }

    public function editColor(int $color_id){
        $this->color_id = $color_id;
        $color = Color::findOrFail($color_id);
        $this->color_name = $color->color_name;
        $this->color_code = $color->color_code;
    }

    //wire function to Update Brand
    public function UpdateColor(){
        $validatedData = $this->validate();
        Color::findOrFail($this->color_id)->update([
            'color_name' => $this->color_name,
            'color_code' => $this->color_code,
        ]);
        session()->flash('message', 'Color Updated Successfully');
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
