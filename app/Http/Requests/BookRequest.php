<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class BookRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'p_date'=>'numeric|required',
            'title'=>'max:50|required|unique:items',
            'author'=>'max:50|required',
            'language'=>'min:5|max:15|required',
            'genre'=>'min:4|max:12|required'
            
        ];
    }

    public function response(array $errors)
    {
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
