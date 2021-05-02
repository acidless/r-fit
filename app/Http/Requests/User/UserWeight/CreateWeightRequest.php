<?php

namespace App\Http\Requests\User\UserWeight;

use Illuminate\Foundation\Http\FormRequest;

class CreateWeightRequest extends FormRequest
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
            "amount" => "required|numeric|min:3|max:500",
        ];
    }
}
