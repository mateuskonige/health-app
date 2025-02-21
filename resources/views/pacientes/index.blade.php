<x-layout>
    {{-- breadcrumb --}}
    <nav aria-label="breadcrumb" class="py-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pacientes</a></li>
        </ol>
    </nav>

    {{-- title  --}}
    <div class="d-flex justify-content-between pb-4">
        <h2>Gestão de Pacientes</h2>
        <div>
            <a href="{{ route('pacientes.create') }}" role="button" class="btn btn-primary">Adicionar</a>
        </div>
    </div>

    {{-- busca --}}
    <form action="{{ route('pacientes.index') }}">
        @csrf

        <div class="input-group mb-3">
            <input type="search" class="form-control @error('nome') is-invalid @enderror"
                value="{{ old('nome', request()->nome) ?? '' }}" name="nome" id="nome" placeholder="Pesquisar"
                aria-label="Pesquisar">

            <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
            <a href="{{ route('pacientes.index') }} "role="button" class="btn btn-outline-secondary">Limpar</a>

            @error('nome')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </form>

    {{-- tabela --}}
    <div class="card ">
        <div class="table-responsive py-1">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">E-mail</th>
                        <th scope="col" class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $paciente->nome }}</td>
                            <td>{{ $paciente->cpf }}</td>
                            <td>{{ $paciente->data_nascimento->isoFormat('D [de] MMMM [de] YYYY') }}</td>
                            <td>{{ $paciente->email }}</td>
                            <td class="text-end">
                                <div class="btn-group dropstart">
                                    <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('pacientes.show', $paciente->id) }}"
                                                class="dropdown-item">Visualizar</a>
                                        </li>
                                        <li><a href="{{ route('pacientes.edit', $paciente->id) }}"
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
        @if ($pacientes->hasPages())
            <div class="card-footer pt-4">
                {{ $pacientes->links() }}
            </div>
        @endif
    </div>
</x-layout>
