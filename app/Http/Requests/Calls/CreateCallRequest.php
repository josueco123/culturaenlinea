<?php

namespace App\Http\Requests\Calls;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Str;

class CreateCallRequest extends FormRequest
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
          'name' => 'required|string|max:150',
          'slug' => 'unique:calls,slug',
          'description' => 'required|string',
          'start_at' => 'required|date',
          'finish_at' => 'required|date|after:start_at',
        ];
    }
}
