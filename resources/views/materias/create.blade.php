<x-app-layout>
    @php
        $cores = [
            '#22c55e',
            '#7c3aed',
            '#a855f7',
            '#3b82f6',
            '#06b6d4',
            '#f97316',
            '#f43f5e',
        ];

        $icones = [
            'fa-solid fa-leaf',
            'fa-solid fa-flask',
            'fa-solid fa-brain',
            'fa-solid fa-book-open',
            'fa-solid fa-calculator',
            'fa-solid fa-chart-line',
            'fa-solid fa-globe',
            'fa-solid fa-palette',
            'fa-solid fa-music',
            'fa-solid fa-code',
            'fa-solid fa-landmark',
            'fa-regular fa-star',
            'fa-solid fa-atom',
            'fa-solid fa-dumbbell',
            'fa-solid fa-person',
            'fa-solid fa-map-location',
            'fa-solid fa-book-atlas',   
            'fa-solid fa-database',      
        ];

        $corSelecionada = old('cor_tema', '#22c55e');
        $iconeSelecionado = old('icone_tema', 'fa-solid fa-leaf');
        $statusSelecionado = old('status', 'ativa');
    @endphp

    <main class="min-h-screen bg-gray-50 px-5 py-5">
        <div class="mx-auto max-w-6xl">

            <form action="{{ route('materias.store') }}" method="POST">
                @csrf

                {{-- CABEÇALHO --}}
                <div class="mb-5 flex items-start justify-between gap-5">
                    <div>
                        <div class="mb-3 flex items-center gap-2 text-xs text-slate-500">
                            <a href="{{ route('dashboard') }}" class="font-medium text-purple-600 hover:underline">
                                Painel inicial
                            </a>

                            <span>></span>

                            <a href="{{ route('dashboard') }}" class="font-medium text-purple-600 hover:underline">
                                Matérias
                            </a>

                            <span>></span>

                            <span>Nova matéria</span>
                        </div>

                        <h1 class="text-3xl font-bold tracking-tight text-slate-950">
                            Nova matéria
                        </h1>

                        <p class="mt-2 text-sm text-slate-500">
                            Crie uma nova matéria para organizar os conteúdos e acompanhar o progresso.
                        </p>
                    </div>

                    <div class="flex items-center gap-3 pt-8">
                        <a href="{{ route('dashboard') }}"
                           class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-purple-600 shadow-sm transition hover:bg-purple-50">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="inline-flex items-center gap-2 rounded-xl bg-purple-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-purple-200 transition hover:bg-purple-700">
                            <i class="fa-regular fa-floppy-disk"></i>
                            Salvar
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5 lg:grid-cols-[1.5fr_0.9fr]">

                    {{-- FORMULÁRIO --}}
                    <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        {{-- NOME --}}
                        <div>
                            <label for="nome" class="text-sm font-bold text-slate-900">
                                Nome da matéria <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="nome"
                                name="nome"
                                maxlength="60"
                                value="{{ old('nome') }}"
                                placeholder="Ex.: Biologia"
                                class="mt-2 w-full rounded-xl border-slate-200 px-3 py-2.5 text-sm text-slate-700 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            >

                            <div class="mt-1 flex justify-between text-xs text-slate-400">
                                <span>
                                    @error('nome')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </span>

                                <span id="contadorNome">0/60</span>
                            </div>
                        </div>

                        {{-- DESCRIÇÃO --}}
                        <div class="mt-5">
                            <label for="descricao" class="text-sm font-bold text-slate-900">
                                Descrição
                            </label>

                            <textarea
                                name="descricao"
                                id="descricao"
                                maxlength="200"
                                rows="3"
                                placeholder="Descreva o que será estudado nesta matéria."
                                class="mt-2 w-full resize-none rounded-xl border-slate-200 px-3 py-2.5 text-sm text-slate-700 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            >{{ old('descricao') }}</textarea>

                            <div class="mt-1 flex justify-between text-xs text-slate-400">
                                <span>
                                    @error('descricao')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </span>

                                <span id="contadorDescricao">0/200</span>
                            </div>
                        </div>

                        {{-- COR E STATUS --}}
                        <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">

                            {{-- COR --}}
                            <div>
                                <p class="text-sm font-bold text-slate-900">
                                    Cor da matéria <span class="text-red-500">*</span>
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    Escolha uma cor para identificar a matéria.
                                </p>

                                <div class="mt-3 flex flex-wrap gap-3">
                                    @foreach($cores as $cor)
                                        <label class="cursor-pointer">
                                            <input
                                                type="radio"
                                                name="cor_tema"
                                                value="{{ $cor }}"
                                                class="peer sr-only"
                                                @checked($corSelecionada === $cor)
                                            >

                                            <span
                                                class="block h-7 w-7 rounded-full border-4 border-white shadow ring-1 ring-slate-200 transition peer-checked:ring-4 peer-checked:ring-purple-200"
                                                style="background-color: {{ $cor }}">
                                            </span>
                                        </label>
                                    @endforeach
                                </div>

                                @error('cor_tema')
                                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- STATUS --}}
                            <div>
                                <p class="text-sm font-bold text-slate-900">
                                    Status <span class="text-red-500">*</span>
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    Defina se ficará visível no painel.
                                </p>

                                <div class="mt-3 grid grid-cols-2 overflow-hidden rounded-xl border border-slate-200 bg-white p-1">
                                    <label class="cursor-pointer">
                                        <input
                                            type="radio"
                                            name="status"
                                            value="ativa"
                                            class="peer sr-only"
                                            @checked($statusSelecionado === 'ativa')
                                        >

                                        <span class="flex items-center justify-center gap-2 rounded-lg px-3 py-2 text-xs font-semibold text-slate-500 transition peer-checked:bg-green-100 peer-checked:text-green-600">
                                            <i class="fa-regular fa-circle-check"></i>
                                            Ativa
                                        </span>
                                    </label>

                                    <label class="cursor-pointer">
                                        <input
                                            type="radio"
                                            name="status"
                                            value="arquivada"
                                            class="peer sr-only"
                                            @checked($statusSelecionado === 'arquivada')
                                        >

                                        <span class="flex items-center justify-center gap-2 rounded-lg px-3 py-2 text-xs font-semibold text-slate-500 transition peer-checked:bg-slate-100 peer-checked:text-slate-700">
                                            <i class="fa-regular fa-eye-slash"></i>
                                            Arquivada
                                        </span>
                                    </label>
                                </div>

                                @error('status')
                                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- ÍCONES --}}
                        <div class="mt-5">
                            <p class="text-sm font-bold text-slate-900">
                                Ícone <span class="text-red-500">*</span>
                            </p>

                            <p class="mt-1 text-xs text-slate-500">
                                Escolha um ícone para identificar sua matéria.
                            </p>

                            <div class="mt-3 grid grid-cols-6 gap-3 md:w-[430px]">
                                @foreach($icones as $icone)
                                    <label class="cursor-pointer">
                                        <input
                                            type="radio"
                                            name="icone_tema"
                                            value="{{ $icone }}"
                                            class="peer sr-only"
                                            @checked($iconeSelecionado === $icone)
                                        >

                                        <span class="flex h-10 w-11 items-center justify-center rounded-xl border border-slate-200 bg-white text-base text-purple-600 transition hover:bg-purple-50 peer-checked:border-green-500 peer-checked:bg-green-50 peer-checked:text-green-600">
                                            <i class="{{ $icone }}"></i>
                                        </span>
                                    </label>
                                @endforeach
                            </div>

                            @error('icone_tema')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </section>

                    {{-- LATERAL --}}
                    <aside class="space-y-5">

                        {{-- CARD DE PRÉVIA --}}
                        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md">

                            <div class="block p-4">
                                <div class="mb-4 flex items-start justify-between">
                                    <div id="cardIconeBox"
                                         class="flex h-10 w-10 items-center justify-center rounded-xl text-base text-white"
                                         style="background-color: {{ $corSelecionada }}">
                                        <i id="cardIcone" class="{{ $iconeSelecionado }}"></i>
                                    </div>

                                    <span id="cardStatus"
                                          class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-600">
                                        Ativa
                                    </span>
                                </div>

                                <h2 id="cardNome" class="text-lg font-semibold text-slate-900">
                                    Biologia
                                </h2>

                                <p id="cardDescricao" class="mt-1 text-xs leading-5 text-slate-500">
                                    Descrição da matéria aparecerá aqui.
                                </p>

                                <div class="mt-4 border-t border-slate-100 pt-3">
                                    <div class="mb-2 flex justify-between text-xs">
                                        <span class="text-slate-500">Progresso</span>

                                        <span id="cardProgressoTexto" class="font-semibold" style="color: {{ $corSelecionada }};">
                                            0%
                                        </span>
                                    </div>

                                    <div class="h-1.5 overflow-hidden rounded-full bg-slate-100">
                                        <div id="cardBarra"
                                             class="h-full rounded-full"
                                             style="width: 0%; background-color: {{ $corSelecionada }};">
                                        </div>
                                    </div>

                                    <div class="mt-3 flex items-center gap-2 text-xs text-slate-500">
                                        <span id="cardConteudosIcone"
                                              class="flex h-6 w-6 items-center justify-center rounded-lg"
                                              style="color: {{ $corSelecionada }}; background-color: {{ $corSelecionada }}18;">
                                            <i class="fa-regular fa-file-lines text-[10px]"></i>
                                        </span>

                                        <span>0 conteúdos</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex border-t border-slate-100">
                                <p class="flex flex-1 items-center justify-center gap-2 border-r border-slate-100 py-2.5 text-xs font-medium text-violet-600">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    Editar
                                </p>

                                <p class="flex flex-1 items-center justify-center gap-2 py-2.5 text-xs font-medium text-red-500">
                                    <i class="fa-regular fa-trash-can"></i>
                                    Excluir
                                </p>
                            </div>
                        </div>

                        {{-- DICAS --}}
                        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="mb-4 flex items-center gap-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-purple-100 text-purple-600">
                                    <i class="fa-regular fa-lightbulb text-sm"></i>
                                </div>

                                <h2 class="text-base font-bold text-purple-600">
                                    Dica de organização
                                </h2>
                            </div>

                            <div class="space-y-4">
                                <div class="flex gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-purple-100 text-purple-600">
                                        <i class="fa-solid fa-tag text-sm"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900">
                                            Nome claro
                                        </h3>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            Escolha um nome que represente bem o foco da matéria.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-green-100 text-green-600">
                                        <i class="fa-solid fa-palette text-sm"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900">
                                            Use cores
                                        </h3>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            Cores ajudam a identificar rapidamente cada matéria.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                                        <i class="fa-regular fa-rectangle-list text-sm"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900">
                                            Defina objetivos
                                        </h3>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            Ter um objetivo claro ajuda a manter o foco.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-purple-100 text-purple-600">
                                        <i class="fa-regular fa-eye-slash text-sm"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900">
                                            Arquive quando preciso
                                        </h3>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            Matérias arquivadas não aparecem no painel principal.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </aside>
                </div>
            </form>
        </div>
    </main>

    <script>
        const inputNome = document.getElementById('nome');
        const inputDescricao = document.getElementById('descricao');

        const contadorNome = document.getElementById('contadorNome');
        const contadorDescricao = document.getElementById('contadorDescricao');

        const cardNome = document.getElementById('cardNome');
        const cardDescricao = document.getElementById('cardDescricao');
        const cardIcone = document.getElementById('cardIcone');
        const cardIconeBox = document.getElementById('cardIconeBox');
        const cardBarra = document.getElementById('cardBarra');
        const cardProgressoTexto = document.getElementById('cardProgressoTexto');
        const cardConteudosIcone = document.getElementById('cardConteudosIcone');
        const cardStatus = document.getElementById('cardStatus');

        function atualizarContadores() {
            contadorNome.textContent = `${inputNome.value.length}/60`;
            contadorDescricao.textContent = `${inputDescricao.value.length}/200`;
        }

        function atualizarNome() {
            const nome = inputNome.value.trim() || 'Biologia';
            cardNome.textContent = nome;
        }

        function atualizarDescricao() {
            const descricao = inputDescricao.value.trim() || 'Descrição da matéria aparecerá aqui.';
            cardDescricao.textContent = descricao;
        }

        function atualizarCor(cor) {
            cardIconeBox.style.backgroundColor = cor;
            cardBarra.style.backgroundColor = cor;
            cardProgressoTexto.style.color = cor;
            cardConteudosIcone.style.color = cor;
            cardConteudosIcone.style.backgroundColor = `${cor}18`;
        }

        function atualizarIcone(icone) {
            cardIcone.className = icone;
        }

        function atualizarStatus(status) {
            if (status === 'arquivada') {
                cardStatus.textContent = 'Arquivada';
                cardStatus.className = 'rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600';
            } else {
                cardStatus.textContent = 'Ativa';
                cardStatus.className = 'rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-600';
            }
        }

        inputNome.addEventListener('input', function () {
            atualizarContadores();
            atualizarNome();
        });

        inputDescricao.addEventListener('input', function () {
            atualizarContadores();
            atualizarDescricao();
        });

        document.querySelectorAll('input[name="cor_tema"]').forEach(function (input) {
            input.addEventListener('change', function () {
                atualizarCor(input.value);
            });
        });

        document.querySelectorAll('input[name="icone_tema"]').forEach(function (input) {
            input.addEventListener('change', function () {
                atualizarIcone(input.value);
            });
        });

        document.querySelectorAll('input[name="status"]').forEach(function (input) {
            input.addEventListener('change', function () {
                atualizarStatus(input.value);
            });
        });

        atualizarContadores();
        atualizarNome();
        atualizarDescricao();

        const corInicial = document.querySelector('input[name="cor_tema"]:checked');
        const iconeInicial = document.querySelector('input[name="icone_tema"]:checked');
        const statusInicial = document.querySelector('input[name="status"]:checked');

        if (corInicial) {
            atualizarCor(corInicial.value);
        }

        if (iconeInicial) {
            atualizarIcone(iconeInicial.value);
        }

        if (statusInicial) {
            atualizarStatus(statusInicial.value);
        }
    </script>
</x-app-layout>