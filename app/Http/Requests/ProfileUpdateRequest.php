<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'profile_photo' => ['nullable', 'image', 'max:2048'], // gambar opsional max 2MB
        ];
    }

    public function update()
    {
        $user = $this->user();

        $data = $this->validated();

        if ($this->hasFile('profile_photo')) {
            // Hapus gambar lama jika ada
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // Simpan gambar baru ke storage/public/profile-photos
            $path = $this->file('profile_photo')->store('profile-photos', 'public');

            $data['profile_photo_path'] = $path;
        }

        $user->update($data);

        return back()->with('status', 'profile-updated');
    }
}
