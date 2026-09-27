<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $memberId = $this->route('member');

        return [
            'nama' => 'required|string|max:100',
            'nim' => ['required', 'string', Rule::unique('members', 'nim')->ignore($memberId)],
            'email' => ['required', 'email', 'max:100', Rule::unique('members', 'email')->ignore($memberId)],
            'nomor_telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'status' => 'required|in:aktif,nonaktif',
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
            'nomor_telepon.max' => 'Nomor telepon maksimal 15 karakter!',
            'alamat.required' => 'Alamat wajib diisi!',
            'status.required' => 'Status wajib diisi!',
            'status.in' => 'Status harus berupa nonaktif atau aktif!',
        ];
    }
}
