<div class="card-body">
    <small><b class="text-danger">*</b> Campo obrigatório</small>

    <div class="row">
        <div class="form-group col-md-6 mt-2 mb-2">
            <label for="data_atendimento" class="@error('data_atendimento') text-danger @enderror">Data do
                atendimento:
                <abbr title="campo obrigatório" class="text-danger">*</abbr>
            </label>
            <input autofocus type="datetime-local" name="data_atendimento"
                class="form-control @error('data_atendimento') is-invalid @enderror" placeholder="ex.: Pediatra"
                value="{{ old('data_atendimento', isset($atendimento) ? \Carbon\Carbon::parse($atendimento->data_atendimento)->format('Y-m-d\TH:i') : '') }}"
                @if (\Request::route()->getName() == 'atendimentos.show') disabled @endif>
            @error('data_atendimento')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6 mt-2 mb-2">
            <label for="medico_id" class="@error('medico_id') text-danger @enderror">Médico responsável: <abbr
                    title="campo obrigatório" class="text-danger">*</abbr></label>
            @if (isset($medicos))
                <select name="medico_id" class="form-control @error('medico_id') is-invalid @enderror"
                    @if (\Request::route()->getName() == 'atendimentos.show') disabled @endif>
                    <option value="">Selecione um médico</option>
                    @foreach ($medicos as $key => $value)
                        <option value="{{ $key }}"
                            {{ old('medico_id', $atendimento->medico_id ?? '') == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            @else
                <input autofocus type="text" name="medico" class="form-control"
                    value="{{ $atendimento->medico->nome }}" disabled>
            @endif
            @error('medico_id')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group col-md-6 mt-2 mb-2">
            <label for="paciente_id" class="@error('paciente_id') text-danger @enderror">Paciente atendido: <abbr
                    title="campo obrigatório" class="text-danger">*</abbr></label>
            @if (isset($pacientes))
                <select name="paciente_id" class="form-control @error('paciente_id') is-invalid @enderror"
                    @if (\Request::route()->getName() == 'atendimentos.show') disabled @endif>
                    <option value="">Selecione um paciente</option>
                    @foreach ($pacientes as $key => $value)
                        <option value="{{ $key }}"
                            {{ old('paciente_id', $atendimento->paciente_id ?? '') == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            @else
                <input autofocus type="text" name="paciente" class="form-control"
                    value="{{ $atendimento->paciente->nome }}" disabled>
            @endif
        </div>
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('atendimentos.index') }}" type="button" class="btn btn-outline-secondary"><i
            class="fa fa-arrow-left"></i> Voltar</a>
    @if (\Request::route()->getName() != 'atendimentos.show')
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
    @else
        <form action="{{ route('atendimentos.destroy', $atendimento->id) }}" method="POST"
            onsubmit="return confirm ('Deseja realmente deletar? Esta ação será irreversível.')">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i> Deletar
                {{ $atendimento->name }}</button>
        </form>
    @endif
</div>
