<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            //
            'name_cate' => 'required|min:10|unique:categories',
            'des_cate'  => 'required|min:20|max:1000'
        ];
    }
    public function messages(){
        return [
            'required' => ":attribute  không được để trống",
            'min' => ":attribute  tối thiểu 10 ký tự.",
            'required' => ":attribute  không được để trống",
            'min' => ":attribute  tối thiểu 20 ký tự.",
            'max' => ":attribute  tối đa 1000 ký tự.",
            'unique' => ":attribute  đã tồn tại"
        ];
    }
    public function attributes(){
        return [
            'name_cate' => 'Tên thể loại',
            'des_cate' => "Mô tả",
        ];
    }
    //sau khi validate
    protected function withValidator($validator){
        // $validator -> after(function($validator){

        // });
    }
    // trước khi validate
    protected function prepareForValidation()
    {
            // $this->merge([
            //     'slug' => Str::slug($this->slug),
            // ]);
    }
}
