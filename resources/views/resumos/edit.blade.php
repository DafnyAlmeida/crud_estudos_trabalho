<x-app-layout>
    @php
        $corMateria = $materia->cor_tema ?? '#7c3aed';
        $iconeMateria = $materia->icone_tema ?? 'fa-regular fa-file-lines';

        $camposResumo = [
            [
                'id' => 'conceito',
                'name' => 'conceito',
                'label' => 'Conceito principal',
                'preview' => 'Conceitos principais',
                'icon' => 'fa-regular fa-lightbulb',
                'placeholder' => 'Explique o conceito central deste conteúdo.',
            ],
            [
                'id' => 'caracteristicas',
                'name' => 'caracteristicas',
                'label' => 'Principais características',
                'preview' => 'Características principais',
                'icon' => 'fa-regular fa-star',
                'placeholder' => 'Liste as características mais importantes.',
            ],
            [
                'id' => 'tipos_classificacoes',
                'name' => 'tipos_classificacoes',
                'label' => 'Tipos ou classificações',
                'preview' => 'Classificações',
                'icon' => 'fa-solid fa-layer-group',
                'placeholder' => 'Informe tipos, divisões ou classificações.',
            ],
            [
                'id' => 'funcoes',
                'name' => 'funcoes',
                'label' => 'Funções',
                'preview' => 'Funções',
                'icon' => 'fa-solid fa-list-check',
                'placeholder' => 'Explique as funções ou aplicações do assunto.',
            ],
            [
                'id' => 'exemplos',
                'name' => 'exemplos',
                'label' => 'Exemplos',
                'preview' => 'Exemplos',
                'icon' => 'fa-regular fa-comments',
                'placeholder' => 'Coloque exemplos para facilitar a revisão.',
            ],
            [
                'id' => 'informacoes_importantes',
                'name' => 'informacoes_importantes',
                'label' => 'Informações importantes',
                'preview' => 'Informações importantes',
                'icon' => 'fa-solid fa-shield-halved',
                'placeholder' => 'Adicione observações, fórmulas ou pontos essenciais.',
            ],
            [
                'id' => 'duvidas',
                'name' => 'duvidas',
                'label' => 'Dúvidas ou erros',
                'preview' => 'Dúvidas e erros',
                'icon' => 'fa-regular fa-circle-question',
                'placeholder' => 'Anote dúvidas, erros comuns ou pontos difíceis.',
            ],
            [
                'id' => 'revisao_rapida',
                'name' => 'revisao_rapida',
                'label' => 'Revisão rápida',
                'preview' => 'Revisão rápida',
                'icon' => 'fa-solid fa-bolt',
                'placeholder' => 'Escreva um resumo curto para revisar rapidamente.',
            ],
        ];
    @endphp

    <main class="min-h-screen bg-white px-6 py-8 lg:px-10">
        <div class="mx-auto max-w-7xl">

            <form id="form-resumo" action="{{ route('resumos.update', [$materia->id, $conteudo->id, $resumo->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="area" value="{{ old('area', $resumo->area ?? $conteudo->area ?? '') }}">

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

                            <span>Editar resumo</span>
                        </div>

                        <h1 class="text-3xl font-bold tracking-tight text-slate-950">
                            Editar resumo
                        </h1>

                        <p class="mt-2 text-sm text-slate-500">
                            Atualize as informações do resumo e mantenha sua revisão organizada.
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

                {{-- FORMULÁRIO --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    {{-- TÍTULO --}}
                    <div>
                        <label for="nome" class="text-sm font-bold text-slate-900">
                            Título do resumo <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            id="nome"
                            name="nome"
                            maxlength="100"
                            value="{{ old('nome', $resumo->nome) }}"
                            placeholder="Ex.: Resumo sobre dinâmica"
                            class="mt-2 w-full rounded-xl border-slate-200 px-3 py-2.5 text-sm text-slate-700 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                        >

                        <div class="mt-1 flex justify-between text-xs text-slate-400">
                            <span>
                                @error('nome')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </span>

                            <span id="contadorNome">0/100</span>
                        </div>
                    </div>

                    {{-- INFORMAÇÕES FIXAS --}}
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

                    {{-- CAMPOS DO RESUMO --}}
                    <div class="mt-6 grid grid-cols-1 gap-5 md:grid-cols-2">
                        @foreach($camposResumo as $campo)
                            <div>
                                <label for="{{ $campo['id'] }}" class="text-sm font-bold text-slate-900">
                                    {{ $campo['label'] }}
                                </label>

                                <textarea
                                    name="{{ $campo['name'] }}"
                                    id="{{ $campo['id'] }}"
                                    rows="4"
                                    maxlength="500"
                                    placeholder="{{ $campo['placeholder'] }}"
                                    class="campo-resumo mt-2 w-full resize-none rounded-xl border-slate-200 px-3 py-2.5 text-sm text-slate-700 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                >{{ old($campo['name'], $resumo->{$campo['name']}) }}</textarea>

                                <div class="mt-1 flex justify-between text-xs text-slate-400">
                                    <span>
                                        @error($campo['name'])
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </span>

                                    <span id="contador_{{ $campo['id'] }}">0/500</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- PRÉ-VISUALIZAÇÃO --}}
                <section class="mt-6 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                    <div class="mb-6 flex items-center justify-between gap-4">
                        <div>
                            <h2 id="previewNome" class="text-xl font-semibold text-slate-950">
                                {{ old('nome', $resumo->nome) ?: 'Resumo sem título' }}
                            </h2>

                            <p class="mt-1 text-xs text-slate-500">
                                Pré-visualização do resumo editado.
                            </p>
                        </div>

                        <div class="flex items-center gap-2">
                            <button type="button"
                                    class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2 text-xs font-medium text-purple-600 shadow-sm">
                                <i class="fa-regular fa-pen-to-square"></i>
                                Editar
                            </button>

                            <button type="button"
                                    class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2 text-xs font-medium text-red-600 shadow-sm">
                                <i class="fa-regular fa-trash-can"></i>
                                Excluir
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        @foreach($camposResumo as $campo)
                            <div class="rounded-xl border border-slate-200 bg-white p-4">
                                <div class="flex gap-4">
                                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-purple-100 text-xl text-purple-600">
                                        <i class="{{ $campo['icon'] }}"></i>
                                    </div>

                                    <div class="min-w-0">
                                        <h3 class="text-base font-semibold text-slate-950">
                                            {{ $campo['preview'] }}
                                        </h3>

                                        <p
                                            id="preview_{{ $campo['id'] }}"
                                            class="mt-1 whitespace-pre-line text-sm leading-6 text-slate-500"
                                        >
                                            {{ old($campo['name'], $resumo->{$campo['name']}) ?: 'Nada informado ainda.' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </form>
        </div>
    </main>

    <script>
        const inputNome = document.getElementById('nome');
        const contadorNome = document.getElementById('contadorNome');
        const previewNome = document.getElementById('previewNome');

        const campos = [
            'conceito',
            'caracteristicas',
            'tipos_classificacoes',
            'funcoes',
            'exemplos',
            'informacoes_importantes',
            'duvidas',
            'revisao_rapida',
        ];

        function atualizarNome() {
            previewNome.textContent = inputNome.value.trim() || 'Resumo sem título';
            contadorNome.textContent = `${inputNome.value.length}/100`;
        }

        function atualizarCampo(id) {
            const campo = document.getElementById(id);
            const preview = document.getElementById(`preview_${id}`);
            const contador = document.getElementById(`contador_${id}`);

            preview.textContent = campo.value.trim() || 'Nada informado ainda.';
            contador.textContent = `${campo.value.length}/500`;
        }

        inputNome.addEventListener('input', atualizarNome);

        campos.forEach(function (id) {
            const campo = document.getElementById(id);

            campo.addEventListener('input', function () {
                atualizarCampo(id);
            });

            atualizarCampo(id);
        });

        atualizarNome();
    </script>
</x-app-layout>