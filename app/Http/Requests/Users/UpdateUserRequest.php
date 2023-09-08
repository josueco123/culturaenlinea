<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

use App\Role;
use App\Permission;

class UpdateUserRequest extends FormRequest
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
        $roles = Role::pluck('id')->toArray();
        $permissions = Permission::pluck('id')->toArray();

        return [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email, ' . $this->id,
        'roles' => 'required|array|in:' . implode(',', $roles),
        'permissions' => 'array|in:' . implode(',', $permissions)
      ];
    }
}
