<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HospitalRequest extends FormRequest
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
        $rules = [
            'name' => ['required'], 
            'logo' => 'image',
            'founding_year' => 'required|integer|min:1800|max:2022',
            'address' => 'required|max:255'
        ];
        if($this->hospital == null){
            $rules['logo'] = 'require|' . $rules['logo'];
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại',
            'logo.required' => 'Ảnh không được để trống',
            'logo.image'=> 'Ảnh không đúng định dạng',
            'founding_year.required' => 'Năm không được để trống',
            'founding_year.integer' => 'Năm phải là số nguyên',
            'founding_year.min' => 'Thời gian phải lớn hơn năm 1800',
            'founding_year.max' => 'Thời gian phải nhỏ hơn năm 2022',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Tối đa 255 ký tự'
        ];
    }
}
