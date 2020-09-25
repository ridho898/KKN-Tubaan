<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $fillable = ['id','judul','deskripsi','tanggal','waktu','tempat','img'];
        

    public function getShortDescription()
    {
        return substr($this->deskripsi,0,80).'...';
    }
}
