<x-app-layout>
    <main class="min-h-screen bg-white px-6 py-8 lg:px-10">
        <div class="mx-auto max-w-7xl">

        {{-- CABEÇALHO --}}
        <div class="mb-10">
            <div class="mb-6 flex items-center gap-2 text-sm text-slate-500">
                <i class="fa-solid fa-book-open text-purple-600"></i>

                <a href="{{ route('dashboard') }}"
                class="font-medium text-purple-600 hover:underline">
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

            <div class="flex items-end justify-between gap-8">
                <div class="max-w-xl">
                    <h1 class="text-4xl font-bold tracking-tight text-slate-950">
                        {{ $materia->nome }}
                    </h1>

                    <p class="mt-4 text-sm leading-6 text-slate-500">
                        Visualize e gerencie os conteúdos cadastrados nesta matéria.
                    </p>
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-purple-100 bg-white px-5 py-3 text-sm font-bold text-purple-600 shadow-sm transition hover:border-purple-200 hover:bg-purple-50">
                        <i class="fa-solid fa-arrow-left"></i>
                        Voltar
                    </a>
                    <a href="{{ route('conteudos.create', $materia) }}"
                    class="inline-flex items-center gap-2 rounded-xl bg-purple-600 px-5 py-3 text-sm font-medium text-white shadow-sm transition hover:bg-purple-700">
                        <i class="fa-solid fa-plus"></i>
                        Adicionar conteúdo
                    </a>
                </div>
            </div>
        </div>

            {{-- LISTA DE CARDS --}}
            <div class="grid items-stretch gap-5 lg:grid-cols-2">
                @forelse ($conteudos as $conteudo)
                @php
                    $cor = $materia->cor_tema ?? '#7c3aed';

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

                    $prioridadeLabels = [
                        'alta' => 'Alta',
                        'media' => 'Média',
                        'baixa' => 'Baixa',
                    ];

                    $nivelClasses = [
                        'basico' => 'bg-emerald-100 text-emerald-700',
                        'intermediario' => 'bg-amber-100 text-amber-700',
                        'avancado' => 'bg-red-100 text-red-700',
                    ];

                    $prioridadeClasses = [
                        'baixa' => 'bg-blue-100 text-blue-700',
                        'media' => 'bg-orange-100 text-orange-700',
                        'alta' => 'bg-red-100 text-red-700',
                    ];

                    $status = $statusLabels[$conteudo->status] ?? ucfirst(str_replace('_', ' ', $conteudo->status));
                    $nivel = $nivelLabels[$conteudo->nivel_dificuldade] ?? ucfirst(str_replace('_', ' ', $conteudo->nivel_dificuldade));
                    $prioridade = $prioridadeLabels[$conteudo->prioridade] ?? ucfirst(str_replace('_', ' ', $conteudo->prioridade));

                    $nivelClasse = $nivelClasses[$conteudo->nivel_dificuldade] ?? 'bg-slate-100 text-slate-700';
                    $prioridadeClasse = $prioridadeClasses[$conteudo->prioridade] ?? 'bg-slate-100 text-slate-700';
                @endphp

                    <div class="flex min-h-[340px] flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md">

                        {{-- CONTEÚDO DO CARD --}}
                        <div class="flex flex-1 flex-col p-5">
                            <div class="mb-4 flex items-start justify-between">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl text-lg text-white"
                                     style="background-color: {{ $cor }}">
                                    <i class="fa-regular fa-file-lines"></i>
                                </div>

                                <span class="rounded-full px-3 py-1 text-xs font-medium"
                                      style="color: {{ $cor }}; background-color: {{ $cor }}18;">
                                    {{ $status }}
                                </span>
                            </div>

                            <h2 class="text-xl font-semibold text-slate-900">
                                {{ $conteudo->nome }}
                            </h2>

                            <p class="mt-2 line-clamp-2 min-h-[44px] text-sm leading-5 text-slate-500">
                                {{ $conteudo->descricao ?: 'A descrição do conteúdo aparecerá aqui.' }}
                            </p>

                            {{-- INFORMAÇÕES EXPLICADAS --}}
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="rounded-full px-3 py-1 text-xs font-medium"
                                    style="color: {{ $cor }}; background-color: {{ $cor }}18;">
                                    Área: {{ ucfirst($conteudo->area ?: 'Não definida') }}
                                </span>

                                <span class="rounded-full px-3 py-1 text-xs font-medium {{ $nivelClasse }}">
                                    Nível de dificuldade: {{ $nivel }}
                                </span>

                                <span class="rounded-full px-3 py-1 text-xs font-medium {{ $prioridadeClasse }}">
                                    Prioridade: {{ $prioridade }}
                                </span>
                            </div>

                            {{-- CONTADORES NA MESMA LINHA --}}
                            <div class="mt-5 border-t border-slate-100 pt-4">
                                <div class="grid grid-cols-3 gap-3 text-sm text-slate-500">

                                    <div class="flex items-center gap-2">
                                        <span class="flex h-8 w-8 items-center justify-center rounded-lg"
                                              style="color: {{ $cor }}; background-color: {{ $cor }}18;">
                                            <i class="fa-regular fa-clipboard text-xs"></i>
                                        </span>

                                        <span>
                                            {{ $conteudo->tarefas_count ?? 0 }}
                                            {{ ($conteudo->tarefas_count ?? 0) == 1 ? 'tarefa' : 'tarefas' }}
                                        </span>
                                    </div>

                                    <div class="flex items-center justify-center gap-2">
                                        <span class="flex h-8 w-8 items-center justify-center rounded-lg"
                                              style="color: {{ $cor }}; background-color: {{ $cor }}18;">
                                            <i class="fa-regular fa-folder-open text-xs"></i>
                                        </span>

                                        <span>
                                            {{ $conteudo->materiais_count ?? 0 }}
                                            {{ ($conteudo->materiais_count ?? 0) == 1 ? 'material' : 'materiais' }}
                                        </span>
                                    </div>

                                    <div class="flex items-center justify-end gap-2">
                                        <span>
                                            {{ $conteudo->resumos_count ?? 0 }}
                                            {{ ($conteudo->resumos_count ?? 0) == 1 ? 'resumo' : 'resumos' }}
                                        </span>

                                        <span class="flex h-8 w-8 items-center justify-center rounded-lg"
                                              style="color: {{ $cor }}; background-color: {{ $cor }}18;">
                                            <i class="fa-regular fa-note-sticky text-xs"></i>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- BOTÕES FIXOS NO FINAL --}}
                        <div class="mt-auto grid grid-cols-3 border-t border-slate-100">
                            <a href="{{ route('conteudos.edit', [$materia, $conteudo]) }}"
                               class="flex h-12 items-center justify-center gap-2 border-r border-slate-100 text-sm font-medium transition hover:bg-slate-50"
                               style="color: {{ $cor }}">
                                <i class="fa-regular fa-pen-to-square"></i>
                                Editar
                            </a>

                            <a href="{{ route('conteudos.show', [$materia, $conteudo]) }}"
                               class="flex h-12 items-center justify-center gap-2 border-r border-slate-100 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                                <i class="fa-regular fa-eye"></i>
                                Visualizar
                            </a>

                            <form action="{{ route('conteudos.destroy', [$materia, $conteudo]) }}"
                                  method="POST"
                                  onsubmit="return confirm('Tem certeza que deseja apagar este conteúdo?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="flex h-12 w-full items-center justify-center gap-2 text-sm font-medium text-red-500 transition hover:bg-red-50">
                                    <i class="fa-regular fa-trash-can"></i>
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full rounded-2xl border border-dashed border-slate-200 p-8 text-center">
                        <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-xl"
                             style="color: {{ $materia->cor_tema ?? '#7c3aed' }}; background-color: {{ ($materia->cor_tema ?? '#7c3aed') }}18;">
                            <i class="fa-regular fa-folder-open text-xl"></i>
                        </div>

                        <h2 class="font-semibold text-slate-900">
                            Nenhum conteúdo cadastrado
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Clique em “Adicionar conteúdo” para começar.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </main>
</x-app-layout>