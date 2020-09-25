<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $table = 'admin';
    protected $fillable = [
        'nip',            
        'nama',
        'alamat',
        'notelp',
        'avatar',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
