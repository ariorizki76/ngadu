<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = "petugas";
    protected $guard = "admin";
    protected $hidden = ['password'];
    protected $fillable = ['nama_petugas', 'email', 'username', 'password', 'telp', 'level'];

    public function Admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function Pengaduan()
    {
    
    return $this->hasMany('App\Pengaduan');
    }

    
}