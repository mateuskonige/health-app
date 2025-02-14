<div class="card-body">
    <small><b class="text-danger">*</b> Campo obrigatório</small>

    <div class="row">
        <div class="form-group col-md-6 mt-2 mb-2">
            <label for="nome" class="@error('nome') text-danger @enderror">Nome do paciente: <abbr
                    title="campo obrigatório" class="text-danger">*</abbr></label>
            <input autofocus type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                placeholder="ex.: John Doe" value="{{ old('nome', $paciente->nome ?? '') }}"
                @if (\Request::route()->getName() == 'pacientes.show') disabled @endif>
            @error('nome')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>


        <div class="form-group col-md-6 mt-2 mb-2">
            <label for="cpf" class="@error('cpf') text-danger @enderror">CPF do paciente: <abbr
                    title="campo obrigatório" class="text-danger">*</abbr></label>
            <input autofocus type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror"
                placeholder="ex.: 123456" value="{{ old('cpf', $paciente->cpf ?? '') }}"
                @if (\Request::route()->getName() == 'pacientes.show') disabled @endif>
            @error('cpf')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6 mt-2 mb-2">
            <label for="data_nascimento" class="@error('data_nascimento') text-danger @enderror">Data de nascimento do
                paciente:
                <abbr title="campo obrigatório" class="text-danger">*</abbr>
            </label>
            <input autofocus type="date" name="data_nascimento"
                class="form-control @error('data_nascimento') is-invalid @enderror" placeholder="ex.: Pediatra"
                value="{{ old('data_nascimento', isset($paciente) ? \Carbon\Carbon::parse($paciente->data_nascimento)->format('Y-m-d') : '') }}"
                @if (\Request::route()->getName() == 'pacientes.show') disabled @endif>
            @error('data_nascimento')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-md-6 mt-2 mb-2">
            <label for="email" class="@error('email') text-danger @enderror">E-mail do paciente:
                <abbr title="campo obrigatório" class="text-danger">*</abbr></label>
            <input autofocus type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="ex.: Pediatra" value="{{ old('email', $paciente->email ?? '') }}"
                @if (\Request::route()->getName() == 'pacientes.show') disabled @endif>
            @error('email')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

<div class="card-footer d-flex justify-content-between">
    <a href="{{ route('pacientes.index') }}" type="button" class="btn btn-outline-secondary"><i
            class="fa fa-arrow-left"></i> Voltar</a>
    @if (\Request::route()->getName() != 'pacientes.show')
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
    @else
        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST"
            onsubmit="return confirm ('Deseja realmente deletar? Esta ação será irreversível.')">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i> Deletar
                {{ $paciente->name }}</button>
        </form>
    @endif
</div>
