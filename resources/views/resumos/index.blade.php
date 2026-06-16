<x-app-layout>
    <main class="min-h-screen bg-gray-50 px-6 py-8 lg:px-10">
        <div class="mx-auto max-w-7xl">

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

                <p>Resumos</p>
            </div>

            {{-- Cabeçalho --}}
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-slate-950">
                        Resumos
                    </h1>

                    <p class="mt-3 max-w-2xl text-slate-500">
                        Veja os resumos cadastrados para o conteúdo {{ $conteudo->nome }}.
                    </p>
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('conteudos.show', [$materia, $conteudo]) }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-purple-100 bg-white px-5 py-3 text-sm font-bold text-purple-600 shadow-sm transition hover:border-purple-200 hover:bg-purple-50">
                        <i class="fa-solid fa-arrow-left"></i>
                        Voltar
                    </a>
                    <a href="{{ route('resumos.create', [$materia, $conteudo]) }}"
                       class="inline-flex items-center gap-2 rounded-lg bg-purple-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-purple-700">
                        <i class="fa-solid fa-plus"></i>
                        Adicionar resumo
                    </a>
                </div>
            </div>

            <div class="space-y-5">
                @forelse($resumos as $resumo)
                    @php
                        $cards = [
                            [
                                'titulo' => 'Conceitos principais',
                                'campo' => 'conceito',
                                'icone' => 'fa-regular fa-lightbulb',
                            ],
                            [
                                'titulo' => 'Características principais',
                                'campo' => 'caracteristicas',
                                'icone' => 'fa-regular fa-star',
                            ],
                            [
                                'titulo' => 'Classificações',
                                'campo' => 'tipos_classificacoes',
                                'icone' => 'fa-solid fa-layer-group',
                            ],
                            [
                                'titulo' => 'Funções',
                                'campo' => 'funcoes',
                                'icone' => 'fa-solid fa-list-check',
                            ],
                            [
                                'titulo' => 'Exemplos',
                                'campo' => 'exemplos',
                                'icone' => 'fa-regular fa-comments',
                            ],
                            [
                                'titulo' => 'Informações importantes',
                                'campo' => 'informacoes_importantes',
                                'icone' => 'fa-solid fa-shield-halved',
                            ],
                            [
                                'titulo' => 'Dúvidas e erros',
                                'campo' => 'duvidas',
                                'icone' => 'fa-regular fa-circle-question',
                            ],
                            [
                                'titulo' => 'Revisão rápida',
                                'campo' => 'revisao_rapida',
                                'icone' => 'fa-solid fa-bolt',
                            ],
                        ];
                    @endphp

                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                        {{-- Título --}}
                        <div class="mb-6 flex items-center justify-between gap-4">
                            <h2 class="text-xl font-bold text-slate-900">
                                Resumo sobre {{ $resumo->nome }}
                            </h2>

                            <div class="flex items-center gap-3">
                                <a href="{{ route('resumos.edit', [$materia, $conteudo, $resumo]) }}"
                                   class="inline-flex items-center gap-2 rounded-lg border border-slate-200 px-4 py-2.5 text-sm font-medium text-purple-600 transition hover:bg-purple-50">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    Editar
                                </a>

                                <form action="{{ route('resumos.destroy', [$materia, $conteudo, $resumo]) }}"
                                      method="POST"
                                      onsubmit="return confirm('Tem certeza que deseja excluir este resumo?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="inline-flex items-center gap-2 rounded-lg border border-slate-200 px-4 py-2.5 text-sm font-medium text-red-600 transition hover:bg-red-50">
                                        <i class="fa-regular fa-trash-can"></i>
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Cards --}}
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            @foreach($cards as $card)
                                <div class="flex gap-4 rounded-xl border border-slate-200 bg-white p-5 transition hover:shadow-sm">

                                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-purple-100 text-xl text-purple-600">
                                        <i class="{{ $card['icone'] }}"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-base font-bold text-slate-900">
                                            {{ $card['titulo'] }}
                                        </h3>

                                        <p class="mt-1 text-[15px] text-slate-500">
                                            {{ $resumo->{$card['campo']} ?: 'Não informado.' }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="col-span-full rounded-2xl border border-dashed border-slate-200 p-8 text-center">
                        <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-xl bg-purple-100 text-purple-600">
                            <i class="fa-regular fa-folder-open text-xl"></i>
                        </div>

                        <h3 class="font-semibold text-slate-900">
                            Nenhum resumo cadastrado
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Adicione textos para este resumo.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </main>
</x-app-layout>