<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
    protected $fillable = ['id','toptext','lowertext','link','img'];
    
    public function getShortDescription()
    {
        return substr($this->deskripsi,0,80).'...';
    }
}
