<x-app-layout>
    @php
        $statusSelecionado = old('status', $tarefa->status ?? 'a_fazer');
        $prioridadeSelecionada = old('prioridade', $tarefa->prioridade ?? 'media');

        $dataEntrega = '';

        if (!empty($tarefa->data_entrega)) {
            $dataEntrega = \Illuminate\Support\Carbon::parse($tarefa->data_entrega)->format('Y-m-d');
        }

        $dataSelecionada = old('data_entrega', $dataEntrega);

        $statusLabels = [
            'a_fazer' => 'A fazer',
            'fazendo' => 'Fazendo',
            'feito' => 'Feito',
        ];

        $prioridadeLabels = [
            'alta' => 'Alta',
            'media' => 'Média',
            'baixa' => 'Baixa',
        ];

        $corMateria = $materia->cor_tema ?? '#7c3aed';
        $iconeMateria = $materia->icone_tema ?? 'fa-regular fa-file-lines';
    @endphp

    <main class="min-h-screen bg-gray-50 px-5 py-5">
        <div class="mx-auto max-w-6xl">

            <form id="form-tarefa" action="{{ route('tarefas.update', [$materia->id, $conteudo->id, $tarefa->id]) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- CABEÇALHO --}}
                <div class="mb-5 flex items-start justify-between gap-5">
                    <div>
                        <div class="mb-3 flex items-center gap-2 text-xs text-slate-500">
                            <a href="{{ route('dashboard') }}" class="font-medium text-purple-600 hover:underline">
                                Painel inicial
                            </a>

                            <span>></span>

                            <a href="{{ route('materias.show', $materia->id) }}" class="font-medium text-purple-600 hover:underline">
                                {{ $materia->nome }}
                            </a>

                            <span>></span>

                            <span>{{ $conteudo->nome }}</span>

                            <span>></span>

                            <span>Editar tarefa</span>
                        </div>

                        <h1 class="text-3xl font-bold tracking-tight text-slate-950">
                            Editar tarefa
                        </h1>

                        <p class="mt-2 text-sm text-slate-500">
                            Atualize as informações da tarefa e acompanhe seu progresso.
                        </p>
                    </div>

                    <div class="flex items-center gap-3 pt-8">
                        <a href="{{ route('conteudos.show', [$materia->id, $conteudo->id]) }}"
                           class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-purple-600 shadow-sm transition hover:bg-purple-50">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="inline-flex items-center gap-2 rounded-xl bg-purple-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-purple-200 transition hover:bg-purple-700">
                            <i class="fa-regular fa-floppy-disk"></i>
                            Salvar alterações
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5 lg:grid-cols-[1.5fr_0.9fr]">

                    {{-- FORMULÁRIO --}}
                    <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        {{-- TÍTULO --}}
                        <div>
                            <label for="titulo" class="text-sm font-bold text-slate-900">
                                Título da tarefa <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="titulo"
                                name="titulo"
                                maxlength="80"
                                value="{{ old('titulo', $tarefa->titulo) }}"
                                placeholder="Ex.: Resolver lista de exercícios"
                                class="mt-2 w-full rounded-xl border-slate-200 px-3 py-2.5 text-sm text-slate-700 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            >

                            <div class="mt-1 flex justify-between text-xs text-slate-400">
                                <span>
                                    @error('titulo')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </span>

                                <span id="contadorTitulo">0/80</span>
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
                                maxlength="300"
                                rows="4"
                                placeholder="Descreva o que precisa ser feito nesta tarefa."
                                class="mt-2 w-full resize-none rounded-xl border-slate-200 px-3 py-2.5 text-sm text-slate-700 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            >{{ old('descricao', $tarefa->descricao) }}</textarea>

                            <div class="mt-1 flex justify-between text-xs text-slate-400">
                                <span>
                                    @error('descricao')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </span>

                                <span id="contadorDescricao">0/300</span>
                            </div>
                        </div>

                        {{-- MATÉRIA E CONTEÚDO --}}
                        <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">
                            <div>
                                <label class="text-sm font-bold text-slate-900">
                                    Matéria
                                </label>

                                <div class="mt-2 flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-700 shadow-sm">
                                    <i class="{{ $iconeMateria }}" style="color: {{ $corMateria }}"></i>
                                    <span class="font-medium">{{ $materia->nome }}</span>
                                </div>
                            </div>

                            <div>
                                <label class="text-sm font-bold text-slate-900">
                                    Conteúdo
                                </label>

                                <div class="mt-2 flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-700 shadow-sm">
                                    <i class="fa-regular fa-file-lines text-purple-600"></i>
                                    <span class="font-medium">{{ $conteudo->nome }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- DATA E PRIORIDADE --}}
                        <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">
                            <div>
                                <label for="data_entrega" class="text-sm font-bold text-slate-900">
                                    Data de entrega
                                </label>

                                <input
                                    type="date"
                                    id="data_entrega"
                                    name="data_entrega"
                                    value="{{ $dataSelecionada }}"
                                    class="mt-2 w-full rounded-xl border-slate-200 px-3 py-2.5 text-sm text-slate-700 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                >

                                @error('data_entrega')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="prioridade" class="text-sm font-bold text-slate-900">
                                    Prioridade <span class="text-red-500">*</span>
                                </label>

                                <select
                                    name="prioridade"
                                    id="prioridade"
                                    class="mt-2 w-full rounded-xl border-slate-200 px-3 py-2.5 text-sm text-slate-700 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                >
                                    @foreach($prioridadeLabels as $valor => $label)
                                        <option value="{{ $valor }}" @selected($prioridadeSelecionada === $valor)>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('prioridade')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- STATUS --}}
                        <div class="mt-5">
                            <p class="text-sm font-bold text-slate-900">
                                Status da tarefa <span class="text-red-500">*</span>
                            </p>

                            <div class="mt-2 grid grid-cols-1 gap-3 md:grid-cols-3">
                                <label class="cursor-pointer">
                                    <input
                                        type="radio"
                                        name="status"
                                        value="a_fazer"
                                        class="peer sr-only"
                                        @checked($statusSelecionado === 'a_fazer')
                                    >

                                    <span class="flex items-center justify-center gap-2 rounded-xl border border-purple-100 bg-purple-50 px-4 py-3 text-sm font-semibold text-purple-600 transition peer-checked:bg-purple-600 peer-checked:text-white peer-checked:shadow-lg peer-checked:shadow-purple-200">
                                        <i class="fa-regular fa-clipboard"></i>
                                        A fazer
                                    </span>
                                </label>

                                <label class="cursor-pointer">
                                    <input
                                        type="radio"
                                        name="status"
                                        value="fazendo"
                                        class="peer sr-only"
                                        @checked($statusSelecionado === 'fazendo')
                                    >

                                    <span class="flex items-center justify-center gap-2 rounded-xl border border-blue-100 bg-blue-50 px-4 py-3 text-sm font-semibold text-blue-600 transition peer-checked:bg-blue-600 peer-checked:text-white peer-checked:shadow-lg peer-checked:shadow-blue-200">
                                        <i class="fa-solid fa-rotate"></i>
                                        Fazendo
                                    </span>
                                </label>

                                <label class="cursor-pointer">
                                    <input
                                        type="radio"
                                        name="status"
                                        value="feito"
                                        class="peer sr-only"
                                        @checked($statusSelecionado === 'feito')
                                    >

                                    <span class="flex items-center justify-center gap-2 rounded-xl border border-green-100 bg-green-50 px-4 py-3 text-sm font-semibold text-green-600 transition peer-checked:bg-green-600 peer-checked:text-white peer-checked:shadow-lg peer-checked:shadow-green-200">
                                        <i class="fa-solid fa-check"></i>
                                        Feito
                                    </span>
                                </label>
                            </div>

                            @error('status')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </section>

                    {{-- LATERAL --}}
                    <aside class="space-y-5">

                        {{-- PRÉ-VISUALIZAÇÃO --}}
                        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                            <h2 class="text-base font-bold text-slate-900">
                                Pré-visualização
                            </h2>

                            <p class="mt-1 text-xs leading-5 text-slate-500">
                                A prévia muda de cor conforme o status escolhido.
                            </p>

                            <div id="previewContainer" class="mt-5 rounded-2xl border border-purple-100 bg-purple-50 p-4">
                                <div class="flex items-center gap-3">
                                    <div id="previewIconBox" class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-purple-600 text-xl text-white">
                                        <i id="previewIcon" class="fa-regular fa-clipboard"></i>
                                    </div>

                                    <div>
                                        <h3 id="previewStatusTitulo" class="text-lg font-bold text-slate-950">
                                            A fazer
                                        </h3>

                                        <p class="text-xs text-slate-500">
                                            Status atual da tarefa
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-5 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                                    <h3 id="previewTitulo" class="text-base font-bold text-slate-950">
                                        {{ old('titulo', $tarefa->titulo) ?: 'Título da tarefa' }}
                                    </h3>

                                    <p id="previewDescricao" class="mt-2 line-clamp-2 text-sm leading-5 text-slate-500">
                                        {{ old('descricao', $tarefa->descricao) ?: 'A descrição da tarefa aparecerá aqui.' }}
                                    </p>

                                    <div class="mt-4 flex flex-wrap gap-2">
                                        <span id="previewData" class="inline-flex items-center gap-2 rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-600">
                                            <i class="fa-regular fa-calendar"></i>
                                            Sem data
                                        </span>

                                        <span id="previewPrioridade" class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                            Prioridade: Média
                                        </span>
                                    </div>

                                    <div class="mt-4 border-t border-slate-100 pt-3">
                                        <span id="previewStatusBadge" class="inline-flex rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-600">
                                            A fazer
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </section>

                        {{-- DICAS --}}
                        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="mb-4 flex items-center gap-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-purple-100 text-purple-600">
                                    <i class="fa-regular fa-lightbulb text-sm"></i>
                                </div>

                                <h2 class="text-base font-bold text-purple-600">
                                    Dicas para editar tarefas
                                </h2>
                            </div>

                            <div class="space-y-4">
                                <div class="flex gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-purple-100 text-purple-600">
                                        <i class="fa-solid fa-list-check text-sm"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900">
                                            Atualize o título
                                        </h3>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            Deixe claro o que precisa ser feito.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                                        <i class="fa-solid fa-clock text-sm"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900">
                                            Revise a data
                                        </h3>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            A data ajuda a controlar melhor os prazos.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-green-100 text-green-600">
                                        <i class="fa-solid fa-check text-sm"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900">
                                            Mantenha o status atualizado
                                        </h3>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            Use o status para saber se a tarefa está pendente, em andamento ou concluída.
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
        const inputTitulo = document.getElementById('titulo');
        const inputDescricao = document.getElementById('descricao');
        const inputData = document.getElementById('data_entrega');
        const inputPrioridade = document.getElementById('prioridade');

        const contadorTitulo = document.getElementById('contadorTitulo');
        const contadorDescricao = document.getElementById('contadorDescricao');

        const previewContainer = document.getElementById('previewContainer');
        const previewIconBox = document.getElementById('previewIconBox');
        const previewIcon = document.getElementById('previewIcon');
        const previewStatusTitulo = document.getElementById('previewStatusTitulo');
        const previewStatusBadge = document.getElementById('previewStatusBadge');

        const previewTitulo = document.getElementById('previewTitulo');
        const previewDescricao = document.getElementById('previewDescricao');
        const previewData = document.getElementById('previewData');
        const previewPrioridade = document.getElementById('previewPrioridade');

        const statusConfig = {
            a_fazer: {
                texto: 'A fazer',
                icone: 'fa-regular fa-clipboard',
                container: 'mt-5 rounded-2xl border border-purple-100 bg-purple-50 p-4',
                iconBox: 'flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-purple-600 text-xl text-white',
                badge: 'inline-flex rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-600',
                data: 'inline-flex items-center gap-2 rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-600',
            },

            fazendo: {
                texto: 'Fazendo',
                icone: 'fa-solid fa-rotate',
                container: 'mt-5 rounded-2xl border border-blue-100 bg-blue-50 p-4',
                iconBox: 'flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-600 text-xl text-white',
                badge: 'inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-600',
                data: 'inline-flex items-center gap-2 rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-600',
            },

            feito: {
                texto: 'Feito',
                icone: 'fa-solid fa-check',
                container: 'mt-5 rounded-2xl border border-green-100 bg-green-50 p-4',
                iconBox: 'flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-green-600 text-xl text-white',
                badge: 'inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-600',
                data: 'inline-flex items-center gap-2 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-600',
            },
        };

        const prioridadeTexto = {
            alta: 'Alta',
            media: 'Média',
            baixa: 'Baixa',
        };

        function atualizarContadores() {
            contadorTitulo.textContent = `${inputTitulo.value.length}/80`;
            contadorDescricao.textContent = `${inputDescricao.value.length}/300`;
        }

        function atualizarTitulo() {
            previewTitulo.textContent = inputTitulo.value.trim() || 'Título da tarefa';
        }

        function atualizarDescricao() {
            previewDescricao.textContent = inputDescricao.value.trim() || 'A descrição da tarefa aparecerá aqui.';
        }

        function atualizarData() {
            if (!inputData.value) {
                previewData.innerHTML = '<i class="fa-regular fa-calendar"></i> Sem data';
                return;
            }

            const partes = inputData.value.split('-');
            const dataFormatada = `${partes[2]}/${partes[1]}/${partes[0]}`;

            previewData.innerHTML = `<i class="fa-regular fa-calendar"></i> ${dataFormatada}`;
        }

        function atualizarPrioridade() {
            const texto = prioridadeTexto[inputPrioridade.value] || 'Média';
            previewPrioridade.textContent = `Prioridade: ${texto}`;

            if (inputPrioridade.value === 'alta') {
                previewPrioridade.className = 'rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-600';
            } else if (inputPrioridade.value === 'baixa') {
                previewPrioridade.className = 'rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-600';
            } else {
                previewPrioridade.className = 'rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600';
            }
        }

        function atualizarStatus(status) {
            const config = statusConfig[status] || statusConfig.a_fazer;

            previewContainer.className = config.container;
            previewIconBox.className = config.iconBox;
            previewIcon.className = config.icone;
            previewStatusTitulo.textContent = config.texto;
            previewStatusBadge.textContent = config.texto;
            previewStatusBadge.className = config.badge;
            previewData.className = config.data;
        }

        inputTitulo.addEventListener('input', function () {
            atualizarContadores();
            atualizarTitulo();
        });

        inputDescricao.addEventListener('input', function () {
            atualizarContadores();
            atualizarDescricao();
        });

        inputData.addEventListener('change', atualizarData);
        inputPrioridade.addEventListener('change', atualizarPrioridade);

        document.querySelectorAll('input[name="status"]').forEach(function (input) {
            input.addEventListener('change', function () {
                atualizarStatus(input.value);
            });
        });

        atualizarContadores();
        atualizarTitulo();
        atualizarDescricao();
        atualizarData();
        atualizarPrioridade();

        const statusInicial = document.querySelector('input[name="status"]:checked');

        if (statusInicial) {
            atualizarStatus(statusInicial.value);
        }
    </script>
</x-app-layout>