<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $table ='gallery';
    protected $fillable =[
        'img'
    ];

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class);
    }
}
