<x-app-layout>
    <main class="min-h-screen bg-gray-50 px-8 py-8">
        <div class="max-w-7xl mx-auto">

            {{-- Breadcrumb --}}
            <div class="mb-6 flex items-center gap-2 text-sm text-slate-500">
                <i class="fa-solid fa-book-open text-purple-600"></i>

                <a href="{{ route('dashboard') }}" class="font-medium text-purple-600 hover:underline">
                    Todas as matérias
                </a>

                <span>></span>

                <i class="{{ $materia->icone_tema }} text-purple-600"></i>

                <a href="{{ route('materias.show', $materia) }}" class="font-medium text-purple-600 hover:underline">
                    {{ $materia->nome }}
                </a>

                <span>></span>

                <a href="{{ route('conteudos.show', [$materia, $conteudo]) }}" class="font-medium text-purple-600 hover:underline">
                    {{ $conteudo->nome }}
                </a>

                <span>></span>

                <p>Materiais</p>
            </div>

            {{-- CONTEÚDO --}}
            <div class="space-y-8">

                {{-- TOPO --}}
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold text-slate-950">
                            Materiais
                        </h1>

                        <p class="mt-3 max-w-2xl text-slate-500">
                            Veja os materiais cadastrados para este conteúdo.
                        </p>
                    </div>

                    <a href="{{ route('materiais.create', ['materia' => $materia->id, 'conteudo' => $conteudo->id]) }}"
                       class="inline-flex items-center gap-2 rounded-xl bg-purple-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-purple-200 transition hover:bg-purple-700">
                        <i class="fa-solid fa-plus"></i>
                        Adicionar material
                    </a>
                </div>

                {{-- CARDS DOS MATERIAIS --}}
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">

                    @forelse($materiais as $material)
                        @php
                            $tipo = strtolower($material->tipo ?? '');
                            $link = $material->link;

                            $youtubeEmbed = null;
                            $driveEmbed = null;

                            if ($link) {
                                if (str_contains($link, 'youtube.com/watch?v=')) {
                                    $videoId = explode('v=', $link)[1];
                                    $videoId = explode('&', $videoId)[0];
                                    $youtubeEmbed = 'https://www.youtube.com/embed/' . $videoId;
                                }

                                if (str_contains($link, 'youtu.be/')) {
                                    $videoId = explode('youtu.be/', $link)[1];
                                    $videoId = explode('?', $videoId)[0];
                                    $youtubeEmbed = 'https://www.youtube.com/embed/' . $videoId;
                                }

                                if (str_contains($link, 'drive.google.com/file/d/')) {
                                    $driveId = explode('/d/', $link)[1];
                                    $driveId = explode('/', $driveId)[0];
                                    $driveEmbed = 'https://drive.google.com/file/d/' . $driveId . '/preview';
                                }
                            }
                        @endphp

                        <div class="group overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">

                            {{-- PREVIEW --}}
                            <div class="relative mb-6 h-52 overflow-hidden rounded-2xl bg-purple-50">

                                <span class="absolute right-4 top-4 z-10 rounded-full bg-purple-600 px-4 py-2 text-xs font-semibold text-white shadow-md">
                                    {{ strtoupper($material->tipo ?? 'MATERIAL') }}
                                </span>

                                {{-- IMAGEM --}}
                                @if($tipo === 'imagem' && $link)
                                    <img
                                        src="{{ $link }}"
                                        alt="{{ $material->titulo }}"
                                        class="h-full w-full object-cover"
                                    >

                                {{-- PDF --}}
                                @elseif($tipo === 'pdf' && $link)
                                    @if($driveEmbed)
                                        <iframe
                                            src="{{ $driveEmbed }}"
                                            class="h-full w-full"
                                            allow="autoplay">
                                        </iframe>
                                    @else
                                        <iframe
                                            src="{{ $link }}"
                                            class="h-full w-full">
                                        </iframe>
                                    @endif

                                {{-- VÍDEO --}}
                                @elseif($tipo === 'video' && $link)
                                    @if($youtubeEmbed)
                                        <iframe
                                            src="{{ $youtubeEmbed }}"
                                            class="h-full w-full"
                                            allowfullscreen>
                                        </iframe>
                                    @else
                                        <video controls class="h-full w-full object-cover">
                                            <source src="{{ $link }}">
                                            Seu navegador não suporta vídeo.
                                        </video>
                                    @endif

                                {{-- LINK NORMAL --}}
                                @elseif($tipo === 'link' && $link)
                                    <div class="flex h-full flex-col items-center justify-center px-6 text-center">
                                        <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-purple-600 text-white">
                                            <i class="fa-solid fa-link text-2xl"></i>
                                        </div>

                                        <p class="line-clamp-2 text-sm font-medium text-slate-600">
                                            {{ $link }}
                                        </p>
                                    </div>

                                {{-- SEM PREVIEW --}}
                                @else
                                    <div class="flex h-full flex-col items-center justify-center text-purple-600">
                                        <i class="fa-regular fa-file-lines text-5xl"></i>

                                        <p class="mt-3 text-sm font-medium text-slate-500">
                                            Sem pré-visualização
                                        </p>
                                    </div>
                                @endif
                            </div>

                            {{-- INFORMAÇÕES --}}
                            <div>
                                <h3 class="text-xl font-bold leading-snug text-slate-900">
                                    {{ $material->titulo }}
                                </h3>

                                <p class="mt-3 line-clamp-2 text-sm leading-relaxed text-slate-500">
                                    {{ $material->descricao ?? 'Sem descrição cadastrada.' }}
                                </p>
                            </div>

                            {{-- AÇÕES --}}
                            <div class="mt-6 flex items-center justify-between border-t border-slate-200 pt-5">

                                <a href="{{ route('materiais.edit', ['materia' => $materia->id, 'conteudo' => $conteudo->id, 'material' => $material->id]) }}"
                                   class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 transition hover:text-purple-800">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    Editar
                                </a>

                                <div class="h-6 w-px bg-slate-200"></div>

                                @if($material->link)
                                    <a href="{{ $material->link }}"
                                       target="_blank"
                                       class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        Abrir material
                                    </a>

                                    <div class="h-6 w-px bg-slate-200"></div>
                                @endif

                                <form action="{{ route('materiais.destroy', [$materia, $conteudo, $material]) }}"
                                      method="POST"
                                      onsubmit="return confirm('Tem certeza que deseja excluir este material?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 transition hover:text-red-600">
                                        <i class="fa-regular fa-trash-can"></i>
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white p-10 text-center">
                            <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-purple-100 text-purple-600">
                                <i class="fa-regular fa-folder-open text-2xl"></i>
                            </div>

                            <h3 class="text-lg font-bold text-slate-900">
                                Nenhum material cadastrado
                            </h3>

                            <p class="mt-2 text-sm text-slate-500">
                                Adicione PDFs, vídeos, links ou textos para este conteúdo.
                            </p>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </main>
</x-app-layout>