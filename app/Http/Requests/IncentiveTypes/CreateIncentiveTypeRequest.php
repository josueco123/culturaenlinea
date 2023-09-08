<?php

namespace App\Http\Requests\IncentiveTypes;

use Illuminate\Foundation\Http\FormRequest;

class CreateIncentiveTypeRequest extends FormRequest
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
          'name' => 'required|string|max:200|unique:incentive_types,name',
          'description' => 'required|string',
        ];
    }
}
