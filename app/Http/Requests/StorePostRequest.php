<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:100|string',
            'body' => ['required', 'min:10'],
            'status' => ['required', 'in:active,inactive'],
            'image' => ['image', 'mimes:png,jpg,jpeg']
        ];
    }


    public function messages(): array
    {
        return [
            'title.required' =>'العنوان مطلوب !!', 
            'title.min' =>'العنوان يجب ان يكون اكبر من 3 حروف !!',
        ];
    }
}
