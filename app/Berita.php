<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $fillable = ['id','judul','deskripsi','img','admin_id','updated_at'];
    
    public function admin(){
    	return $this->belongsTo(Admin::class);
    }

    public function getShortDescription()
    {
        return substr($this->deskripsi,0,80).'...';
    }
}
