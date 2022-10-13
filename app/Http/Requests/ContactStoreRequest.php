<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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
      'name' => ['required', 'max:50'],
      'email' => ['required', 'email'],
      'subject' => 'required',
      'message' => 'required'
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Name is required',
      'name.max' => 'Name must not be greater than :max characters',
      'email.required' => 'Email is required',
      'email.email' => 'Email must be a valid email address',
      'subject.required' => 'Subject is required',
      'message.required' => 'Message is required',
    ];
  }
}
