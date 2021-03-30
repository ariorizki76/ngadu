<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth()->guard('masyarakat')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $nik = Auth()->guard('masyarakat')->user()->nik;
        $email = Auth()->guard('masyarakat')->user()->email;
        $username = Auth()->guard('masyarakat')->user()->username;
        return [
            'nama'          => ['required'],

            'nik'           => ['required', 'numeric', 'digits:16', Rule::unique('masyarakats', 'nik')->ignore(Auth()->guard('masyarakat')->user($nik))],

            'email'         => ['required', Rule::unique('masyarakats', 'email')->ignore(Auth()->guard('masyarakat')->user($email))],

            'username'      => ['required', Rule::unique('masyarakats', 'username')->ignore(Auth()->guard('masyarakat')->user($username))],
            
            'telp'          => ['required', 'numeric', 'digits_between:11,13'],
        ];
    }
}
