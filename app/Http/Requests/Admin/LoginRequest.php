<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|min:15',
            'password' => 'required',
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được để trống.',
            'min'       => ':attribute phải lớn hơn :min ký tự.',
        ];
    }
    public function attributes(){
        return [
            'email' => 'Email',
            'password' => "Password",
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
