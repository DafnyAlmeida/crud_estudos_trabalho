<x-app-layout>
    @php
        $statusSelecionado = old('status', $conteudo->status ?? 'nao_iniciado');
        $nivelSelecionado = old('nivel_dificuldade', $conteudo->nivel_dificuldade ?? 'intermediario');
        $areaSelecionada = old('area', $conteudo->area ?? '');
        $prioridadeSelecionada = old('prioridade', $conteudo->prioridade ?? 'media');

        $corMateria = $materia->cor_tema ?? '#7c3aed';
        $iconeMateria = $materia->icone_tema ?? 'fa-regular fa-file-lines';

        $areas = [
            'Álgebra',
            'Geometria',
            'Funções',
            'Logaritmos',
            'Trigonometria',
            'Estatística',
            'Morfologia',
            'Sintaxe',
            'Literatura',
            'Redação',
            'Gramática',
        ];

        $statusLabels = [
            'nao_iniciado' => 'Não iniciado',
            'iniciado' => 'Iniciado',
            'em_andamento' => 'Em andamento',
            'concluido' => 'Concluído',
        ];

        $nivelLabels = [
            'basico' => 'Básico',
            'intermediario' => 'Intermediário',
            'avancado' => 'Avançado',
        ];
    @endphp

    <main class="min-h-screen bg-gray-50 px-5 py-5">
        <div class="mx-auto max-w-6xl">

            <form id="form-conteudo" action="{{ route('conteudos.update', [$materia->id, $conteudo->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="prioridade" value="{{ $prioridadeSelecionada }}">

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

                            <span>Conteúdos</span>

                            <span>></span>

                            <span>Editar conteúdo</span>
                        </div>

                        <h1 class="text-3xl font-bold tracking-tight text-slate-950">
                            Editar conteúdo
                        </h1>

                        <p class="mt-2 text-sm text-slate-500">
                            Altere as informações do conteúdo e mantenha seus estudos organizados.
                        </p>
                    </div>

                    <div class="flex items-center gap-3 pt-8">
                        <a href="{{ route('materias.show', $materia->id) }}"
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
                            <label for="nome" class="text-sm font-bold text-slate-900">
                                Título do conteúdo <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="nome"
                                name="nome"
                                maxlength="80"
                                value="{{ old('nome', $conteudo->nome) }}"
                                placeholder="Ex.: Orações coordenadas"
                                class="mt-2 w-full rounded-xl border-slate-200 px-3 py-2.5 text-sm text-slate-700 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            >

                            <div class="mt-1 flex justify-between text-xs text-slate-400">
                                <span>
                                    @error('nome')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </span>

                                <span id="contadorNome">0/80</span>
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
                                placeholder="Descreva o que este conteúdo aborda e quais pontos principais você irá estudar."
                                class="mt-2 w-full resize-none rounded-xl border-slate-200 px-3 py-2.5 text-sm text-slate-700 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            >{{ old('descricao', $conteudo->descricao) }}</textarea>

                            <div class="mt-1 flex justify-between text-xs text-slate-400">
                                <span>
                                    @error('descricao')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </span>

                                <span id="contadorDescricao">0/300</span>
                            </div>
                        </div>

                        {{-- MATÉRIA E ÁREA --}}
                        <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">

                            <div>
                                <label class="text-sm font-bold text-slate-900">
                                    Matéria <span class="text-red-500">*</span>
                                </label>

                                <div class="mt-2 flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-700 shadow-sm">
                                    <i class="{{ $iconeMateria }}" style="color: {{ $corMateria }}"></i>
                                    <span class="font-medium">{{ $materia->nome }}</span>
                                </div>
                            </div>

                            <div>
                                <label for="area" class="text-sm font-bold text-slate-900">
                                    Área <span class="text-red-500">*</span>
                                </label>

                                <select
                                    name="area"
                                    id="area"
                                    class="mt-2 w-full rounded-xl border-slate-200 px-3 py-2.5 text-sm text-slate-700 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                >
                                    <option value="">Selecione a área</option>

                                    @foreach($areas as $area)
                                        <option value="{{ $area }}" @selected($areaSelecionada === $area)>
                                            {{ $area }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('area')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- NÍVEL E STATUS --}}
                        <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-[0.8fr_1.2fr]">

                            <div>
                                <label for="nivel_dificuldade" class="text-sm font-bold text-slate-900">
                                    Nível de dificuldade
                                </label>

                                <select
                                    name="nivel_dificuldade"
                                    id="nivel_dificuldade"
                                    class="mt-2 w-full rounded-xl border-slate-200 px-3 py-2.5 text-sm text-slate-700 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                >
                                    @foreach($nivelLabels as $valor => $label)
                                        <option value="{{ $valor }}" @selected($nivelSelecionado === $valor)>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('nivel_dificuldade')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <p class="text-sm font-bold text-slate-900">
                                    Status do estudo <span class="text-red-500">*</span>
                                </p>

                                <div class="mt-2 grid grid-cols-2 overflow-hidden rounded-xl border border-slate-200 bg-white p-1 md:grid-cols-4">
                                    @foreach($statusLabels as $valor => $label)
                                        <label class="cursor-pointer">
                                            <input
                                                type="radio"
                                                name="status"
                                                value="{{ $valor }}"
                                                class="peer sr-only"
                                                @checked($statusSelecionado === $valor)
                                            >

                                            <span class="flex items-center justify-center gap-2 rounded-lg px-2 py-2 text-xs font-semibold text-slate-500 transition peer-checked:bg-purple-100 peer-checked:text-purple-600">
                                                <i class="fa-regular fa-circle"></i>
                                                {{ $label }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>

                                @error('status')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
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
                                Veja como este conteúdo aparecerá no painel após salvar as alterações.
                            </p>

                            <div class="mt-5 rounded-2xl border border-slate-200 bg-white p-4">
                                <div class="flex gap-4">
                                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-purple-100 text-2xl text-purple-600">
                                        <i class="fa-regular fa-file-lines"></i>
                                    </div>

                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-start justify-between gap-3">
                                            <h3 id="previewNome" class="truncate text-base font-bold text-slate-950">
                                                {{ old('nome', $conteudo->nome) ?: 'Nome do conteúdo' }}
                                            </h3>

                                            <span id="previewStatus" class="shrink-0 rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-600">
                                                {{ $statusLabels[$statusSelecionado] ?? 'Não iniciado' }}
                                            </span>
                                        </div>

                                        <div class="mt-3 flex flex-wrap items-center gap-2">
                                            <span id="previewArea" class="rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-600">
                                                {{ $areaSelecionada ?: 'Área' }}
                                            </span>

                                            <span id="previewNivel" class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                                {{ $nivelLabels[$nivelSelecionado] ?? 'Intermediário' }}
                                            </span>
                                        </div>

                                        <p id="previewDescricao" class="mt-3 line-clamp-2 text-xs leading-5 text-slate-500">
                                            {{ old('descricao', $conteudo->descricao) ?: 'A descrição do conteúdo aparecerá aqui.' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-3 text-xs text-slate-500">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-regular fa-clipboard"></i>
                                        <span>{{ $conteudo->tarefas->count() ?? 0 }} tarefas</span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>Editando conteúdo</span>
                                    </div>
                                </div>
                            </div>

                            <p class="mt-4 text-xs leading-5 text-slate-500">
                                Essa é apenas uma prévia. As alterações só serão aplicadas depois de salvar.
                            </p>
                        </section>

                        {{-- DICAS --}}
                        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                            <div class="mb-4 flex items-center gap-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-purple-100 text-purple-600">
                                    <i class="fa-regular fa-lightbulb text-sm"></i>
                                </div>

                                <h2 class="text-base font-bold text-purple-600">
                                    Dicas para editar conteúdos
                                </h2>
                            </div>

                            <div class="space-y-4">
                                <div class="flex gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-purple-100 text-purple-600">
                                        <i class="fa-solid fa-pen text-sm"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900">
                                            Atualize o título
                                        </h3>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            Use um nome claro para encontrar o conteúdo com facilidade.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-green-100 text-green-600">
                                        <i class="fa-solid fa-tag text-sm"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900">
                                            Revise a área
                                        </h3>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            Manter a área correta ajuda na organização dos estudos.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                                        <i class="fa-solid fa-chart-line text-sm"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900">
                                            Ajuste o progresso
                                        </h3>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            O status mostra em que etapa esse conteúdo está.
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
        const inputArea = document.getElementById('area');
        const inputNivel = document.getElementById('nivel_dificuldade');

        const contadorNome = document.getElementById('contadorNome');
        const contadorDescricao = document.getElementById('contadorDescricao');

        const previewNome = document.getElementById('previewNome');
        const previewDescricao = document.getElementById('previewDescricao');
        const previewArea = document.getElementById('previewArea');
        const previewNivel = document.getElementById('previewNivel');
        const previewStatus = document.getElementById('previewStatus');

        const statusTexto = {
            'nao_iniciado': 'Não iniciado',
            'iniciado': 'Iniciado',
            'em_andamento': 'Em andamento',
            'concluido': 'Concluído',
        };

        const nivelTexto = {
            'basico': 'Básico',
            'intermediario': 'Intermediário',
            'avancado': 'Avançado',
        };

        function atualizarContadores() {
            contadorNome.textContent = `${inputNome.value.length}/80`;
            contadorDescricao.textContent = `${inputDescricao.value.length}/300`;
        }

        function atualizarNome() {
            previewNome.textContent = inputNome.value.trim() || 'Nome do conteúdo';
        }

        function atualizarDescricao() {
            previewDescricao.textContent = inputDescricao.value.trim() || 'A descrição do conteúdo aparecerá aqui.';
        }

        function atualizarArea() {
            previewArea.textContent = inputArea.value || 'Área';
        }

        function atualizarNivel() {
            previewNivel.textContent = nivelTexto[inputNivel.value] || 'Intermediário';
        }

        function atualizarStatus(status) {
            previewStatus.textContent = statusTexto[status] || 'Não iniciado';

            if (status === 'concluido') {
                previewStatus.className = 'shrink-0 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-600';
            } else if (status === 'em_andamento') {
                previewStatus.className = 'shrink-0 rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-600';
            } else if (status === 'iniciado') {
                previewStatus.className = 'shrink-0 rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-600';
            } else {
                previewStatus.className = 'shrink-0 rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-600';
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

        inputArea.addEventListener('change', atualizarArea);
        inputNivel.addEventListener('change', atualizarNivel);

        document.querySelectorAll('input[name="status"]').forEach(function (input) {
            input.addEventListener('change', function () {
                atualizarStatus(input.value);
            });
        });

        atualizarContadores();
        atualizarNome();
        atualizarDescricao();
        atualizarArea();
        atualizarNivel();

        const statusInicial = document.querySelector('input[name="status"]:checked');

        if (statusInicial) {
            atualizarStatus(statusInicial.value);
        }
    </script>
</x-app-layout>