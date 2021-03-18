<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Masyarakat;
use App\Tanggapan;
use App\Petugas;
use Image;
use File;
Use Carbon\Carbon;

class MasyarakatController extends Controller
{
    // Index Masyarakat
    public function Index()
    {
        return view('index');
    }

    // Form Pengaduan
    public function FormPengaduan()
    {
        return view('form-pengaduan');
    }

    // Simpan Pengaduan
    public function SimpanPengaduan()
    {
        request()->validate([
            'isi_laporan'=> 'required',
            'foto' => 'required'
        ]);

        $foto = request()->file('foto');
        $filename = $foto->getClientOriginalName();

        $foto->move(public_path(). '/images/', $filename);
        $foto_compress = Image::make(public_path(). '/images/'. $filename);
        $foto_compress->fit(480, 360);
        $foto_compress->save(public_path('/img/'. $filename));
        unlink(public_path('/images/'. $filename));

        $data_pengaduan = new Pengaduan();
        $data_pengaduan->tanggal_pengaduan = request()->get('tanggal_pengaduan');
        $data_pengaduan->masyarakat_nik = Auth()->guard('masyarakat')->user()->nik;
        $data_pengaduan->isi_laporan = request()->get('isi_laporan');
        $data_pengaduan->foto = $filename;
        $data_pengaduan->save();

        return redirect()->to('/laporanku');
    }

    // Laporanku
    public function Laporanku()
    {
        $data_pengaduan = Auth()->guard('masyarakat')->user()->pengaduan;
        return view('laporanku', compact('data_pengaduan'));
    }

    // Detail Laporan
    public function DetailLaporan($id)
    {
        $detail_laporan = Pengaduan::with('masyarakat')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query){
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        return view('detail-laporan', compact('detail_laporan', 'data_tanggapan'));
    }

    // Logout
    public function Logout()
    {
        Auth()->guard('masyarakat')->logout();
        return redirect()->to('/');
    }
}
