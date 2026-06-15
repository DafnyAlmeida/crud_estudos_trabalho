<x-app-layout>
    @php
        $tipoSelecionado = old('tipo', 'video');

        $tipos = [
            'pdf' => 'PDF',
            'imagem' => 'Imagem',
            'video' => 'Vídeo',
            'link' => 'Link',
        ];

        $corMateria = $materia->cor_tema ?? '#7c3aed';
        $iconeMateria = $materia->icone_tema ?? 'fa-regular fa-file-lines';
    @endphp

    <main class="min-h-screen bg-white px-6 py-8 lg:px-10">
        <div class="mx-auto max-w-7xl">

            <form id="form-material" action="{{ route('materiais.store', [$materia->id, $conteudo->id]) }}" method="POST">
                @csrf

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

                            <span>Novo material</span>
                        </div>

                        <h1 class="text-3xl font-bold tracking-tight text-slate-950">
                            Novo material
                        </h1>

                        <p class="mt-2 text-sm text-slate-500">
                            Adicione links, vídeos, imagens ou PDFs para complementar seus estudos.
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
                            Salvar material
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5 lg:grid-cols-[1.4fr_1fr]">

                    {{-- FORMULÁRIO --}}
                    <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        {{-- TÍTULO --}}
                        <div>
                            <label for="titulo" class="text-sm font-bold text-slate-900">
                                Título do material <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="titulo"
                                name="titulo"
                                maxlength="80"
                                value="{{ old('titulo') }}"
                                placeholder="Ex.: Aula de função do 1º grau"
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

                        {{-- LINK --}}
                        <div class="mt-5">
                            <label for="link" class="text-sm font-bold text-slate-900">
                                Link do material <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="link"
                                name="link"
                                value="{{ old('link') }}"
                                placeholder="Cole aqui o link do vídeo, PDF, imagem ou site"
                                class="mt-2 w-full rounded-xl border-slate-200 px-3 py-2.5 text-sm text-slate-700 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            >

                            @error('link')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
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
                                placeholder="Descreva brevemente o que esse material ensina."
                                class="mt-2 w-full resize-none rounded-xl border-slate-200 px-3 py-2.5 text-sm text-slate-700 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            >{{ old('descricao') }}</textarea>

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

                        {{-- TIPO --}}
                        <div class="mt-5">
                            <p class="text-sm font-bold text-slate-900">
                                Tipo do material <span class="text-red-500">*</span>
                            </p>

                            <div class="mt-2 grid grid-cols-2 gap-3 md:grid-cols-4">

                                <label class="cursor-pointer">
                                    <input
                                        type="radio"
                                        name="tipo"
                                        value="video"
                                        class="peer sr-only"
                                        @checked($tipoSelecionado === 'video')
                                    >

                                    <span class="flex items-center justify-center gap-2 rounded-xl border border-red-100 bg-red-50 px-4 py-3 text-sm font-semibold text-red-600 transition peer-checked:bg-red-600 peer-checked:text-white peer-checked:shadow-lg peer-checked:shadow-red-200">
                                        <i class="fa-brands fa-youtube"></i>
                                        Vídeo
                                    </span>
                                </label>

                                <label class="cursor-pointer">
                                    <input
                                        type="radio"
                                        name="tipo"
                                        value="pdf"
                                        class="peer sr-only"
                                        @checked($tipoSelecionado === 'pdf')
                                    >

                                    <span class="flex items-center justify-center gap-2 rounded-xl border border-purple-100 bg-purple-50 px-4 py-3 text-sm font-semibold text-purple-600 transition peer-checked:bg-purple-600 peer-checked:text-white peer-checked:shadow-lg peer-checked:shadow-purple-200">
                                        <i class="fa-regular fa-file-pdf"></i>
                                        PDF
                                    </span>
                                </label>

                                <label class="cursor-pointer">
                                    <input
                                        type="radio"
                                        name="tipo"
                                        value="imagem"
                                        class="peer sr-only"
                                        @checked($tipoSelecionado === 'imagem')
                                    >

                                    <span class="flex items-center justify-center gap-2 rounded-xl border border-green-100 bg-green-50 px-4 py-3 text-sm font-semibold text-green-600 transition peer-checked:bg-green-600 peer-checked:text-white peer-checked:shadow-lg peer-checked:shadow-green-200">
                                        <i class="fa-regular fa-image"></i>
                                        Imagem
                                    </span>
                                </label>

                                <label class="cursor-pointer">
                                    <input
                                        type="radio"
                                        name="tipo"
                                        value="link"
                                        class="peer sr-only"
                                        @checked($tipoSelecionado === 'link')
                                    >

                                    <span class="flex items-center justify-center gap-2 rounded-xl border border-blue-100 bg-blue-50 px-4 py-3 text-sm font-semibold text-blue-600 transition peer-checked:bg-blue-600 peer-checked:text-white peer-checked:shadow-lg peer-checked:shadow-blue-200">
                                        <i class="fa-solid fa-link"></i>
                                        Link
                                    </span>
                                </label>
                            </div>

                            @error('tipo')
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
                                Veja como o material ficará no card.
                            </p>

                            <div class="mt-5 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                                <div id="previewMidia" class="flex h-56 items-center justify-center overflow-hidden rounded-2xl bg-slate-100">
                                    <div class="text-center">
                                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-red-100 text-3xl text-red-600">
                                            <i class="fa-brands fa-youtube"></i>
                                        </div>

                                        <p class="mt-3 text-sm font-semibold text-slate-700">
                                            Prévia do material
                                        </p>

                                        <p class="mt-1 text-xs text-slate-500">
                                            Cole um link para visualizar
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <div class="mb-3">
                                        <span id="previewTipo" class="rounded-full bg-red-100 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-red-600">
                                            Vídeo
                                        </span>
                                    </div>

                                    <h3 id="previewTitulo" class="text-xl font-bold text-slate-950">
                                        Título do material
                                    </h3>

                                    <p id="previewDescricao" class="mt-4 text-sm leading-6 text-slate-500">
                                        A descrição do material aparecerá aqui.
                                    </p>
                                </div>

                                <div class="mt-8 border-t border-slate-200 pt-5">
                                    <div class="grid grid-cols-3 divide-x divide-slate-200 text-sm font-semibold">
                                        <button type="button" class="flex items-center justify-center gap-2 text-purple-600">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                            Editar
                                        </button>

                                        <button type="button" class="flex items-center justify-center gap-2 text-slate-700">
                                            <i class="fa-solid fa-up-right-from-square"></i>
                                            Abrir
                                        </button>

                                        <button type="button" class="flex items-center justify-center gap-2 text-red-600">
                                            <i class="fa-regular fa-trash-can"></i>
                                            Excluir
                                        </button>
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
                                    Dicas para materiais
                                </h2>
                            </div>

                            <div class="space-y-4">
                                <div class="flex gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600">
                                        <i class="fa-brands fa-youtube text-sm"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900">
                                            Use vídeos úteis
                                        </h3>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            Vídeos do YouTube podem aparecer direto na prévia.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-purple-100 text-purple-600">
                                        <i class="fa-regular fa-file-pdf text-sm"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900">
                                            Organize PDFs
                                        </h3>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            Apostilas e listas podem ficar salvas como materiais.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                                        <i class="fa-solid fa-link text-sm"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-bold text-slate-900">
                                            Salve links importantes
                                        </h3>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            Use links para sites, exercícios, simulados ou documentos.
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
        const inputLink = document.getElementById('link');

        const contadorTitulo = document.getElementById('contadorTitulo');
        const contadorDescricao = document.getElementById('contadorDescricao');

        const previewMidia = document.getElementById('previewMidia');
        const previewTipo = document.getElementById('previewTipo');
        const previewTitulo = document.getElementById('previewTitulo');
        const previewDescricao = document.getElementById('previewDescricao');

        const tipoConfig = {
            video: {
                texto: 'Vídeo',
                cor: 'red',
                icone: 'fa-brands fa-youtube',
                titulo: 'Prévia do vídeo',
                descricao: 'Cole um link do YouTube para visualizar',
            },

            pdf: {
                texto: 'PDF',
                cor: 'purple',
                icone: 'fa-regular fa-file-pdf',
                titulo: 'Prévia do PDF',
                descricao: 'O PDF será aberto pelo botão do material',
            },

            imagem: {
                texto: 'Imagem',
                cor: 'green',
                icone: 'fa-regular fa-image',
                titulo: 'Prévia da imagem',
                descricao: 'Cole o link de uma imagem para visualizar',
            },

            link: {
                texto: 'Link',
                cor: 'blue',
                icone: 'fa-solid fa-link',
                titulo: 'Prévia do link',
                descricao: 'O link será aberto pelo botão do material',
            },
        };

        function pegarTipoSelecionado() {
            const selecionado = document.querySelector('input[name="tipo"]:checked');
            return selecionado ? selecionado.value : 'video';
        }

        function atualizarContadores() {
            contadorTitulo.textContent = `${inputTitulo.value.length}/80`;
            contadorDescricao.textContent = `${inputDescricao.value.length}/300`;
        }

        function atualizarTitulo() {
            previewTitulo.textContent = inputTitulo.value.trim() || 'Título do material';
        }

        function atualizarDescricao() {
            previewDescricao.textContent = inputDescricao.value.trim() || 'A descrição do material aparecerá aqui.';
        }

        function gerarYoutubeEmbed(link) {
            let videoId = '';

            if (link.includes('youtube.com/watch?v=')) {
                videoId = link.split('v=')[1].split('&')[0];
            }

            if (link.includes('youtu.be/')) {
                videoId = link.split('youtu.be/')[1].split('?')[0];
            }

            if (link.includes('youtube.com/embed/')) {
                videoId = link.split('embed/')[1].split('?')[0];
            }

            return videoId ? `https://www.youtube.com/embed/${videoId}` : '';
        }

        function placeholderMaterial(config) {
            const cor = config.cor;

            previewMidia.innerHTML = `
                <div class="text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-${cor}-100 text-3xl text-${cor}-600">
                        <i class="${config.icone}"></i>
                    </div>

                    <p class="mt-3 text-sm font-semibold text-slate-700">
                        ${config.titulo}
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        ${config.descricao}
                    </p>
                </div>
            `;
        }

        function atualizarTipo() {
            const tipo = pegarTipoSelecionado();
            const config = tipoConfig[tipo] || tipoConfig.video;

            previewTipo.textContent = config.texto;

            if (tipo === 'video') {
                previewTipo.className = 'rounded-full bg-red-100 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-red-600';
            } else if (tipo === 'pdf') {
                previewTipo.className = 'rounded-full bg-purple-100 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-purple-600';
            } else if (tipo === 'imagem') {
                previewTipo.className = 'rounded-full bg-green-100 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-green-600';
            } else {
                previewTipo.className = 'rounded-full bg-blue-100 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-blue-600';
            }

            atualizarMidia();
        }

        function atualizarMidia() {
            const tipo = pegarTipoSelecionado();
            const link = inputLink.value.trim();
            const config = tipoConfig[tipo] || tipoConfig.video;

            previewMidia.className = 'flex h-56 items-center justify-center overflow-hidden rounded-2xl bg-slate-100';

            if (!link) {
                placeholderMaterial(config);
                return;
            }

            if (tipo === 'video') {
                const embed = gerarYoutubeEmbed(link);

                if (embed) {
                    previewMidia.innerHTML = `
                        <iframe
                            src="${embed}"
                            class="h-full w-full rounded-2xl"
                            title="Prévia do vídeo"
                            frameborder="0"
                            allowfullscreen>
                        </iframe>
                    `;
                } else {
                    placeholderMaterial(config);
                }

                return;
            }

            if (tipo === 'imagem') {
                previewMidia.innerHTML = `
                    <img
                        src="${link}"
                        alt="Prévia do material"
                        class="h-full w-full rounded-2xl object-cover"
                        onerror="this.parentElement.innerHTML = '<div class=&quot;text-center text-sm text-slate-500&quot;>Não foi possível carregar a imagem.</div>'"
                    >
                `;

                return;
            }

            placeholderMaterial(config);
        }

        inputTitulo.addEventListener('input', function () {
            atualizarContadores();
            atualizarTitulo();
        });

        inputDescricao.addEventListener('input', function () {
            atualizarContadores();
            atualizarDescricao();
        });

        inputLink.addEventListener('input', atualizarMidia);

        document.querySelectorAll('input[name="tipo"]').forEach(function (input) {
            input.addEventListener('change', atualizarTipo);
        });

        atualizarContadores();
        atualizarTitulo();
        atualizarDescricao();
        atualizarTipo();
    </script>
</x-app-layout>