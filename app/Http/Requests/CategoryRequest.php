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
      $rules = [
            'code'=>'required|min:4|max:70|required',
            'name'=>'required|min:4|max:150|',
        ];
        if($this->route()->named('categories.store')){
        $rules['code'] =   '|unique:categories,code';
        }  
       
        return  $rules;
    }
    public function messages(){
        return[
            'code.unique' =>'Категория с данным кодом  уже существует.',
            'code.required' =>'Код товара обязателен к заполнению',
            'code.min'=> 'Код товара должен содержать более 4 символов',
            'code.max'=> 'Код товара должен содержать не более 150 символов',
            'name.required' =>'Наименование категории товара обязателено к заполнению',
            'name.min'=> 'Наименование категории товара должно содержать более 4 символов',
            'name.max'=> 'Наименование категории товара  не должно привышать  150 символов',
        ];
    }
}
