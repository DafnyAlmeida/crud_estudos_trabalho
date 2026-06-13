<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ApexEdu</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-[#fafaff] font-sans text-slate-900">
    <header class="fixed left-0 top-0 z-50 w-full border-b border-slate-100 bg-white/80 backdrop-blur-xl">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5 lg:px-10">
            <a href="/" class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-violet-600 text-white shadow-lg shadow-violet-200">
                    <span class="text-xl font-black">▣</span>
                </div>

                <span class="text-xl font-bold text-slate-900">
                    ApexEdu
                </span>
            </a>

            <nav class="hidden items-center gap-10 text-sm font-medium text-slate-500 lg:flex">
                <a href="#recursos" class="transition hover:text-violet-600">Recursos</a>
                <a href="#como-funciona" class="transition hover:text-violet-600">Como funciona</a>
                <a href="#sobre" class="transition hover:text-violet-600">Sobre</a>
                <a href="#planos" class="transition hover:text-violet-600">Planos</a>
            </nav>

            @if (Route::has('login'))
                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="rounded-xl bg-violet-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-violet-200 transition hover:bg-violet-700">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="hidden text-sm font-semibold text-violet-600 transition hover:text-violet-800 sm:block">
                            Entrar
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="rounded-xl bg-violet-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-violet-200 transition hover:bg-violet-700">
                                Criar conta
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>

<main class="overflow-hidden pt-20">

    <section class="relative">
        <div class="absolute right-0 top-0 -z-10 h-[360px] w-[360px] rounded-full bg-violet-100 blur-3xl"></div>
        <div class="absolute left-0 top-32 -z-10 h-[300px] w-[300px] rounded-full bg-blue-50 blur-3xl"></div>

        <div class="mx-auto grid max-w-6xl items-center gap-10 px-5 py-10 lg:grid-cols-2 lg:px-8 lg:py-16">

            <div>
                <div class="mb-5 inline-flex items-center gap-2 rounded-full bg-violet-100 px-4 py-1.5 text-xs font-bold text-violet-600">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    Estude com organização. Aprenda com eficiência.
                </div>

                <h1 class="max-w-xl text-4xl font-extrabold leading-tight tracking-tight text-slate-950 lg:text-5xl">
                    Organize seus estudos.
                    <span class="block text-violet-600">
                        Alcance seus objetivos.
                    </span>
                </h1>

                <p class="mt-5 max-w-lg text-sm leading-7 text-slate-500 lg:text-base">
                    ApexEdu é a plataforma completa para você organizar matérias,
                    conteúdos e resumos em um só lugar. Foque no que importa:
                    aprender e evoluir todos os dias.
                </p>

                <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ Route::has('register') ? route('register') : '#' }}"
                       class="inline-flex items-center justify-center gap-2 rounded-lg bg-violet-600 px-5 py-3 text-xs font-bold text-white shadow-lg shadow-violet-200 transition hover:-translate-y-0.5 hover:bg-violet-700">
                        <i class="fa-solid fa-rocket"></i>
                        Comece agora
                    </a>

                    <a href="#como-funciona"
                       class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-5 py-3 text-xs font-bold text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:border-violet-200 hover:text-violet-600">
                        <i class="fa-solid fa-circle-play"></i>
                        Ver como funciona
                    </a>
                </div>

                <div class="mt-8 flex items-center gap-3">
                    <div class="flex -space-x-2">
                        <div class="h-9 w-9 rounded-full border-3 border-white bg-orange-200"></div>
                        <div class="h-9 w-9 rounded-full border-3 border-white bg-blue-200"></div>
                        <div class="h-9 w-9 rounded-full border-3 border-white bg-pink-200"></div>
                        <div class="h-9 w-9 rounded-full border-3 border-white bg-slate-300"></div>
                    </div>

                    <div>
                        <div class="flex gap-0.5 text-xs text-yellow-400">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-xs font-medium text-slate-500">
                            Junte-se a estudantes que já organizaram seus estudos.
                        </p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-violet-200 blur-3xl"></div>

                <div class="rounded-3xl border border-slate-100 bg-white/90 p-3 shadow-xl shadow-violet-100 backdrop-blur-xl">
                    <div class="flex overflow-hidden rounded-2xl border border-slate-100 bg-white">

                        <aside class="hidden w-16 flex-col items-center justify-between border-r border-slate-100 bg-white py-5 sm:flex">
                            <div class="flex flex-col items-center gap-5">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-violet-600 text-white">
                                    <i class="fa-solid fa-graduation-cap text-xs"></i>
                                </div>

                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-violet-100 text-violet-600">
                                    <i class="fa-solid fa-house"></i>
                                </div>

                                <i class="fa-solid fa-book-open text-slate-400"></i>
                                <i class="fa-solid fa-calendar-days text-slate-400"></i>
                                <i class="fa-solid fa-file-lines text-slate-400"></i>
                                <i class="fa-solid fa-chart-line text-slate-400"></i>
                            </div>

                            <i class="fa-solid fa-gear text-slate-400"></i>
                        </aside>

                        <div class="flex-1 p-4 sm:p-6">
                            <div class="mb-6 flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-bold text-slate-900">
                                        Olá, estudante!
                                    </h2>
                                    <p class="mt-1 text-xs text-slate-400">
                                        Pronto para continuar sua jornada?
                                    </p>
                                </div>

                                <div class="flex items-center gap-3">
                                    <i class="fa-solid fa-bell text-slate-400"></i>
                                    <div class="h-9 w-9 rounded-full bg-orange-200"></div>
                                </div>
                            </div>

                            <div class="grid gap-3 sm:grid-cols-3">
                                <div class="rounded-xl border border-slate-100 bg-white p-4 shadow-md shadow-slate-100">
                                    <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-violet-100 text-violet-600">
                                        <i class="fa-solid fa-book"></i>
                                    </div>
                                    <h3 class="text-sm font-bold text-slate-900">Matérias</h3>
                                    <p class="mt-1 text-xs text-slate-400">
                                        8 cadastradas
                                    </p>
                                </div>

                                <div class="rounded-xl border border-slate-100 bg-white p-4 shadow-md shadow-slate-100">
                                    <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                                        <i class="fa-solid fa-file-lines"></i>
                                    </div>
                                    <h3 class="text-sm font-bold text-slate-900">Conteúdos</h3>
                                    <p class="mt-1 text-xs text-slate-400">
                                        45 organizados
                                    </p>
                                </div>

                                <div class="rounded-xl border border-slate-100 bg-white p-4 shadow-md shadow-slate-100">
                                    <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-green-100 text-green-600">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </div>
                                    <h3 class="text-sm font-bold text-slate-900">Resumos</h3>
                                    <p class="mt-1 text-xs text-slate-400">
                                        12 criados
                                    </p>
                                </div>
                            </div>

                            <div class="mt-4 rounded-xl border border-slate-100 bg-white p-5 shadow-md shadow-slate-100">
                                <div class="mb-3 flex items-center justify-between">
                                    <h3 class="text-sm font-bold text-slate-900">Progresso geral</h3>
                                    <span class="text-xs font-bold text-violet-600">68%</span>
                                </div>

                                <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                                    <div class="h-full w-[68%] rounded-full bg-violet-600"></div>
                                </div>

                                <p class="mt-3 text-xs text-slate-400">
                                    Continue assim! Você está indo muito bem.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-5 lg:px-8">
        <div class="rounded-2xl border border-slate-100 bg-white px-6 py-6 shadow-lg shadow-slate-100">
            <p class="mb-6 text-center text-xs font-semibold text-slate-400">
                Apoiando estudantes em sua jornada de aprendizado
            </p>

            <div class="grid gap-6 text-center sm:grid-cols-2 lg:grid-cols-4">
                <div>
                    <div class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-violet-100 text-violet-600">
                        <i class="fa-solid fa-laptop"></i>
                    </div>
                    <h3 class="text-sm font-bold">100% Online</h3>
                    <p class="mt-1 text-xs text-slate-500">Estude de qualquer lugar</p>
                </div>

                <div>
                    <div class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-violet-100 text-violet-600">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h3 class="text-sm font-bold">Seguro</h3>
                    <p class="mt-1 text-xs text-slate-500">Seus dados protegidos</p>
                </div>

                <div>
                    <div class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-violet-100 text-violet-600">
                        <i class="fa-solid fa-rotate"></i>
                    </div>
                    <h3 class="text-sm font-bold">Sincronizado</h3>
                    <p class="mt-1 text-xs text-slate-500">Acesse em todos os dispositivos</p>
                </div>

                <div>
                    <div class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-violet-100 text-violet-600">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h3 class="text-sm font-bold">Confiável</h3>
                    <p class="mt-1 text-xs text-slate-500">Feito para estudantes</p>
                </div>
            </div>
        </div>
    </section>

    <section id="recursos" class="mx-auto max-w-6xl px-5 py-16 lg:px-8">
        <div class="text-center">
            <span class="rounded-full bg-violet-100 px-3 py-1.5 text-[11px] font-bold uppercase tracking-wider text-violet-600">
                Recursos
            </span>

            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-950">
                Tudo o que você precisa para estudar melhor
            </h2>

            <p class="mt-4 text-sm text-slate-500">
                Ferramentas pensadas para otimizar seu tempo e potencializar seus resultados.
            </p>
        </div>

        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-lg shadow-slate-100 transition hover:-translate-y-1">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-xl bg-violet-100 text-violet-600">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <h3 class="text-base font-bold">Organização Inteligente</h3>
                <p class="mt-3 text-sm leading-6 text-slate-500">
                    Estruture matérias e conteúdos de forma intuitiva e eficiente.
                </p>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-lg shadow-slate-100 transition hover:-translate-y-1">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                    <i class="fa-solid fa-file-lines"></i>
                </div>
                <h3 class="text-base font-bold">Resumos Rápidos</h3>
                <p class="mt-3 text-sm leading-6 text-slate-500">
                    Crie e revise resumos para fixar o que realmente importa.
                </p>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-lg shadow-slate-100 transition hover:-translate-y-1">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-xl bg-green-100 text-green-600">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <h3 class="text-base font-bold">Acompanhe seu Progresso</h3>
                <p class="mt-3 text-sm leading-6 text-slate-500">
                    Visualize sua evolução e mantenha a consistência nos estudos.
                </p>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-lg shadow-slate-100 transition hover:-translate-y-1">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-xl bg-orange-100 text-orange-600">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <h3 class="text-base font-bold">Seguro e Confiável</h3>
                <p class="mt-3 text-sm leading-6 text-slate-500">
                    Seus dados protegidos para estudar com tranquilidade.
                </p>
            </div>
        </div>
    </section>

    <section id="como-funciona" class="mx-auto max-w-6xl px-5 pb-16 lg:px-8">
        <div class="text-center">
            <span class="rounded-full bg-slate-100 px-3 py-1.5 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                Como funciona
            </span>

            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-950">
                Aprender nunca foi tão simples
            </h2>

            <p class="mt-4 text-sm text-slate-500">
                Em poucos passos, você organiza seus estudos e alcança seus objetivos.
            </p>
        </div>

        <div class="relative mt-12 grid gap-8 lg:grid-cols-4">
            <div class="absolute left-0 right-0 top-7 hidden border-t-2 border-dashed border-violet-100 lg:block"></div>

            <div class="relative text-center">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-violet-600 text-white shadow-lg shadow-violet-200">
                    <i class="fa-solid fa-user"></i>
                </div>
                <span class="mt-3 inline-block text-xs font-black text-violet-600">01</span>
                <h3 class="mt-2 text-sm font-bold">Crie sua conta</h3>
                <p class="mt-2 text-xs leading-5 text-slate-500">
                    É rápido, gratuito e leva menos de um minuto.
                </p>
            </div>

            <div class="relative text-center">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-violet-600 text-white shadow-lg shadow-violet-200">
                    <i class="fa-solid fa-book"></i>
                </div>
                <span class="mt-3 inline-block text-xs font-black text-violet-600">02</span>
                <h3 class="mt-2 text-sm font-bold">Adicione matérias</h3>
                <p class="mt-2 text-xs leading-5 text-slate-500">
                    Organize suas disciplinas e personalize do seu jeito.
                </p>
            </div>

            <div class="relative text-center">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-violet-600 text-white shadow-lg shadow-violet-200">
                    <i class="fa-solid fa-file-lines"></i>
                </div>
                <span class="mt-3 inline-block text-xs font-black text-violet-600">03</span>
                <h3 class="mt-2 text-sm font-bold">Cadastre conteúdos</h3>
                <p class="mt-2 text-xs leading-5 text-slate-500">
                    Registre o que é importante e revise quando quiser.
                </p>
            </div>

            <div class="relative text-center">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-violet-600 text-white shadow-lg shadow-violet-200">
                    <i class="fa-solid fa-chart-simple"></i>
                </div>
                <span class="mt-3 inline-block text-xs font-black text-violet-600">04</span>
                <h3 class="mt-2 text-sm font-bold">Veja o progresso</h3>
                <p class="mt-2 text-xs leading-5 text-slate-500">
                    Acompanhe sua evolução e mantenha o foco.
                </p>
            </div>
        </div>
    </section>

    <section id="sobre" class="mx-auto max-w-6xl px-5 pb-16 lg:px-8">
        <div class="text-center">
            <span class="rounded-full bg-slate-100 px-3 py-1.5 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                Quem usa, aprova
            </span>

            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-950">
                Estudantes que evoluíram com o ApexEdu
            </h2>
        </div>

        <div class="mt-10 grid gap-5 lg:grid-cols-3">
            <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-lg shadow-slate-100">
                <i class="fa-solid fa-quote-left text-2xl text-violet-500"></i>
                <p class="mt-3 text-sm leading-6 text-slate-500">
                    O ApexEdu mudou completamente a forma como me organizo.
                    Consigo estudar com muito mais foco.
                </p>

                <div class="mt-6 flex items-center gap-3">
                    <div class="h-10 w-10 rounded-full bg-blue-200"></div>
                    <div>
                        <h4 class="text-sm font-bold">Juliana Alves</h4>
                        <p class="text-xs text-slate-500">Estudante de Medicina</p>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-lg shadow-slate-100">
                <i class="fa-solid fa-quote-left text-2xl text-violet-500"></i>
                <p class="mt-3 text-sm leading-6 text-slate-500">
                    Os resumos e a organização dos conteúdos me ajudaram
                    a ter melhores resultados nas provas.
                </p>

                <div class="mt-6 flex items-center gap-3">
                    <div class="h-10 w-10 rounded-full bg-orange-200"></div>
                    <div>
                        <h4 class="text-sm font-bold">Lucas Ferreira</h4>
                        <p class="text-xs text-slate-500">Estudante de Engenharia</p>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-lg shadow-slate-100">
                <i class="fa-solid fa-quote-left text-2xl text-violet-500"></i>
                <p class="mt-3 text-sm leading-6 text-slate-500">
                    Interface simples, intuitiva e bonita. Tudo que eu precisava
                    para estudar em um só lugar.
                </p>

                <div class="mt-6 flex items-center gap-3">
                    <div class="h-10 w-10 rounded-full bg-pink-200"></div>
                    <div>
                        <h4 class="text-sm font-bold">Mariana Costa</h4>
                        <p class="text-xs text-slate-500">Estudante de Direito</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="planos" class="mx-auto max-w-6xl px-5 pb-16 lg:px-8">
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-violet-100 to-purple-50 px-6 py-8 shadow-lg shadow-violet-100 lg:px-10">
            <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full border-[22px] border-white/50"></div>

            <div class="relative flex flex-col items-start justify-between gap-5 lg:flex-row lg:items-center">
                <div>
                    <h2 class="text-2xl font-extrabold text-slate-950">
                        Pronto para transformar seus estudos?
                    </h2>

                    <p class="mt-2 text-sm text-slate-600">
                        Crie sua conta gratuita e comece agora mesmo.
                    </p>
                </div>

                <a href="{{ Route::has('register') ? route('register') : '#' }}"
                   class="inline-flex items-center gap-2 rounded-lg bg-violet-600 px-5 py-3 text-xs font-bold text-white shadow-lg shadow-violet-200 transition hover:-translate-y-0.5 hover:bg-violet-700">
                    <i class="fa-solid fa-rocket"></i>
                    Criar conta grátis
                </a>
            </div>
        </div>
    </section>

</main>

<footer id="contato" class="border-t border-slate-100 bg-white">
    <div class="mx-auto grid max-w-6xl gap-8 px-5 py-10 lg:grid-cols-5 lg:px-8">
        <div class="lg:col-span-1">
            <div class="flex items-center gap-2">
                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-violet-600 text-white">
                    <i class="fa-solid fa-graduation-cap text-sm"></i>
                </div>

                <span class="text-lg font-bold">
                    ApexEdu
                </span>
            </div>

            <p class="mt-4 text-sm leading-6 text-slate-500">
                A plataforma completa para organizar seus estudos,
                conteúdos e resumos em um só lugar.
            </p>

            <div class="mt-5 flex gap-4 text-sm text-slate-400">
                <i class="fa-brands fa-instagram hover:text-violet-600"></i>
                <i class="fa-brands fa-facebook-f hover:text-violet-600"></i>
                <i class="fa-brands fa-x-twitter hover:text-violet-600"></i>
                <i class="fa-brands fa-youtube hover:text-violet-600"></i>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-bold">Navegação</h3>
            <div class="mt-4 flex flex-col gap-2.5 text-xs text-slate-500">
                <a href="#recursos" class="hover:text-violet-600">Recursos</a>
                <a href="#como-funciona" class="hover:text-violet-600">Como funciona</a>
                <a href="#sobre" class="hover:text-violet-600">Sobre</a>
                <a href="#contato" class="hover:text-violet-600">Contato</a>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-bold">Suporte</h3>
            <div class="mt-4 flex flex-col gap-2.5 text-xs text-slate-500">
                <a href="#" class="hover:text-violet-600">Central de ajuda</a>
                <a href="#" class="hover:text-violet-600">Dúvidas frequentes</a>
                <a href="#" class="hover:text-violet-600">Fale conosco</a>
                <a href="#" class="hover:text-violet-600">Termos de uso</a>
                <a href="#" class="hover:text-violet-600">Política de privacidade</a>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-bold">Recursos</h3>
            <div class="mt-4 flex flex-col gap-2.5 text-xs text-slate-500">
                <a href="#" class="hover:text-violet-600">Matérias</a>
                <a href="#" class="hover:text-violet-600">Conteúdos</a>
                <a href="#" class="hover:text-violet-600">Resumos</a>
                <a href="#" class="hover:text-violet-600">Progresso</a>
                <a href="#" class="hover:text-violet-600">Organização</a>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-bold">Newsletter</h3>
            <p class="mt-4 text-xs leading-5 text-slate-500">
                Receba dicas de estudo e novidades por e-mail.
            </p>

            <form class="mt-4 flex rounded-lg border border-slate-200 bg-white p-1">
                <input type="email"
                       placeholder="Seu e-mail"
                       class="w-full rounded-md border-0 px-3 text-xs outline-none focus:ring-0">

                <button type="button"
                        class="rounded-md bg-violet-600 px-3 py-2 text-white">
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="border-t border-slate-100 py-4 text-center text-xs text-slate-400">
        © 2026 ApexEdu. Todos os direitos reservados.
    </div>
</footer>
</body>
</html>