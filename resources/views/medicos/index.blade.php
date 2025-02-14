<x-layout>
    {{-- breadcrumb --}}
    <nav aria-label="breadcrumb" class="py-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Médicos</a></li>
        </ol>
    </nav>

    {{-- title  --}}
    <div class="d-flex justify-content-between pb-4">
        <h2>Gestão de Médicos</h2>
        <div>
            <a href="{{ route('medicos.create') }}" role="button" class="btn btn-primary">Adicionar</a>
        </div>
    </div>

    {{-- busca --}}
    <form action="{{ route('medicos.index') }}">
        @csrf

        <div class="input-group mb-3">
            <input type="search" class="form-control @error('nome') is-invalid @enderror"
                value="{{ old('nome', request()->nome) ?? '' }}" name="nome" id="nome" placeholder="Pesquisar"
                aria-label="Pesquisar">

            <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
            <a href="{{ route('medicos.index') }} "role="button" class="btn btn-outline-secondary">Limpar</a>

            @error('nome')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </form>

    {{-- tabela --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">CRM</th>
                <th scope="col">Especialidade</th>
                <th scope="col" class="text-end">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicos as $medico)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $medico->nome }}</td>
                    <td>{{ $medico->crm }}</td>
                    <td>{{ $medico->especialidade }}</td>
                    <td class="text-end">


                        <div class="btn-group dropstart">
                            <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('medicos.show', $medico->id) }}"
                                        class="dropdown-item">Visualizar</a>
                                </li>
                                <li><a href="{{ route('medicos.edit', $medico->id) }}" class="dropdown-item">Editar</a>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- paginate --}}
    @if ($medicos->hasPages())
        <div class="m-auto mt-2">
            {{ $medicos->links() }}
        </div>
    @endif
</x-layout>
