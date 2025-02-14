<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'min:3', 'max:255'],
            'crm' => ['required', 'string', 'digits:6'],
            'especialidade' => ['required', 'string', 'min:3', 'max:255'],
        ];
    }

    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'crm' => 'CRM',
            'especialidade' => 'Especialidade'
        ];
    }
}
