<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
         
        $arr = explode('@', $this->route()->getActionName());
        $method = $arr[1];  // The controller method
    
       
        switch ($method) {
            case 'storeCategory':
                return [
                    // 'title' => 'required|unique:posts|max:255',
                    'title' => 'required',
                    'subtitle' => 'max:80',
                    // 'show' => 'required',
                    // 'image' => 'required',
                    // 'keyWords' => 'required',
                ];
                break;
                
            case 'updateCategory':
                return [
                    // 'title' => 'required|unique:posts|max:255',
                    'title' => 'required',
                    'subtitle' => 'max:80',
                    // 'show' => 'required',
                    // 'image' => 'required',
                    // 'keyWords' => 'required',
                ];
                break;
         }
    }
   
    public function messages()
    {
        return [
            'detals.max' => 'وصف التصنيف يجب لا يتجاوز 80  حرف',
            'name.required' => 'يجب ادخال اسم التصنيف',
            'image.required' => 'يجب تحميل الصورة',
        ];
    }
}
