<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // Login Masyarakat
    public function FormLoginMasyarakat()
    {
        return view('auth.login');
    }

    public function LoginMasyarakat(Request $request)
    {
        request()->validate([   
            'username' => 'required',
            'password' => 'required',
        ],
    [
            'username.required' => 'Username tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            
            
    ]);
        
        $auth = request()->only('status','username', 'password');
        if (Auth()->guard('masyarakat')->attempt($auth)) {
            if(Auth()->guard('masyarakat')->user()->status == "nonaktif"){
                return redirect()->to('/login')->with('status', 'Akun anda dinonaktifkan!');
            } else {
                return redirect()->to('/masyarakat');
            }
        } else {
            return redirect()->to('/login')->with('status', 'Username/Password anda salah!');
        }

        }
        


    // Login Petugas
    public function FormLoginPetugas()
    {
        return view('petugas.auth.login');
    }

    public function LoginPetugas(Request $requst)
    {

        request()->validate([   
            'username' => 'required',
            'password' => 'required',
            
        ],
    [
            'username.required' => 'Username tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            
            
    ]);
        $auth = request()->only('username', 'password');
        if(Auth()->guard('petugas')->attempt($auth))
        {   
            if(Auth()->guard('petugas')->user()->level == "petugas")
            {
                return redirect()->to('/petugas');
            }
             else {
                return redirect()->to('/petugas/login')->with('status', 'Username/Password anda salah!');
            }
        } else{
            return redirect()->to('/petugas/login')->with('status', 'Username/Password anda salah!');
        }
    }

    // Login Admin
    public function FormLoginAdmin()
    {
        return view('admin.auth.login');
    }

    public function LoginAdmin()
    {
        request()->validate([   
            'username' => 'required',
            'password' => 'required',
            
        ],
    [
            'username.required' => 'Username tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            
            
    ]);


    $auth = request()->only('username', 'password');
    if(Auth()->guard('admin')->attempt($auth))
    {   
        if(Auth()->guard('admin')->user()->level == "admin")
        {
            return redirect()->to('/admin');
        }
         else {
            return redirect()->to('/admin/login')->with('status', 'Username/Password anda salah!');
        }
    } else{
        return redirect()->to('/admin/login')->with('status', 'Username/Password anda salah!');
    }
    }
}
