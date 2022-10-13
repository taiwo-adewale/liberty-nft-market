<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
      return [
        'name' => ['required', 'min:3'],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'username' => ['required', Rule::unique('users', 'username')],
        'password' => ['required', 'min:6', 'confirmed'],
        'image' => ['image', 'nullable', 'max: 1999', 'mimes:png,jpg,jpeg,gif,svg']
      ];
    }

    public function messages()
    {
      return [
        'name.required' => 'The name field is required',
        'name.min' => 'Name must be at least :min characters',
        'email.required' => 'The email field is required',
        'email.email' => 'Email mus be a valid email',
        'username.required' => 'The username field is required',
        'password.required' => 'The password field is required',
        'password.min' => 'Password must be at least :min characters',
        'image.image' => 'File is not an image',
      ];
    }
}
