<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
use App\Pengaduan;
use App\Masyarakat;
use App\Tanggapan;
use App\Http\Requests\UpdateProfileRequestPetugas;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    // Index Petugas
    public function Index()
    {
        $data_pengaduan = Pengaduan::all()->count();
        $pengaduan_terverifikasi = Pengaduan::where('status', 'selesai')->count();
        $pengaduan_diproses = Pengaduan::where('status', 'proses')->count();
        $data_masyarakat = Masyarakat::all()->count();
        $data_petugas = Petugas::all()->count();
        return view('petugas.index', compact('data_pengaduan', 'pengaduan_terverifikasi', 'pengaduan_diproses', 'data_masyarakat', 'data_petugas'));
    }

    public function Show()
    {
        return abort(404);
    }

    // Tampil Pengaduan
    public function TampilPengaduan()
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->orderBy('id', 'DESC')->paginate(10);
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

        return redirect()->back()->with('statuss', 'Status laporan berhasil diubah!');
    }

    // Data Masyarakat
    public function PetugasMasyarakat()
    {
        $data_masyarakat = Masyarakat::orderBy('created_at', 'DESC')->paginate(10);
        return view('petugas.petugasmasyarakat', compact('data_masyarakat'));
    }

    // Search Masyarakat
    public function MasyarakatSearch(Request $request)
    {
        $search = $request->search;
        $data_masyarakat = Masyarakat::where('nama', 'like', "%" .$search. "%")->paginate();
        return view('petugas.petugasmasyarakat', compact('data_masyarakat'));
    }

    // Profil
    public function ProfilePetugas()
    {
        $petugas = Auth()->guard('petugas')->user();
        return view('petugas.petugasprofile', compact('petugas'));
    }

    // Edit Profil
    public function UpdatePetugas(UpdateProfileRequestPetugas $request)
    {
        $request = Auth()->guard('petugas')->user()->update(
            $request->all()
        );
        request()->validate([
        
        'nama_petugas' => 'required',
        ], [
            'nama_petugas.required' => 'Nama tidak boleh kosong!',
        ]);
        return redirect()->back()->with('status', 'Edit Profil Berhasil!');
    }

    // Form Tanggapan
    public function FormTanggapan($id)
    {
        $detail_pengaduan = Pengaduan::with('masyarakat')->find($id);
        return view('petugas.tanggapan', compact('detail_pengaduan'));
    }

    // Simpan Tanggapan
    public function StoreTanggapan($id)
    {
        request()->validate([
            'tanggapan' => 'required',
        ], [
            'tanggapan.required' => 'Tanggapan tidak boleh kosong!'
        ]);
        $data_tanggapan = new Tanggapan();
        $data_tanggapan->tanggal_tanggapan = request()->get('tanggal_tanggapan');
        $data_tanggapan->pengaduan_id = request()->get('pengaduan_id');
        $data_tanggapan->tanggapan = request()->get('tanggapan');
        $data_tanggapan->petugas_id = Auth()->guard('petugas')->user()->id;
        $data_tanggapan->save();

        return redirect()->to('/petugas/pengaduan/' . $id)->with('status', 'Laporan berhasil ditanggapi!');
    }

    // Logout
    public function Logout()
    {
        Auth()->guard('petugas')->logout();
        return redirect()->to('/petugas/login');
    }
}
