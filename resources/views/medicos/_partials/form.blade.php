<div class="card-body">
    <small><b class="text-danger">*</b> Campo obrigatório</small>

    <div class="row">
        <div class="form-group col-md-4 mt-2 mb-2">
            <label for="nome" class="@error('nome') text-danger @enderror">Nome do médico: <abbr
                    title="campo obrigatório" class="text-danger">*</abbr></label>
            <input autofocus type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                placeholder="ex.: John Doe" value="{{ old('nome', $medico->nome ?? '') }}"
                @if (\Request::route()->getName() == 'medicos.show') disabled @endif>
            @error('nome')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>


        <div class="form-group col-md-4 mt-2 mb-2">
            <label for="crm" class="@error('crm') text-danger @enderror">CRM do médico: <abbr
                    title="campo obrigatório" class="text-danger">*</abbr></label>
            <input autofocus type="text" name="crm" class="form-control @error('crm') is-invalid @enderror"
                placeholder="ex.: 123456" value="{{ old('crm', $medico->crm ?? '') }}"
                @if (\Request::route()->getName() == 'medicos.show') disabled @endif>
            @error('crm')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group col-md-4 mt-2 mb-2">
            <label for="especialidade" class="@error('especialidade') text-danger @enderror">Especialidade do médico:
                <abbr title="campo obrigatório" class="text-danger">*</abbr></label>
            <input autofocus type="text" name="especialidade"
                class="form-control @error('especialidade') is-invalid @enderror" placeholder="ex.: Pediatra"
                value="{{ old('especialidade', $medico->especialidade ?? '') }}"
                @if (\Request::route()->getName() == 'medicos.show') disabled @endif>
            @error('especialidade')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('medicos.index') }}" type="button" class="btn btn-outline-secondary"><i
            class="fa fa-arrow-left"></i> Voltar</a>
    @if (\Request::route()->getName() != 'medicos.show')
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
    @else
        <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST"
            onsubmit="return confirm ('Deseja realmente deletar? Esta ação será irreversível.')">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i> Deletar
                {{ $medico->name }}</button>
        </form>
    @endif
</div>
