<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
use App\Pengaduan;
use App\Masyarakat;
use App\Tanggapan;
use PDF;

class AdminController extends Controller
{
    public function Index()
    {
        $data_pengaduan = Pengaduan::get();
        $data_masyarakat = Masyarakat::get();
        return view('admin.index', compact('data_pengaduan', 'data_masyarakat'));
    }

    // Tampil Pengaduan
    public function TampilPengaduan()
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->get();
        return view('admin.pengaduan', compact('data_pengaduan'));
    }

    // Detail Pengaduan
    public function DetailPengaduan($id)
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query){
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        return view('admin.detailpengaduan', compact('data_pengaduan', 'data_tanggapan'));
    }

    // Cetak Laporan
    public function CetakPdf()
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->get();
        $pdf = PDF::LoadView('admin.pdf', compact('data_pengaduan'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function DetailPdf($id)
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query){
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        $pdf = PDF::LoadView('admin.detailpdf', compact('data_pengaduan', 'data_tanggapan'))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    // Logout
    public function Logout()
    {
        Auth()->guard('admin')->logout();
        return redirect()->to('/admin/login');
    }
}
