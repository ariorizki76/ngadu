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
use App\Desa;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;

class MasyarakatController extends Controller
{
    // Index Masyarakat
    public function Index()
    {
        $data_pengaduan = Pengaduan::all()->count();
        $pengaduan_terverifikasi = Pengaduan::where('status', 'selesai')->count();
        $data_masyarakat = Masyarakat::all()->count();
        $data_petugas = Petugas::all()->count();
        return view('index',  compact('data_pengaduan', 'pengaduan_terverifikasi', 'data_masyarakat', 'data_petugas'));
    }

    // 
    public function Dashboard()
    {
        return view('masyarakat.index');
    }

    // Form Pengaduan
    public function FormPengaduan()
    {
        $desa = Desa::all();
        return view('masyarakat.form-pengaduan', compact('desa'));

    }

    // Simpan Pengaduan
    public function SimpanPengaduan()
    {
        request()->validate([
            'judul_laporan' => 'required',
            'isi_laporan'=> 'required',
            'lokasi' => 'required',
            'foto' => 'required',
        ],[
            'judul_laporan.required' => 'Judul tidak boleh kosong!',
            'isi_laporan.required' => 'Isi Laporan tidak boleh kosong!',
            'lokasi.required' => 'Lokasi tidak boleh kosong!',
            'foto.required' => 'Foto tidak boleh kosong!',
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
        $data_pengaduan->judul_laporan = request()->get('judul_laporan');
        $data_pengaduan->isi_laporan = request()->get('isi_laporan');
        $data_pengaduan->foto = $filename;
        $data_pengaduan->lokasi = request()->get('lokasi');
        $data_pengaduan->save();

        return redirect()->to('/masyarakat/laporanku')->with('status', 'Berhasil membuat pengaduan!');
    }

    // Laporanku
    public function Laporanku()
    {
        $data_pengaduan = Pengaduan::where('masyarakat_nik', Auth()->guard('masyarakat')->user()->nik)->orderBy('id', 'DESC')->paginate(10);
        return view('masyarakat.laporanku', compact('data_pengaduan'));
        
    }

    // Detail Laporan
    public function DetailLaporan($id)
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query){
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        return view('masyarakat.detaillaporan', compact('data_pengaduan', 'data_tanggapan'));
    }

    // Profil
    public function ProfileMasyarakat()
    {
        $masyarakat = Auth()->guard('masyarakat')->user();
        return view('masyarakat.masyarakatprofile', compact('masyarakat'));
    }

      // Edit Profil
      public function UpdateMasyarakat(UpdateProfileRequest $request)
      {
          $request = Auth()->guard('masyarakat')->user()->update(
              $request->all()
          );
          return redirect()->back()->with('status', 'Edit Profil Berhasil!');
      }

    // Logout
    public function Logout()
    {
        Auth()->guard('masyarakat')->logout();
        return redirect()->to('/');
    }
}
