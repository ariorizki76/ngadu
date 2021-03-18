<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    protected $table = "masyarakats";
    protected $fillable = ['nama', 'email', 'username', 'password', 'telp'];
    protected $primaryKey = "nik";
    protected $guard = "masyarakat";
    protected $hidden = ['password'];

    public function Pengaduan()
{
    return $this->hasMany('App\Pengaduan');
}
}

