<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required','string', 'max:255'],
            'description' => ['nullable'],
            'image' => ['nullable','file'],
            'status' => ['required','string','max:255'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
