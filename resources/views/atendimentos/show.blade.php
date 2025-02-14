<x-layout>
    {{-- breadcrumb --}}
    <nav aria-label="breadcrumb" class="py-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item "><a href="{{ route('atendimentos.index') }}">Atendimentos</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Detalhes</a></li>
        </ol>
    </nav>

    {{-- title  --}}
    <div class="d-flex justify-content-between pb-4">
        <h2>Detalhes do atendimento {{ $atendimento->nome }}</h2>

    </div>

    <div class="card card-dark card-outline">
        @include('atendimentos._partials.form')
    </div>
</x-layout>
