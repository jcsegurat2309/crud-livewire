<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DeletePost extends Component
{
    public $delete=false;
    public $post,$message;
    public function mount(Post $post){
        $this->post = $post;
    }
    public function render()
    {
        return view('livewire.delete-post');
    }
    public function del(){
        if(Storage::disk('publico')->exists($this->post->imagen)){
            $this->post->delete();
            Storage::disk('publico')->delete($this->post->imagen);
            $this->reset('delete');
            $this->emitTo('show-posts','render');
        }else{
            $this->emit('alert','Archivo no encontrado!','Ponte en contacto con soporte tecnico...','error');
        }
    }
}
