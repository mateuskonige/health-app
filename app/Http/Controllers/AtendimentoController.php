<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchAtendimentoRequest;
use App\Http\Requests\StoreAtendimentoRequest;
use App\Http\Requests\UpdateAtendimentoRequest;
use App\Models\Atendimento;
use App\Models\Medico;
use App\Models\Paciente;
use App\Services\AtendimentoService;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    public function __construct(protected AtendimentoService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index(SearchAtendimentoRequest $request)
    {
        $atendimentos = $this->service->get($request->validated(), 8);
        return view('atendimentos.index', ['atendimentos' => $atendimentos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicos = Medico::pluck('nome', 'id');
        $pacientes = Paciente::pluck('nome', 'id');

        return view('atendimentos.create', [
            'medicos' => $medicos,
            'pacientes' => $pacientes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAtendimentoRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()->route('atendimentos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Atendimento $atendimento)
    {
        return view('atendimentos.show', [
            'atendimento' =>  $this->service->getById($atendimento->id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atendimento $atendimento)
    {
        $medicos = Medico::pluck('nome', 'id');
        $pacientes = Paciente::pluck('nome', 'id');

        return view('atendimentos.edit', [
            'atendimento' => $atendimento,
            'medicos' => $medicos,
            'pacientes' => $pacientes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAtendimentoRequest $request, Atendimento $atendimento)
    {
        $this->service->update($atendimento, $request->validated());

        return redirect()->route('atendimentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atendimento $atendimento)
    {
        $atendimento->delete();

        return redirect()->route('atendimentos.index');
    }
}
