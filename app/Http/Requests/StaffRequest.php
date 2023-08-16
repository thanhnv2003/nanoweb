<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($currentAction):
                    case 'add':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|unique:staffs',
                            'tel' => 'required|numeric'
                        ];
                        break;
                    case 'edit':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required',
                            'tel' => 'required'
                        ];
                        break;
                    default:
                        break;
                endswitch;
        endswitch;
        return $rules;
    }
}
