<?php

use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RelatorioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('medicos', MedicoController::class);
Route::resource('pacientes', PacienteController::class);
Route::resource('atendimentos', AtendimentoController::class);

Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');
