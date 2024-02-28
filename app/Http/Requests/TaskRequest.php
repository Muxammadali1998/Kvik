<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required','string', 'max:255'],
            'description' => ['required','text'],
            'image' => ['required','file'],
            'status' => ['required','string','max:255'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
