<x-layout>
    {{-- breadcrumb --}}
    <nav aria-label="breadcrumb" class="py-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Atendimentos</a></li>
        </ol>
    </nav>

    {{-- title  --}}
    <div class="d-flex justify-content-between pb-4">
        <h2>Gestão de Atendimentos</h2>
        <div>
            <a href="{{ route('atendimentos.create') }}" role="button" class="btn btn-primary">Adicionar</a>
        </div>
    </div>

    {{-- busca --}}
    <form action="{{ route('atendimentos.index') }}">
        @csrf

        <div class="input-group mb-3">
            <input type="search" class="form-control @error('nome') is-invalid @enderror"
                value="{{ old('nome', request()->nome) ?? '' }}" name="nome" id="nome" placeholder="Pesquisar"
                aria-label="Pesquisar">

            <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
            <a href="{{ route('atendimentos.index') }} "role="button" class="btn btn-outline-secondary">Limpar</a>

            @error('nome')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </form>

    {{-- tabela --}}
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data do atendimento</th>
                    <th scope="col">Médico</th>
                    <th scope="col">Atendimento</th>
                    <th scope="col" class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($atendimentos as $atendimento)
                    <tr>
                        <td>{{ $atendimento->id }}</td>
                        <td>{{ $atendimento->data_atendimento->isoFormat('D [de] MMMM [de] YYYY, HH\:mm') }}</td>
                        <td>{{ $atendimento->medico->nome }}</td>
                        <td>{{ $atendimento->paciente->nome }}</td>
                        <td class="text-end">
                            <div class="btn-group dropstart">
                                <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('atendimentos.show', $atendimento->id) }}"
                                            class="dropdown-item">Visualizar</a>
                                    </li>
                                    <li><a href="{{ route('atendimentos.edit', $atendimento->id) }}"
                                            class="dropdown-item">Editar</a>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- paginate --}}
    @if ($atendimentos->hasPages())
        <div class="m-auto mt-2">
            {{ $atendimentos->links() }}
        </div>
    @endif
</x-layout>
