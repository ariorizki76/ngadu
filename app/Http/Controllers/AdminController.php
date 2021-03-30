<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
use App\Pengaduan;
use App\Masyarakat;
use App\Tanggapan;
use App\Desa;
use App\Http\Requests\UpdateProfileRequestAdmin;
use Illuminate\Support\Facades\Auth;
use PDF;

class AdminController extends Controller
{
    public function Index()
    {
        $data_pengaduan = Pengaduan::all()->count();
        $pengaduan_terverifikasi = Pengaduan::where('status', 'selesai')->count();
        $data_masyarakat = Masyarakat::all()->count();
        $data_petugas = Petugas::all()->count();
        $data_pengaduans = Pengaduan::with('masyarakat')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.index', compact('data_pengaduan', 'data_pengaduans', 'pengaduan_terverifikasi', 'data_masyarakat', 'data_petugas'));
    }

    // Tampil Pengaduan
    public function TampilPengaduan()
    {   $desa = Desa::all();
        $data_pengaduan = Pengaduan::with('masyarakat')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.pengaduan', compact('data_pengaduan', 'desa'));
    }

    // Detail Pengaduan
    public function DetailPengaduan($id)
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_pengaduan = Pengaduan::with('admin')->find($id);
        $data_tanggapan = Tanggapan::whereHas('pengaduan', function($query){
            $query->where('pengaduan_id', request()->route('id'));
        })->with('petugas')->first();
        return view('admin.detailpengaduan', compact('data_pengaduan', 'data_tanggapan'));
    }

    // Cetak Laporan Pertanggal
    public function CetakPengaduanPertanggal($tglawal, $tglakhir)
    {
        $cetak_pertanggal = Pengaduan::with('masyarakat')->whereBetween('tanggal_pengaduan', [$tglawal, $tglakhir])->get();
        return view('admin.cetakpertanggal', compact('cetak_pertanggal'));
        // $pdf = PDF::LoadView('admin.pdf', compact('data_pengaduan'))->setPaper('a4', 'landscape');
        // return $pdf->stream();
    }

        // Cetak Laporan Lokasi
        public function CetakPengaduanLokasi($lokasi)
        {   
            $cetak_lokasi = Pengaduan::with('masyarakat')->where('lokasi', [$lokasi])->get();
            return view('admin.cetaklokasi', compact('cetak_lokasi'));
            // $pdf = PDF::LoadView('admin.pdf', compact('data_pengaduan'))->setPaper('a4', 'landscape');
            // return $pdf->stream();
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

    // Data Petugas
    public function AdminPetugas()
    {
        $data_petugas = Petugas::orderBy('id', 'DESC')->paginate(10);
        return view('admin.adminpetugas', compact('data_petugas'));
    }

    // Search Petugas
    public function PetugasSearch(Request $request)
    {
        $search = $request->search;
        $data_petugas = Petugas::where('nama_petugas', 'like', "%" .$search. "%")->orderBy('id', 'DESC')->paginate(10);
        return view('admin.adminpetugas', compact('data_petugas'));
    }

    // Data Masyarakat
    public function AdminMasyarakat()
    {
        $data_masyarakat = Masyarakat::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.adminmasyarakat', compact('data_masyarakat'));
    }

    // Search Masyarakat
    public function MasyarakatSearch(Request $request)
    {
        $search = $request->search;
        $data_masyarakat = Masyarakat::where('nama', 'like', "%" .$search. "%")->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.adminmasyarakat', compact('data_masyarakat'));
    }

    // Ubah Status
    public function StatusOnChange($id)
    {
        $data_pengaduan = Pengaduan::with('masyarakat')->find($id);
        $data_pengaduan->status = request()->get('status');
        $data_pengaduan->save();

        return redirect()->back()->with('statuss', 'Status laporan berhasil diubah!');
    }

    // Ubah Status Masyarakat
    public function UbahStatusMasyarakat($id)
    {
        $status_masyarakat = Masyarakat::find($id);
        $status_masyarakat->status = request()->get('status');
        $status_masyarakat->save();

        return redirect()->back()->with('status', 'Status masyarakat berhasil diubah!');
    }

    // Profil
    public function ProfileAdmin()
    {
        $admin = Auth()->guard('admin')->user();
        return view('admin.adminprofile', compact('admin'));
    }

      // Edit Profil
      public function UpdateAdmin(UpdateProfileRequestAdmin $request)
      {
      

          $request = Auth()->guard('admin')->user()->update(
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
        return view('admin.tanggapan', compact('detail_pengaduan'));
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
        $data_tanggapan->petugas_id = Auth()->guard('admin')->user()->id;
        $data_tanggapan->save();

        return redirect()->to('/admin/pengaduan/' . $id)->with('status', 'Laporan berhasil ditanggapi!');
    }

      // Hapus Petugas
      public function DestroyPetugas($id)
      {
          $data_masyarakat = Petugas::with('petugas')->find($id);
          $data_masyarakat->delete();
          return redirect()->back()->with('status', 'Data petugas berhasil dihapus!');
      }

    // Logout
    public function Logout()
    {
        Auth()->guard('admin')->logout();
        return redirect()->to('/admin/login');
    }
}
