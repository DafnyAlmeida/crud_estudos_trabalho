<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar conta - ApexEdu</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="h-screen overflow-hidden bg-[#fbfbff] font-sans text-slate-950">

    <main class="flex h-screen flex-col items-center justify-center px-4 py-4">

        <div class="grid h-[535px] w-full max-w-4xl overflow-hidden rounded-[1.5rem] border border-slate-200 bg-white shadow-xl shadow-slate-200/70 lg:grid-cols-[0.8fr_1.2fr]">

            <!-- Lado esquerdo menor -->
            <section class="relative hidden overflow-hidden bg-gradient-to-br from-white via-violet-50 to-white px-9 py-8 lg:block">

                <div class="absolute left-6 top-14 h-44 w-44 rounded-full bg-violet-100 blur-3xl"></div>
                <div class="absolute bottom-8 right-4 h-44 w-44 rounded-full bg-purple-100 blur-3xl"></div>

                <div class="relative z-10">
                    <a href="/" class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-600 text-white shadow-md shadow-violet-200">
                            <i class="fa-solid fa-graduation-cap text-base"></i>
                        </div>

                        <span class="text-lg font-extrabold">
                            ApexEdu
                        </span>
                    </a>

                    <div class="mt-7">
                        <h1 class="max-w-xs text-3xl font-extrabold leading-tight tracking-tight text-slate-950">
                            Comece sua jornada de estudos
                        </h1>

                        <p class="mt-3 max-w-xs text-sm leading-6 text-slate-500">
                            Crie sua conta e organize matérias, conteúdos, tarefas e resumos em um só lugar.
                        </p>
                    </div>

                    <div class="relative mt-8 ml-5 w-[285px] rounded-2xl border border-slate-100 bg-white p-4 shadow-lg shadow-slate-200/70">
                        <h3 class="text-sm font-bold text-slate-900">
                            O que você poderá fazer
                        </h3>

                        <div class="mt-4 space-y-3">
                            <div class="flex items-center gap-3">
                                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-violet-100 text-violet-600">
                                    <i class="fa-solid fa-book text-xs"></i>
                                </span>

                                <p class="text-xs font-semibold text-slate-600">
                                    Cadastrar suas matérias
                                </p>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                                    <i class="fa-solid fa-file-lines text-xs"></i>
                                </span>

                                <p class="text-xs font-semibold text-slate-600">
                                    Organizar conteúdos
                                </p>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-green-100 text-green-600">
                                    <i class="fa-solid fa-chart-line text-xs"></i>
                                </span>

                                <p class="text-xs font-semibold text-slate-600">
                                    Acompanhar seu progresso
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-7 flex w-[285px] items-center gap-3 rounded-2xl bg-violet-100/70 px-4 py-3 text-violet-700">
                        <i class="fa-regular fa-star text-xl"></i>

                        <p class="text-xs font-medium leading-5 text-slate-600">
                            Tudo para estudar melhor de forma simples.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Formulário de cadastro -->
            <section class="flex items-center justify-center px-8 py-6 lg:px-10">
                <div class="w-full max-w-sm">

                    <div class="mb-6 lg:hidden">
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
                        Criar conta
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        Preencha seus dados para começar.
                    </p>

                    <form method="POST" action="{{ route('register') }}" class="mt-5">
                        @csrf

                        <div>
                            <label for="name" class="mb-1.5 block text-sm font-bold text-slate-900">
                                Nome
                            </label>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Ex.: Maria Silva"
                                class="block w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 shadow-sm outline-none transition placeholder:text-slate-300 focus:border-violet-500 focus:ring-4 focus:ring-violet-100"
                            >

                            <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-500" />
                        </div>

                        <div class="mt-3">
                            <label for="email" class="mb-1.5 block text-sm font-bold text-slate-900">
                                E-mail
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                                placeholder="Ex.: seu@email.com"
                                class="block w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 shadow-sm outline-none transition placeholder:text-slate-300 focus:border-violet-500 focus:ring-4 focus:ring-violet-100"
                            >

                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
                        </div>

                        <div class="mt-3">
                            <label for="password" class="mb-1.5 block text-sm font-bold text-slate-900">
                                Senha
                            </label>

                            <div class="relative">
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Digite sua senha"
                                    class="block w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 pr-11 text-sm text-slate-800 shadow-sm outline-none transition placeholder:text-slate-300 focus:border-violet-500 focus:ring-4 focus:ring-violet-100"
                                >

                                <button
                                    type="button"
                                    onclick="mostrarSenha('password', 'icone-senha')"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 transition hover:text-violet-600"
                                >
                                    <i id="icone-senha" class="fa-regular fa-eye text-sm"></i>
                                </button>
                            </div>

                            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
                        </div>

                        <div class="mt-3">
                            <label for="password_confirmation" class="mb-1.5 block text-sm font-bold text-slate-900">
                                Confirmar senha
                            </label>

                            <div class="relative">
                                <input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Confirme sua senha"
                                    class="block w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 pr-11 text-sm text-slate-800 shadow-sm outline-none transition placeholder:text-slate-300 focus:border-violet-500 focus:ring-4 focus:ring-violet-100"
                                >

                                <button
                                    type="button"
                                    onclick="mostrarSenha('password_confirmation', 'icone-confirmar-senha')"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 transition hover:text-violet-600"
                                >
                                    <i id="icone-confirmar-senha" class="fa-regular fa-eye text-sm"></i>
                                </button>
                            </div>

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-500" />
                        </div>

                        <button
                            type="submit"
                            class="mt-5 flex w-full items-center justify-center gap-3 rounded-xl bg-violet-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-violet-200 transition hover:bg-violet-700"
                        >
                            <i class="fa-solid fa-user-plus"></i>
                            Criar conta
                        </button>

                        <p class="mt-5 text-center text-sm text-slate-500">
                            Já tem uma conta?

                            <a href="{{ route('login') }}" class="font-semibold text-violet-600 underline underline-offset-4 hover:text-violet-800">
                                Entrar
                            </a>
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
        function mostrarSenha(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icone = document.getElementById(iconId);

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