<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class OtherRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'min:5|max:20|required',
            'description'=>'min:5|max:50|required'
        ];
    }
    
    public function response(array $errors)
    {
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
