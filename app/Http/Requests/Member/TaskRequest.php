<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'limid' => 'required|date',
            'situation' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'フォルダ名',
            'limid' => 'タスク期限',
            'situation' => '状況',
        ];
    }

    public function messages()
    {
        return [];
    }
}
