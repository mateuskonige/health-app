<x-layout>
    {{-- breadcrumb --}}
    <nav aria-label="breadcrumb" class="py-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item "><a href="{{ route('medicos.index') }}">Médicos</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Detalhes</a></li>
        </ol>
    </nav>

    {{-- title  --}}
    <div class="d-flex justify-content-between pb-4">
        <h2>Detalhes do médico {{ $medico->nome }}</h2>

    </div>

    <div class="card card-dark card-outline">


        @include('medicos._partials.form')

    </div>
</x-layout>
