<x-layout>
    {{-- breadcrumb --}}
    <nav aria-label="breadcrumb" class="py-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item "><a href="{{ route('atendimentos.index') }}">Atendimentos</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Editar</a></li>
        </ol>
    </nav>

    {{-- title  --}}
    <div class="d-flex justify-content-between pb-4">
        <h2>Editar atendimento {{ $atendimento->nome }}</h2>

    </div>

    <div class="card card-dark card-outline">
        <form id="form_id" action="{{ route('atendimentos.update', $atendimento->id) }}" method="post">
            @csrf
            @method('PUT')

            @include('atendimentos._partials.form')
        </form>
    </div>
</x-layout>
