<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchMedicoRequest;
use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use App\Models\Medico;
use App\Services\MedicoService;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function __construct(protected MedicoService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index(SearchMedicoRequest $request)
    {
        $medicos = $this->service->get($request->validated(), 8);
        return view('medicos.index', ['medicos' => $medicos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicoRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()->route('medicos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medico $medico)
    {
        return view('medicos.show', [
            'medico' => $medico
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medico $medico)
    {
        return view('medicos.edit', [
            'medico' => $medico
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicoRequest $request, Medico $medico)
    {
        $this->service->update($medico, $request->validated());

        return redirect()->route('medicos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medico $medico)
    {
        $medico->delete();

        return redirect()->route('medicos.index');
    }
}
