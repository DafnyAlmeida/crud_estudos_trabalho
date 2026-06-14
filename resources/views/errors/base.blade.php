@php
    use Illuminate\Support\Facades\Route;

    $code = $code ?? '404';
    $eyebrow = $eyebrow ?? 'Erro encontrado';
    $title = $title ?? 'Algo saiu do caminho.';
    $message = $message ?? 'Não conseguimos carregar essa página no momento.';
    $tip = $tip ?? 'Volte para o início e continue seus estudos.';

    $homeUrl = Route::has('dashboard') ? route('dashboard') : url('/');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $code }} | ApexEdu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen overflow-hidden bg-[#fbfaff] font-sans text-slate-900 antialiased">
    <div class="relative flex h-screen flex-col overflow-hidden">
        <div class="absolute -left-24 -top-24 h-64 w-64 rounded-full bg-violet-200/40 blur-3xl"></div>
        <div class="absolute -right-24 bottom-0 h-72 w-72 rounded-full bg-indigo-200/40 blur-3xl"></div>

        <header class="relative z-10 border-b border-slate-200/70 bg-white/80 backdrop-blur-xl">
            <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-6">
                <a href="{{ $homeUrl }}" class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-violet-600 to-indigo-600 shadow-md shadow-violet-200">
                        <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none">
                            <path d="M12 3L4 8v8l8 5 8-5V8l-8-5Z" stroke="currentColor" stroke-width="1.7"/>
                            <path d="M8.4 15.4l2.3-6.7 2 3.9 1.2-2.1 1.9 4.9H8.4Z" fill="currentColor"/>
                        </svg>
                    </div>

                    <span class="text-xl font-extrabold tracking-tight text-slate-950">
                        ApexEdu
                    </span>
                </a>

                <span class="hidden rounded-full bg-violet-50 px-4 py-2 text-xs font-semibold text-violet-700 sm:block">
                    Área de estudos
                </span>
            </div>
        </header>

        <main class="relative z-10 mx-auto grid flex-1 max-w-6xl items-center gap-6 px-6 py-6 lg:grid-cols-[0.9fr_1.1fr]">
            <section class="rounded-[1.7rem] border border-slate-200/80 bg-white/90 p-7 shadow-xl shadow-violet-100/60 backdrop-blur-xl sm:p-8">
                <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-violet-100 text-violet-700">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none">
                        <path d="M12 9v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 17h.01" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                        <path d="M10.3 4.2 2.7 17.4A2.4 2.4 0 004.8 21h14.4a2.4 2.4 0 002.1-3.6L13.7 4.2a2 2 0 00-3.4 0Z" stroke="currentColor" stroke-width="1.7"/>
                    </svg>
                </div>

                <p class="mb-2 text-xs font-bold uppercase tracking-[0.22em] text-violet-600">
                    {{ $eyebrow }} · {{ $code }}
                </p>

                <h1 class="max-w-lg text-3xl font-black leading-tight tracking-tight text-slate-950 sm:text-4xl">
                    {{ $title }}
                </h1>

                <p class="mt-4 max-w-lg text-sm leading-6 text-slate-600 sm:text-base">
                    {{ $message }}
                </p>

                <div class="mt-5 rounded-2xl border border-violet-100 bg-violet-50/70 p-4">
                    <p class="text-sm font-medium leading-6 text-slate-700">
                        {{ $tip }}
                    </p>
                </div>

                <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ $homeUrl }}"
                       class="inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-violet-600 to-indigo-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-violet-200 transition hover:-translate-y-0.5">
                        Ir para o início
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none">
                            <path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>

                    <button type="button"
                            onclick="history.back()"
                            class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:bg-slate-50">
                        Voltar
                    </button>
                </div>
            </section>

            <section class="hidden lg:block">
                <div class="relative rounded-[1.8rem] border border-violet-100 bg-gradient-to-br from-white via-violet-50 to-indigo-50 p-7 shadow-xl shadow-violet-100/60">
                    <div class="absolute right-8 top-8 grid grid-cols-4 gap-2 opacity-25">
                        @for ($i = 0; $i < 16; $i++)
                            <span class="h-1.5 w-1.5 rounded-full bg-violet-500"></span>
                        @endfor
                    </div>

                    <div class="relative mx-auto max-w-md rounded-[1.5rem] border border-slate-200 bg-white/90 p-5 shadow-lg backdrop-blur">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <div class="flex items-center gap-2">
                                <span class="h-3 w-3 rounded-full bg-red-300"></span>
                                <span class="h-3 w-3 rounded-full bg-yellow-300"></span>
                                <span class="h-3 w-3 rounded-full bg-green-300"></span>
                            </div>

                            <span class="rounded-full bg-slate-100 px-4 py-1.5 text-xs font-semibold text-slate-500">
                                apexedu.com
                            </span>
                        </div>

                        <div class="py-8 text-center">
                            <div class="mx-auto mb-4 flex h-24 w-24 items-center justify-center rounded-[2rem] bg-gradient-to-br from-violet-100 to-indigo-100 text-violet-700">
                                <span class="text-4xl font-black">{{ $code }}</span>
                            </div>

                            <h2 class="text-2xl font-black text-slate-950">
                                Rota não disponível
                            </h2>

                            <p class="mx-auto mt-3 max-w-xs text-sm leading-6 text-slate-500">
                                Parece que essa página não pode ser acessada agora.
                            </p>
                        </div>

                        <div class="rounded-2xl border border-slate-100 bg-white p-4 shadow-sm">
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-violet-100 text-violet-700">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                        <path d="M4 19V5a2 2 0 012-2h11a3 3 0 013 3v14H6a2 2 0 01-2-2Z" stroke="currentColor" stroke-width="1.8"/>
                                        <path d="M8 7h8M8 11h6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-sm font-bold text-slate-900">
                                        Continue seus estudos
                                    </p>
                                    <p class="text-xs text-slate-500">
                                        Volte para o painel principal.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>