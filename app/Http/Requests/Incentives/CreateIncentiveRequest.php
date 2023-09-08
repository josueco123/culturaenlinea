<?php

namespace App\Http\Requests\Incentives;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Str;

use App\Area;
use App\Incentive_type;
use App\Line_action;
use App\User_type;

class CreateIncentiveRequest extends FormRequest
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
        $areas = Area::pluck('id')->toArray();
        $incentive_types = Incentive_type::pluck('id')->toArray();
        $lines_action = Line_action::pluck('id')->toArray();
        $user_types = User_type::pluck('id')->toArray();

        return [
          'area' => 'required|in:' . implode(',', $areas),
          'incentive_type' => 'required|in:' . implode(',', $incentive_types),
          'line_action' => 'required|in:' . implode(',', $lines_action),
          'name' => 'required|string',
          'slug' => 'unique:incentives,slug',
          'description' => 'required|string',
          'user_types' => 'required|array|in:' . implode(',', $user_types)
        ];
    }
}
