<?php

namespace App\Services;

use App\Models\Medico;

class MedicoService
{
    public function get($request, $perPage)
    {
        return Medico::filter($request)->paginate($perPage);
    }

    public function create(array $data)
    {
        return Medico::create($data);
    }

    public function getById(string $id)
    {
        return Medico::where('id', $id)->firstOrFail();
    }

    public function update(Medico $medico, array $data)
    {
        return $medico->update($data);
    }

    public function destroy(Medico $medico)
    {
        $medico->delete();

        return response()->json(['message' => 'Medico deleted successfully.'], 204);
    }
}
