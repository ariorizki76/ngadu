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

    public function LoginMasyarakat()
    {
        $auth = request()->only('email', 'password');
        if(Auth()->guard('masyarakat')->attempt($auth))
        {
            return redirect()->to('/');
        }
        else{
            return redirect()->to('/login');
        }
    }


    // Login Petugas
    public function FormLoginPetugas()
    {
        return view('petugas.auth.login');
    }

    public function LoginPetugas()
    {
        $auth = request()->only('email', 'password');
        if(Auth()->guard('petugas')->attempt($auth))
        {   
            if(Auth()->guard('petugas')->user()->level == "petugas")
            {
                return redirect()->to('/petugas');
            }
            else{
                return redirect()->to('/petugas/login');
            }
        }
    }

    // Login Admin
    public function FormLoginAdmin()
    {
        return view('admin.auth.login');
    }

    public function LoginAdmin()
    {
        $auth = request()->only('email', 'password');
        if(Auth()->guard('admin')->attempt($auth))
        {   
            if(Auth()->guard('admin')->user()->level == "admin")
            {
                return redirect()->to('/admin');
            }
            else{
                return redirect()->to('/admin/login');
            }
        }
    }
}
