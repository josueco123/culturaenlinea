<?php

namespace App\Http\Requests\LinesAction;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLineActionRequest extends FormRequest
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
          'name' => 'required|string|max:40|unique:lines_action,name, ' . $this->id,
          'description' => 'required|string|max:120',
        ];
    }
}
