<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string',
            'nim' => 'required|integer',
            'email' => 'required|email',
            'nomor_telepon' => 'required|string|max:16',
            'alamat' => 'required|string',
            'status' => 'required|in:0,1'
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama anggota wajib diisi!',
            'nim.required' => 'NIM wajib diisi!',
            'nim.unique' => 'NIM sudah terdaftar!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Email tidak valid!',
            'email.unique' => 'Email sudah terdaftar!',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi!',
            'nomor_telepon.numeric' => 'Nomor telepon harus berupa angka!',
            'nomor_telepon.max' => 'Nomor telepon maksimal 16 digit!',
            'alamat.required' => 'Alamat wajib diisi!',
            'status.required' => 'Status wajib diisi!',
            'status.in' => 'Status harus berupa nonaktif atau aktif!',
        ];
    }
}
