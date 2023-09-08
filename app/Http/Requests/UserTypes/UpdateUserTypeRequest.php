<?php

namespace App\Http\Requests\UserTypes;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Str;

class UpdateUserTypeRequest extends FormRequest
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

    protected function getValidatorInstance()
    {
        $data = $this->all();
        $data['slug'] = Str::slug($data['name'], '-');
        $this->getInputSource()->replace($data);
        return parent::getValidatorInstance();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required|string|max:40',
          'slug' => 'unique:user_types,slug, ' . $this->id,
          'description' => 'required|string|max:120',
        ];
    }
}
