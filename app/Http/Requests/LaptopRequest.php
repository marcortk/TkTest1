<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class LaptopRequest extends Request
{
    public function authorize()
    {
        return true;
    }

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
    
    public function response(array $errors)
    {
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
