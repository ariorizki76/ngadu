<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = "pengaduans";
    protected $fillable = ['tanggal_pengaduan', 'masyarakat_nik', 'judul_laporan', 'isi_laporan', 'foto', 'status' , 'lokasi'];

    public function Masyarakat()
    {
        return $this->belongsTo('App\Masyarakat');
    }

    public function Admin()
    {
        return $this->belongsTo('App\Pengaduan');
    }

    public function Petugas()
    {
        return $this->belongsTo('App\Pengaduan');
    }


    public function Tanggapan()
    {
        return $this->hasMany('App\Tanggapan');
    }
}

