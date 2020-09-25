<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KegiatanResource extends JsonResource
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
            'id'=>$this->id,
            'judul' => $this->judul,
            'deskripsi'=>$this->getShortDescription(),
            'fulldeskripsi'=>$this->deskripsi,
            'tanggal' => $this->tanggal,
            'waktu' => $this->waktu,
            'tempat' => $this->tempat,
            'img'=>'<img src="/storage/'.$this->img.'" alt="" width="50px">',
            'picture'=>$this->img,            
            'action'=>'<a data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm btn-edit" id="'.$this->id.'"><i class="fa fa-edit"></i></a>
             <a class="btn btn-sm btn-danger btn-delete" id="'.$this->id.'"><i class="fa fa-trash-o"></i></a>'
        ];
    }
}
