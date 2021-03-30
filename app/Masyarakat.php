<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Masyarakat extends Authenticatable
{

    protected $table = "masyarakats";
    protected $fillable = ['nama', 'email', 'username', 'password', 'telp', 'status'];
    protected $primaryKey = "nik";
    protected $guard = "masyarakat";
    protected $hidden = ['password'];

    public function Masyarakat()
    {
        return $this->belongsTo('App\Masyarakat');
    }

    public function Pengaduan()
    {
    
    return $this->hasMany('App\Pengaduan');
    }

    public function Tanggapan()
    {
        return $this->hasMany('App\Tanggapan');
    }
}

