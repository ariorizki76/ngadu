<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = "tanggapans";
    protected $fillable = ['pengaduan_id', 'tanggal_tanggapan', 'tanggapan', 'petugas_id'];

    public function Pengaduan()
    {
        return $this->belongsTo('App\Pengaduan');
    }

    public function Petugas()
    {
        return $this->belongsTo('App\Petugas');
    }

    public function Masyarakat()
    {
        return $this->belongsTo('App\Masyarakat');
    }
}
