<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required|min:4|max:255|required',
            'inshop_count'=> 'required|numeric',
            'price'=> 'required|numeric', 
        ];
        if($this->route()->named('products.store')){
        $rules['code'] =  '|unique:products,code';
        }  
       
        return  $rules;
    }

    public function messages(){
        return[
            'code.unique' =>'Товар с данным кодом уже существует! .',
            'code.required' =>'Код товара обязателен к заполнению',
            'code.min'=> 'Код товара должен содержать более 4 символов',
            'code.max'=> 'Код товара должен содержать не более 70 символов',
            'name.required' =>'Наименование  товара обязателено к заполнению',
            'name.min'=> 'Наименование  товара должно содержать более 4 символов',
            'name.max'=> 'Наименование  товара  не должно привышать  255 символов',
             'inshop_count.numeric'=> 'Колличество должно быть числом',
             'price.numeric'=> 'Цена должна быть числом',
        ];
    }
}
