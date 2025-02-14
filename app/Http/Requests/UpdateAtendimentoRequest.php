<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAtendimentoRequest extends FormRequest
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
            'data_atendimento' => ['required', 'date', 'before_or_equal:now'],
            'medico_id' => ['required', 'exists:medicos,id'],
            'paciente_id' => ['required', 'exists:pacientes,id'],
        ];
    }

    public function messages()
    {
        return [
            'data_atendimento.before_or_equal' => 'O campo Data do Atendimento não pode ser no futuro.',
        ];
    }

    public function attributes()
    {
        return [
            'data_atendimento' => 'Data do Atendimento',
            'medico_id' => 'Médico',
            'paciente_id' => 'Paciente',
        ];
    }
}
