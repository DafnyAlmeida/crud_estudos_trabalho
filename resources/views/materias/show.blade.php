<x-app-layout>
    <main class="min-h-screen bg-slate-50 px-6 py-8">
        <div class="mx-auto max-w-7xl">

            {{-- CABEÇALHO --}}
            <div class="mb-8">
                <div class="mb-6 flex items-center gap-2 text-sm text-slate-500">
                    <i class="fa-solid fa-book-open text-purple-600"></i>

                    <a href="{{ route('dashboard') }}" class="font-medium text-purple-600 hover:underline">
                        Todas as matérias
                    </a>

                    <span>></span>

                    <i class="{{ $materia->icone_tema }} text-purple-600"></i>

                    <p class="font-medium text-slate-700">
                        {{ $materia->nome }}
                    </p>

                    <span>></span>

                    <p>Conteúdos</p>
                </div>

                <div class="flex items-start justify-between gap-6">
                    <div>
                        <h1 class="text-4xl font-bold text-slate-950">
                            Conteúdos
                        </h1>

                        <p class="mt-3 max-w-2xl text-slate-500">
                            Visualize e gerencie os conteúdos da matéria {{ $materia->nome }}.
                        </p>
                    </div>

                    <a href="{{ route('conteudos.create', $materia) }}"
                       class="inline-flex items-center gap-2 rounded-xl bg-purple-600 px-5 py-3 font-semibold text-white shadow-sm transition hover:bg-purple-700">
                        <i class="fa-solid fa-plus"></i>
                        Adicionar conteúdo
                    </a>
                </div>
            </div>

            {{-- LISTA DE CARDS --}}
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3">
                @forelse ($conteudos as $conteudo)
                    @php
                        $statusClasses = [
                            'nao_iniciado' => 'bg-blue-100 text-blue-700',
                            'iniciado' => 'bg-blue-100 text-blue-700',
                            'em_andamento' => 'bg-yellow-100 text-yellow-700',
                            'concluido' => 'bg-green-100 text-green-700',
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

                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                        {{-- PARTE SUPERIOR --}}
                        <div class="flex items-start justify-between gap-4">
                            <a href="{{ route('conteudos.show', [$materia, $conteudo]) }}"
                               class="flex flex-1 items-start gap-5">

                                {{-- ÍCONE --}}
                                <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-3xl bg-purple-100 text-3xl text-purple-600">
                                    <i class="fa-regular fa-file-lines"></i>
                                </div>

                                {{-- INFORMAÇÕES --}}
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-start justify-between gap-3">
                                        <h2 class="text-xl font-bold leading-snug text-slate-950">
                                            {{ $conteudo->nome }}
                                        </h2>

                                        <span class="shrink-0 rounded-full px-4 py-2 text-sm font-semibold {{ $statusClasses[$conteudo->status] ?? 'bg-slate-100 text-slate-600' }}">
                                            {{ $statusLabels[$conteudo->status] ?? ucfirst($conteudo->status) }}
                                        </span>
                                    </div>

                                    <div class="mt-4 flex flex-wrap gap-3">
                                        <span class="rounded-full bg-purple-100 px-4 py-2 text-sm font-semibold text-purple-700">
                                            {{ $conteudo->area ?: 'Área' }}
                                        </span>

                                        <span class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700">
                                            {{ $nivelLabels[$conteudo->nivel_dificuldade] ?? ucfirst($conteudo->nivel_dificuldade) }}
                                        </span>
                                    </div>

                                    <p class="mt-5 text-base leading-relaxed text-slate-500">
                                        {{ $conteudo->descricao ?: 'A descrição do conteúdo aparecerá aqui.' }}
                                    </p>
                                </div>
                            </a>
                        </div>

                        {{-- RODAPÉ --}}
                        <div class="mt-6 flex items-center justify-between border-t border-slate-200 pt-5 text-sm text-slate-500">
                            <div class="flex items-center gap-3">
                                <i class="fa-regular fa-clipboard text-slate-600"></i>

                                <span>
                                    {{ $conteudo->tarefas_count ?? 0 }}
                                    {{ ($conteudo->tarefas_count ?? 0) == 1 ? 'tarefa' : 'tarefas' }}
                                </span>
                            </div>

                            <div class="flex items-center gap-3">
                                <i class="fa-regular fa-clock text-slate-600"></i>

                                <span>
                                    Estimativa: —
                                </span>
                            </div>
                        </div>

                        {{-- AÇÕES --}}
                        <div class="mt-5 flex items-center gap-3">
                            <a href="{{ route('conteudos.edit', [$materia, $conteudo]) }}"
                               class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl border border-slate-200 px-4 py-3 text-sm font-semibold text-purple-600 transition hover:bg-purple-50">
                                <i class="fa-regular fa-pen-to-square"></i>
                                Editar
                            </a>

                            <form action="{{ route('conteudos.destroy', [$materia, $conteudo]) }}"
                                  method="POST"
                                  class="flex-1"
                                  onsubmit="return confirm('Tem certeza que deseja apagar este conteúdo?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-slate-200 px-4 py-3 text-sm font-semibold text-red-600 transition hover:bg-red-50">
                                    <i class="fa-regular fa-trash-can"></i>
                                    Apagar
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full rounded-3xl border border-dashed border-slate-300 bg-white p-12 text-center">
                        <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-purple-100 text-purple-600">
                            <i class="fa-regular fa-folder-open text-2xl"></i>
                        </div>

                        <h2 class="text-xl font-bold text-slate-900">
                            Nenhum conteúdo cadastrado
                        </h2>

                        <p class="mt-2 text-slate-500">
                            Clique em “Adicionar conteúdo” para começar.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </main>
</x-app-layout>