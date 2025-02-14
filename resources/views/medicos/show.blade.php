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

    <div class="card card-dark card-outline mb-4">
        @include('medicos._partials.form')
    </div>


    {{-- title  --}}
    <div class="d-flex justify-content-between py-4">
        <h2>Pacientes atendidos</h2>
    </div>


    <div class="card card-dark card-outline p-4">
        @if (isset($pacientes) && $pacientes->count() > 0)
            {{-- tabela --}}
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">E-mail</th>
                            <th scope="col" class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pacientes as $paciente)
                            <tr>

                                <td>{{ $paciente->nome }}</td>
                                <td>{{ $paciente->cpf }}</td>
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
                <div class="m-auto mt-2">
                    {{ $pacientes->links() }}
                </div>
            @endif
        @else
            <div class="container text-center">
                <span class="text-muted">Nenhum paciente atendido por este médico</span>
            </div>
        @endif
    </div>
</x-layout>
