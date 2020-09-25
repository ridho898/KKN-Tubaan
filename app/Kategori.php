<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public $table = 'kategori';
    protected $fillable =['nama'];
    public function gallery()
    {
        return $this->belongsToMany(Gallery::class);
    }
}
