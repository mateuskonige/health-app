<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    /** @use HasFactory<\Database\Factories\PacienteFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'email',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'atendimentos', 'paciente_id', 'medico_id');
    }

    public function scopeFilter($query, $request)
    {
        if (!$request) return;

        return $query
            ->when(data_get($request, 'nome'), function ($query, $nome) {
                return $query->where('nome', 'like', '%' . $nome . '%');
            });
    }
}
