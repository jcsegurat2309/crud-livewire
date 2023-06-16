<?php

namespace App\Http\Livewire;

use App\Models\Post;

use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    use WithFileUploads;
    public $edit = false;
    public $post, $imagen, $id_imagen;

    public $rules = [
        'post.title' => 'required|min:5|max:35',
        'post.content' => 'required|min:20|max:255'
    ];
    public function cerrar(){
        $this->reset(['imagen','edit']);
        $this->id_imagen = rand();
    }
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function mount(Post $post){
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.edit-post');
    }

    public function update(){
        $this->validate();
        if($this->imagen){
            $this->validate([
                'imagen' => 'max:3072|mimes:JPG,PNG'
            ]);
            if(Storage::disk('publico')->exists($this->post->imagen)){
                Storage::disk('publico')->delete($this->post->imagen);
                $nombre = Str::slug($this->post->title).'.'.$this->imagen->getClientOriginalExtension();
                $ruta = public_path('post/'.$nombre);
                $imagen = Image::make($this->imagen->getRealPath());
                $imagen->save($ruta,50);
                $this->post->imagen = 'post/'.$nombre;
            
            }else{
                $this->emit('alert','Actualizar post','Archivo inexistente por favor, contacta a soporte técnico','error');
            }
        }

        $this->post->save();
        $this->id_imagen = rand();
        $this->reset(['edit','imagen']);
        $this->emit('alert','Actualizar Post','Actualización con Exito!','success');
        $this->emitTo('show-posts','render');
    }

}
