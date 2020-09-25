<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imgprofil extends Model
{
    protected $table = 'Imgprofil';
    protected $fillable = ['id','judul','deskripsi','img'];
    
    public function getShortDescription()
    {
        return substr($this->deskripsi,0,80).'...';
    }
}
