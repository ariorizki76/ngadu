<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    protected $table = "petugas";
    protected $guard = "petugas";
    protected $hidden = ['password'];
    protected $fillable = ['nama_petugas', 'email', 'username', 'password', 'telp', 'level'];

    public function Petugas()
    {
        return $this->belongsTo('App\Petugas');
    }
    public function Tanggapan()
    {
        return $this->hasMany('App\Tanggapan');
    }
}
