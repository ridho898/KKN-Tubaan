<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery_kategori extends Model
{
    protected $table = 'gallery_kategori';
    protected $fillable = ['id','gallery_id','kategori_id'];
}
