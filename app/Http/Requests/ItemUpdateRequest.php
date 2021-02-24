<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            // 'title' => 'required|unique:posts|max:255',
            'titel' => 'required',
            'name' => 'required',
            // 'price' => 'required',
            'detals' => 'max:80',

        ];
    }
    public function messages()
    {
        return [
            'titel.required' => 'يجب اختيار تصنيف المنتج',
            'detals.max' => 'وصف المنتج يجب لا يتجاوز 80  حرف',
            'show.required' => 'تحديد حالة المنتج',
            // 'image.required' => 'يجب تحميل الصورة',
            'keyWords.required' => 'يجب اضافة الكلمات المفتاحية',
        ];
    }
}
