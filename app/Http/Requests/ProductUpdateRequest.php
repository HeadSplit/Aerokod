<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'sometimes|required|string',
            'slug' => 'sometimes|required|string|unique:products,slug,' . $this->route('id'),
            'description' => 'sometimes|string',
            'category_id' => 'sometimes|required|integer|exists:product_categories,id',
        ];
    }
}
