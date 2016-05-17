<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BookRequest extends Request
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
            'p_date'=>'numeric|required',
            'title'=>'max:50|required|unique:items',
            'author'=>'max:50|required',
            'language'=>'min:5|max:15|required',
            'genre'=>'min:4|max:12|required'
            
        ];
    }

    public function response(array $errors){
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
