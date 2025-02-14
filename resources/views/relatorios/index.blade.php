<x-layout>
    {{-- breadcrumb --}}
    <nav aria-label="breadcrumb" class="py-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Relatórios</a></li>
        </ol>
    </nav>

    {{-- title  --}}
    <div class="d-flex justify-content-between pb-4">
        <h2>Relatórios</h2>
    </div>

    {{-- busca --}}
    <form action="{{ route('relatorios.index') }}">
        @csrf

        <div class="input-group mb-3">


            <select name="medico_id" class="form-control @error('medico_id') is-invalid @enderror">
                <option value="">Selecione um médico</option>
                @foreach ($medicos as $key => $value)
                    <option value="{{ $key }}"
                        {{ old('medico_id', request()->medico_id ?? '') == $key ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>



            <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
            <a href="{{ route('relatorios.index') }} "role="button" class="btn btn-outline-secondary">Limpar</a>

            @error('medico_id')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror

        </div>

    </form>

    {{-- tabela --}}
    @if (request()->medico_id)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Data do atendimento</th>
                        <th scope="col">Médico</th>
                        <th scope="col">Atendimento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($atendimentos as $atendimento)
                        <tr>
                            <td>{{ $atendimento->id }}</td>
                            <td>{{ $atendimento->data_atendimento->isoFormat('D [de] MMMM [de] YYYY, HH\:mm') }}</td>
                            <td>{{ $atendimento->medico->nome }}</td>
                            <td>{{ $atendimento->paciente->nome }}</td>

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
    @else
        <div class="container text-center">
            <span class="text-muted">Nenhum médico selecionado</span>
        </div>
    @endif
</x-layout>
