<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Health</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <a class="nav-link px-2 text-white" href="{{ route('relatorios.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-activity" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2" />
                    </svg>
                    <span class="fw-bold">Health</span>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('atendimentos.index') }}" class="btn btn-dark">Atendimentos</a>
                    </li>
                    <li><a href="{{ route('medicos.index') }}" class="btn btn-dark">Médicos</a></li>
                    <li><a href="{{ route('pacientes.index') }}" class="btn btn-dark">Pacientes</a></li>
                </ul>
            </div>
        </div>
    </header>

    <main role="main" class="container mb-3">
        {{ $slot }}
    </main>
</body>

</html>
