<x-layout>
    {{-- breadcrumb --}}
    <nav aria-label="breadcrumb" class="py-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item "><a href="{{ route('pacientes.index') }}">Pacientes</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Adicionar</a></li>
        </ol>
    </nav>

    {{-- title  --}}
    <div class="d-flex justify-content-between pb-4">
        <h2>Adicionar novo paciente</h2>

    </div>

    <div class="card">
        <form action="{{ route('pacientes.store') }}" class="form" method="POST">
            @csrf

            @include('pacientes._partials.form')
        </form>
    </div>
</x-layout>
