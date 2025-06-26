<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

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
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'profile_photo' => [
                'nullable',
                File::types(['jpg', 'jpeg', 'png'])
                    ->max(2048), // 2MB
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'profile_photo.image' => 'The file must be an image (JPG, JPEG, PNG).',
            'profile_photo.mimes' => 'Only JPG, JPEG, and PNG formats are supported.',
            'profile_photo.max' => 'The image may not be larger than 2MB.',
        ];
    }
}
