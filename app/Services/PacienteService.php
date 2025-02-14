<?php

namespace App\Services;

use App\Models\Paciente;
use DateTime;

class PacienteService
{
    public function get($request, $perPage)
    {
        return Paciente::filter($request)->paginate($perPage);
    }

    public function create(array $data)
    {
        return Paciente::create($data);
    }

    public function getById(string $id)
    {
        return  Paciente::where('id', $id)->firstOrFail();
    }

    public function update(Paciente $paciente, array $data)
    {
        return $paciente->update($data);
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return response()->json(['message' => 'Paciente deleted successfully.'], 204);
    }
}
