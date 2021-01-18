<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisingRequest extends FormRequest
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
   
            'name'=>'required|min:3|max:255|required',
            'owner' =>'required|min:3|max:255|required',

          
        ];
        
        return $rules;
    }

    public function messages(){
        return[
      
            'name.min'=> 'Имя рекламы должно содержать более 4 символов',
            'name.max'=> 'Имя рекламы должно не более 150 символов',
            'name.required' =>'Имя рекламы обязателено к заполнению',
            'owner.min'=> 'Имя владельца рекламы должно содержать более 4 символов',
            'owner.max'=> 'Имя владельца рекламы должно не более 150 символов',
            'owner.required' =>'Имя владельца рекламы обязателено к заполнению',
        ];
    }
}
