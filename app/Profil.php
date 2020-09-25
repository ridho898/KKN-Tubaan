<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profil';
    protected $fillable = ['id','judul','deskripsi','link','img'];    

    public function getShortDescription()
    {
        return substr($this->deskripsi,0,80).'...';
    }
}
