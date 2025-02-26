<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryUpdateRequest extends FormRequest
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
<<<<<<< HEAD
            title' => 'required|string',
=======
            'title' => 'sometimes|string',
>>>>>>> 2efcbdb (ProductController дописан, ProductCategoryController пофикшен, PublicController теперь соответствует TODO, ProductCategoryUpdateRequest дописан, Все ресурсы были изменены, теперь возвращает все, как нужно, из модели ProductCategory убрал лишний метод, остальные были подвергнуты малозначительным изменениям, модель Product теперь полностью функционирует, у обеих моделей убран timestamps, sead)
            'parent_id' => 'sometimes|nullable|integer|exists:product_categories,id|not_in:'. $this->route('id'),
        ];
    }
}
