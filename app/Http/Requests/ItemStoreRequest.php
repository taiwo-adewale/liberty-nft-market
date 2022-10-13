<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
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
        'name' => 'required',
        'price' => 'required',
        'cat_id' => 'required',
        'description' => 'required',
        'image' => ['required', 'image', 'max: 1999', 'mimes:png,jpg,jpeg,gif,svg']
      ];
    }

    public function messages()
    {
      return [
        'name.required' => 'A name is required for your item',
        'price.required' => 'Input a price for your item',
        'description.required' => 'A description is required for your item',
        'image.required' => 'An image is required for your item',
        'image.image' => 'File must be an image',
      ];
    }
}
