<?php

namespace App\Http\Requests\Roles;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Str;

use App\Permission;

class CreateRoleRequest extends FormRequest
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
        $permissions = Permission::pluck('id')->toArray();

        return [
        'name' => 'required|string',
        'slug' => 'unique:roles,slug',
        'permissions' => 'required|array|in:' . implode(',', $permissions)
      ];
    }
}
