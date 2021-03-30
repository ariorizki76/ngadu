<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Masyarakat;
use App\Petugas;
class RegisterController extends Controller
{
    // Register Masyarakat
    public function FormRegisterMasyarakat()
    {
        return view('auth.register');
    }

    public function RegisterMasyarakat()
    {
        request()->validate([
            'nik' => 'required|numeric|digits:16|unique:masyarakats',
            'nama' => 'required',
            'email' => 'required|unique:masyarakats',
            'username' => 'required|unique:masyarakats',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'telp' => 'required|digits_between:11,13|numeric',
        ], [
            'nik.required' => 'NIK tidak boleh kosong!',
            'nik.numeric' => 'NIK harus berupa angka!',
            'nik.digits' => 'NIK harus 16 digit!',
            'nik.unique' => 'NIK sudah terdaftar!',
            'nama.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah terdaftar!',
            'username.required' => 'Username tidak boleh kosong!',
            'username.unique' => 'Username sudah terdaftar!',
            'password.required' => 'Password tidak boleh kosong!',
            'password_confirm.required' => 'Password tidak boleh kosong!',
            'password_confirm.same' => 'Password harus sama!',
            'telp.required' => 'No. Telepon tidak boleh kosong!',
            'telp.digits_between' => 'No. Telepon harus diantara 11-13 digit!',
            'telp.numeric' => 'No. Telepon harus berupa angka!',
        ]);

        $data_masyarakat = new Masyarakat();
        $data_masyarakat->nik = request()->get('nik');
        $data_masyarakat->nama = request()->get('nama');
        $data_masyarakat->email = request()->get('email');
        $data_masyarakat->username = request()->get('username');
        $data_masyarakat->password = bcrypt(request()->get('password'));
        $data_masyarakat->telp = request()->get('telp');
        $data_masyarakat->save();
        return redirect()->to('/login')->with('success', 'Registrasi berhasil, Silahkan Login!');
    }

    // Register Petugas/Admin
    public function FormRegisterAdmin()
    {
        return view('admin.auth.register');
    }

    public function RegisterAdmin()
    {
        request()->validate([
            'nama_petugas' => 'required',
            'email' => 'required|unique:petugas',
            'username' => 'required|unique:petugas',
            'password' => 'required',
            'password_confirm' => 'required|same:password' ,
            'telp' => 'required|digits_between:11,13|numeric',
            'level' => 'required',
        ],
    [
            'nama_petugas.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.unique' => 'Email sudah terdaftar!',
            'username.required' => 'Username tidak boleh kosong!',
            'username.unique' => 'Username sudah terdaftar!',
            'password.required' => 'Password tidak boleh kosong!',
            'password_confirm.required' => 'Password tidak boleh kosong!',
            'password_confirm.same' => 'Password harus sama!',
            'telp.required' => 'No. Telepon tidak boleh kosong!',
            'telp.numeric' => 'No. Telepon harus berupa angka!',
            'telp.digits_between' => 'No. Telepon harus diantara 11-13 digit!',
            'level.required' => 'Level tidak boleh kosong!',

    ]);

        $data_admin = new Petugas();
        $data_admin->nama_petugas = request()->get('nama_petugas');
        $data_admin->email = request()->get('email');
        $data_admin->username = request()->get('username');
        $data_admin->password = bcrypt(request()->get('password'));
        $data_admin->telp = request()->get('telp');
        $data_admin->level = request()->get('level');
        $data_admin->save();
        return redirect()->to('/admin/petugas')->with('statuss', 'Data petugas berhasil ditambahkan!');
    }
}
