<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequestAdmin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth()->guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_petugas'  => ['required',],
            'email'         => ['required', Rule::unique('petugas', 'email')->ignore(Auth()->guard('admin')->user()->id)],
            'username'      => ['required', Rule::unique('petugas', 'username')->ignore(Auth()->guard('admin')->user()->id)],
            'telp'          => ['required', 'numeric', 'digits_between:11,13'],
        ];
    }
}
