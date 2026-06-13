<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrar - ApexEdu</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="h-screen overflow-hidden bg-[#fbfbff] font-sans text-slate-950">

    <main class="flex h-screen flex-col items-center justify-center px-4 py-4">

        <div class="grid h-[590px] w-full max-w-5xl overflow-hidden rounded-[1.7rem] border border-slate-200 bg-white shadow-xl shadow-slate-200/70 lg:grid-cols-2">

            <!-- Lado esquerdo -->
            <section class="relative hidden overflow-hidden bg-gradient-to-br from-white via-violet-50 to-white px-12 py-10 lg:block">

                <div class="absolute left-8 top-16 h-56 w-56 rounded-full bg-violet-100 blur-3xl"></div>
                <div class="absolute bottom-4 right-8 h-56 w-56 rounded-full bg-purple-100 blur-3xl"></div>

                <div class="relative z-10">
                    <a href="/" class="flex items-center gap-3">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-violet-600 text-white shadow-lg shadow-violet-200">
                            <i class="fa-solid fa-graduation-cap text-sm"></i>
                        </div>

                        <span class="text-lg font-extrabold">
                            ApexEdu
                        </span>
                    </a>

                    <div class="mt-5">
                        <h1 class="max-w-sm text-3xl font-extrabold leading-tight tracking-tight text-slate-950">
                            Organize seus estudos com clareza
                        </h1>

                        <p class="mt-4 max-w-sm text-sm leading-6 text-slate-500">
                            Planeje, acompanhe e evolua em cada etapa da sua jornada de aprendizado.
                        </p>
                    </div>

                    <div class="relative mt-5 ml-12 w-[285px] rounded-2xl border border-slate-100 bg-white p-5 shadow-xl shadow-slate-200/80">
                        <p class="text-sm font-bold text-slate-900">
                            Progresso geral
                        </p>

                        <div class="mt-4 flex items-center gap-5">
                            <div class="relative flex h-20 w-20 items-center justify-center rounded-full border-[7px] border-slate-100">
                                <div class="absolute inset-[-7px] rounded-full border-[7px] border-green-500 border-b-transparent border-r-transparent"></div>

                                <div class="text-center">
                                    <p class="text-xl font-extrabold">68%</p>
                                    <p class="text-[11px] text-slate-500">Concluído</p>
                                </div>
                            </div>

                            <svg viewBox="0 0 220 90" class="h-20 flex-1">
                                <path d="M5 70 C 30 45, 45 62, 65 38 S 100 65, 120 38 S 150 57, 170 25 S 195 45, 215 10"
                                      fill="none"
                                      stroke="#22c55e"
                                      stroke-width="6"
                                      stroke-linecap="round"/>
                                <path d="M5 70 C 30 45, 45 62, 65 38 S 100 65, 120 38 S 150 57, 170 25 S 195 45, 215 10 L215 90 L5 90 Z"
                                      fill="#dcfce7"
                                      opacity="0.8"/>
                            </svg>
                        </div>
                    </div>

                    <div class="absolute left-0 top-[260px] flex h-11 w-11 items-center justify-center rounded-xl bg-violet-100 text-violet-600 shadow-lg shadow-violet-100">
                        <i class="fa-solid fa-chart-column text-lg"></i>
                    </div>

                    <div class="absolute right-8 top-[285px] flex h-11 w-11 items-center justify-center rounded-xl bg-green-100 text-green-600 shadow-lg shadow-green-100">
                        <i class="fa-solid fa-shield-halved text-lg"></i>
                    </div>

                    <div class="relative -mt-2 ml-8 w-[345px] rounded-2xl border border-slate-100 bg-white p-4 shadow-xl shadow-slate-200/90">
                        <h3 class="mb-3 text-sm font-bold text-slate-900">
                            Tarefas
                        </h3>

                        <div class="space-y-2">
                            <div class="flex items-center justify-between rounded-xl border border-slate-100 px-3 py-2">
                                <div class="flex items-center gap-2">
                                    <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-green-100 text-green-600">
                                        <i class="fa-solid fa-check text-xs"></i>
                                    </span>
                                    <p class="text-xs font-semibold">Identificar sujeito e predicado</p>
                                </div>

                                <span class="rounded-lg bg-green-100 px-2 py-1 text-[10px] font-bold text-green-600">
                                    Concluída
                                </span>
                            </div>

                            <div class="flex items-center justify-between rounded-xl border border-slate-100 px-3 py-2">
                                <div class="flex items-center gap-2">
                                    <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                                        <i class="fa-solid fa-pen text-xs"></i>
                                    </span>
                                    <p class="text-xs font-semibold">Classificar orações</p>
                                </div>

                                <span class="rounded-lg bg-blue-100 px-2 py-1 text-[10px] font-bold text-blue-600">
                                    Em progresso
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex w-[360px] items-center gap-4 rounded-2xl bg-violet-100/70 px-5 py-4 text-violet-700">
                        <i class="fa-regular fa-star text-2xl"></i>

                        <p class="text-sm font-medium leading-6 text-slate-600">
                            Tudo o que você precisa para estudar melhor, em um só lugar.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Lado direito -->
            <section class="flex items-center justify-center px-8 py-8 lg:px-12">
                <div class="w-full max-w-sm">

                    <div class="mb-8 lg:hidden">
                        <a href="/" class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-600 text-white">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>

                            <span class="text-xl font-extrabold">
                                ApexEdu
                            </span>
                        </a>
                    </div>

                    <h2 class="text-3xl font-extrabold tracking-tight text-slate-950">
                        Entrar na plataforma
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        Que bom te ver de novo! Faça login para continuar.
                    </p>

                    <x-auth-session-status class="mt-4 rounded-xl bg-green-50 p-3 text-sm text-green-700" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="mt-7">
                        @csrf

                        <div>
                            <label for="email" class="mb-2 block text-sm font-bold text-slate-900">
                                E-mail
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="Ex.: seu@email.com"
                                class="block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition placeholder:text-slate-300 focus:border-violet-500 focus:ring-4 focus:ring-violet-100"
                            >

                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                        </div>

                        <div class="mt-5">
                            <label for="password" class="mb-2 block text-sm font-bold text-slate-900">
                                Senha
                            </label>

                            <div class="relative">
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Ex.: ••••••••••••"
                                    class="block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 pr-12 text-sm text-slate-800 shadow-sm outline-none transition placeholder:text-slate-300 focus:border-violet-500 focus:ring-4 focus:ring-violet-100"
                                >

                                <button
                                    type="button"
                                    onclick="mostrarSenha()"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 transition hover:text-violet-600"
                                >
                                    <i id="icone-senha" class="fa-regular fa-eye"></i>
                                </button>
                            </div>

                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                        </div>

                        <div class="mt-5 flex items-center justify-between gap-4">
                            <label for="remember_me" class="flex cursor-pointer items-center gap-2 text-sm text-slate-500">
                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    name="remember"
                                    class="h-4 w-4 rounded border-slate-300 text-violet-600 shadow-sm focus:ring-violet-500"
                                >

                                <span>Lembrar de mim</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm font-semibold text-violet-600 transition hover:text-violet-800">
                                    Esqueci minha senha
                                </a>
                            @endif
                        </div>

                        <button
                            type="submit"
                            class="mt-6 flex w-full items-center justify-center gap-3 rounded-xl bg-violet-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-violet-200 transition hover:bg-violet-700"
                        >
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Entrar
                        </button>

                        <div class="my-6 flex items-center gap-4">
                            <div class="h-px flex-1 bg-slate-200"></div>
                            <span class="text-xs font-medium text-slate-400">ou</span>
                            <div class="h-px flex-1 bg-slate-200"></div>
                        </div>

                        <button
                            type="button"
                            class="flex w-full items-center justify-center gap-3 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-800 shadow-sm transition hover:border-violet-200 hover:bg-violet-50"
                        >
                            <span class="text-lg font-black text-blue-500">G</span>
                            Entrar com Google
                        </button>

                        <p class="mt-6 text-center text-sm text-slate-500">
                            Ainda não tem uma conta?

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="font-semibold text-violet-600 underline underline-offset-4 hover:text-violet-800">
                                    Criar conta
                                </a>
                            @endif
                        </p>
                    </form>
                </div>
            </section>
        </div>

        <p class="mt-3 text-center text-xs text-slate-500">
            © 2024 ApexEdu. Todos os direitos reservados.
        </p>
    </main>

    <script>
        function mostrarSenha() {
            const input = document.getElementById('password');
            const icone = document.getElementById('icone-senha');

            if (input.type === 'password') {
                input.type = 'text';
                icone.classList.remove('fa-eye');
                icone.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icone.classList.remove('fa-eye-slash');
                icone.classList.add('fa-eye');
            }
        }
    </script>

</body>
</html>