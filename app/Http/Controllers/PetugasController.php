<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
use App\Pengaduan;
use App\Masyarakat;
use App\Tanggapan;

class PetugasController extends Controller
{
    // Index Petugas
    public function Index()
    {
        $data_pengaduan = Pengaduan::get();
        $data_masyarakat = Masyarakat::get();
        return view('petugas.index', compact('data_pengaduan', 'data_masyarakat'));
    }

    public function Show()
    {
        return abort(404);
    }

    // Tampil Pengaduan
    public function TampilPengaduan()
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->get();
        return view('petugas.pengaduan', compact('data_pengaduan'));
    }

    // Detail Pengaduan
    public function DetailPengaduan($id)
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query){
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        return view('petugas.detailpengaduan', compact('data_pengaduan', 'data_tanggapan'));
    }

    // Hapus Pengaduan
    public function DestroyPengaduan($id)
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_pengaduan->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus!');
    }

    // Ubah Status
    public function StatusOnChange($id)
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_pengaduan->status = request()->get('status');
        $data_pengaduan->save();

        return redirect()->back();
    }

    // Logout
    public function Logout()
    {
        Auth()->guard('petugas')->logout();
        return redirect()->to('/petugas/login');
    }
}
