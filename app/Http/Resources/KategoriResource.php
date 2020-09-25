<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KategoriResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'number'=>$this->id,
            'nama' => $this->nama,            
            'action'=>'<a data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm btn-edit" id="'.$this->id.'">Edit</a>
             <a class="btn btn-sm btn-danger btn-delete" id="'.$this->id.'">Hapus</a>'
        ];
    }
}
