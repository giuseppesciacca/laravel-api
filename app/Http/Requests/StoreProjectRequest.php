<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'type_id' => 'exists:types,id',
            'user_id' => 'exists:users,id',
            'title' => 'required|max:100|unique:projects',
            'img_path' => 'nullable',
            'description' => 'nullable',
            'tecnologies' => ['exists:tecnologies,id'],
            'github_repo' => 'required|unique:projects',
            'project_link' => 'nullable'
        ];
    }
}
