<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atendimento extends Model
{
    /** @use HasFactory<\Database\Factories\AtendimentoFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'data_atendimento',
        'medico_id',
        'paciente_id'
    ];

    protected $casts = [
        'data_atendimento' => 'datetime'
    ];

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function scopeFilter($query, $request)
    {
        if (!$request) return;

        return $query
            ->when(data_get($request, 'nome'), function ($query, $nome) {
                return $query->whereRelation('medico', 'nome', 'like', '%' . $nome . '%');
            });
    }
}
