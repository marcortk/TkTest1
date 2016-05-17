<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LaptopRequest extends Request
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
            'ram'=>'numeric|required',
            'model'=>'min:5|max:20|required',
            'trademark'=>'max:20|required',
            'price'=>'numeric|required',
            'capacity'=>'numeric|required'
        ];
    }
    public function response(array $errors){
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
