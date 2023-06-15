<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $modal = false;
    public $title,$content, $imagen,$id_imagen;

    protected $rules = [
        'title' => 'required|max:35|min:5',
        'content' => 'required|max:255|min:20',
        'imagen' => 'required|max:3056|mimes:jpg,png,svg'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function mount(){
        $this->id_imagen = rand();
    }
    public function render()
    {
        return view('livewire.create-post');
    }
    public function crear(){
        $this->validate();
        //Sin comprimir img
        //$url = Storage::disk('publico')->put('post',$this->imagen);
        //usando intervention image
        $nombre = Str::slug($this->title,'-').'.'.$this->imagen->getClientOriginalExtension();
        $ruta = public_path('post/'.$nombre);
        $image = Image::make($this->imagen->getRealPath());
        $image->save($ruta,50);
        Post::create([
            'title'=>$this->title,
            'content' => $this->content,
            'imagen' => '/post'.'/'.$nombre
        ]);
        $this->id_imagen = rand();
        $this->reset(['modal','title','content']);
        $this->emit('alert','Registro creado con Exito!','Crear post');
        $this->emitTo('show-posts','render');
    }
}
