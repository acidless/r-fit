<?php

namespace App\Http\Requests\User;

class CreateUserRequest extends LoginUserRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules["email"] .= "|unique:users";
        $rules["password"] .= "|confirmed";

        return $rules;
    }
}
