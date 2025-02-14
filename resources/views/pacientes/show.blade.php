<x-layout>
    {{-- breadcrumb --}}
    <nav aria-label="breadcrumb" class="py-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item "><a href="{{ route('pacientes.index') }}">Pacientes</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Detalhes</a></li>
        </ol>
    </nav>

    {{-- title  --}}
    <div class="d-flex justify-content-between pb-4">
        <h2>Detalhes do paciente {{ $paciente->nome }}</h2>

    </div>

    <div class="card card-dark card-outline">
        @include('pacientes._partials.form')
    </div>
</x-layout>
