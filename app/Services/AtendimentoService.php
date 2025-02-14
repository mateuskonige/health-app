<?php

namespace App\Services;

use App\Models\Atendimento;
use DateTime;

class AtendimentoService
{
    public function get($request, $perPage)
    {
        return Atendimento::filter($request)
            ->with('medico', 'paciente')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function create(array $data)
    {
        return Atendimento::create($data);
    }

    public function getById(string $id)
    {
        return  Atendimento::where('id', $id)->with('paciente', 'medico')->firstOrFail();
    }

    public function update(Atendimento $atendimento, array $data)
    {
        return $atendimento->update($data);
    }

    public function destroy(Atendimento $atendimento)
    {
        $atendimento->delete();

        return response()->json(['message' => 'Atendimento deleted successfully.'], 204);
    }
}
