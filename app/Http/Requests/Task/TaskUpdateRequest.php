<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['string', 'max:255'],
            'description' => ['nullable'],
            'image' => ['nullable','file'],
            'status' => ['string','max:255'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
