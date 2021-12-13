<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoctorRequest extends FormRequest
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
            'hospital_id' => 'required',
            'avatar' => 'image',
            'birth_date' => 'required',
            'salary' => 'required|numeric|min:0',
            'phone_number' => ['required','regex:/(03|09)[0-9]{8}/','size:10'],
        ];
        if($this->doctor == null){
            $rules['avatar'] = 'required|' . $rules['avatar'];
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'hospital_id.required' => 'Chọn danh mục',
            'avatar.required' => 'Ảnh không được để trống',
            'avatar.image'=> 'Ảnh không đúng định dạng',
            'birth_date.required' => 'Ngày sinh không được để trống',
            'salary.required' => 'Lương không được để trống',
            'salary.numeric' => 'Lương phải là số',
            'salary.min' => 'Tối thiểu 0 ký tự',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'phone_number.regex' => 'Số điện thoại không đúng định dạng',
            'phone_number.size' => 'Tối đa 10 ký tự'
        ];
    }
}
