<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRelatorioRequest;
use App\Models\Atendimento;
use App\Models\Medico;
use App\Services\AtendimentoService;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function __construct(protected AtendimentoService $atendimentoService) {}

    public function index(SearchRelatorioRequest $request)
    {
        $data = $this->atendimentoService->getRelatorio($request, 8);

        return view('relatorios.index', $data);
    }
}
