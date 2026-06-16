<x-app-layout>
    @php
        $statusLabel = ucfirst(str_replace('_', ' ', $conteudo->status ?? ''));
        $prioridadeLabel = ucfirst($conteudo->prioridade ?? '');
        $nivelLabel = ucfirst($conteudo->nivel_dificuldade ?? '');

        $statusClasses = [
            'nao_iniciado' => 'bg-slate-100 text-slate-600',
            'iniciado' => 'bg-blue-50 text-blue-600',
            'em_andamento' => 'bg-pink-50 text-pink-600',
            'concluido' => 'bg-emerald-50 text-emerald-600',
        ][$conteudo->status ?? ''] ?? 'bg-slate-100 text-slate-600';

        $prioridadeClasses = [
            'alta' => 'bg-red-50 text-red-600',
            'media' => 'bg-orange-50 text-orange-600',
            'baixa' => 'bg-slate-100 text-slate-600',
        ][$conteudo->prioridade ?? ''] ?? 'bg-slate-100 text-slate-600';

        $nivelClasses = [
            'basico' => 'bg-emerald-50 text-emerald-600',
            'intermediario' => 'bg-orange-50 text-orange-600',
            'avancado' => 'bg-purple-50 text-purple-600',
        ][$conteudo->nivel_dificuldade ?? ''] ?? 'bg-slate-100 text-slate-600';
    @endphp

    <main class="min-h-screen bg-white px-6 py-8 lg:px-10">
        <section class="mx-auto max-w-7xl">

            <!-- Breadcrumbs -->
            <div class="mb-8 flex flex-wrap items-center gap-3 text-sm font-medium">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-purple-600 transition hover:text-purple-700">
                    <i class="fa-solid fa-book-open"></i>
                    Todas as matérias
                </a>

                <span class="text-slate-400">></span>

                <a href="{{ route('materias.show', $materia) }}" class="flex items-center gap-2 text-purple-600 transition hover:text-purple-700">
                    <i class="fa-solid fa-brain"></i>
                    {{ $materia->nome }}
                </a>

                <span class="text-slate-400">></span>

                <span class="text-slate-500">Conteúdo</span>
            </div>

            <!-- Cabeçalho -->
            <div class="mb-10 flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                <div>
                    <h1 class="text-4xl font-black tracking-tight text-slate-950">
                        {{ $conteudo->nome }}
                    </h1>

                    <p class="mt-4 max-w-3xl text-lg leading-relaxed text-slate-500">
                        {{ $conteudo->descricao ?: 'Nenhuma descrição cadastrada para este conteúdo.' }}
                    </p>
                </div>

                <a href="{{ route('materias.show', $materia) }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl border border-purple-100 bg-white px-5 py-3 text-sm font-bold text-purple-600 shadow-sm transition hover:border-purple-200 hover:bg-purple-50">
                    <i class="fa-solid fa-arrow-left"></i>
                    Voltar
                </a>
            </div>

            <!-- Cards de navegação -->
            <section class="grid grid-cols-1 gap-6 md:grid-cols-3">

                <!-- Tarefas -->
                <a href="{{ route('tarefas.index', [$materia, $conteudo]) }}"
                   class="group overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                    <div class="p-7">
                        <div class="mb-6 flex items-center justify-between">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-pink-50 text-xl text-pink-500">
                                <i class="fa-solid fa-clipboard-list"></i>
                            </div>

                            <span class="rounded-full bg-pink-50 px-4 py-2 text-sm font-bold text-pink-500">
                                {{ $conteudo->tarefas_count ?? $conteudo->tarefas->count() }} tarefas
                            </span>
                        </div>

                        <h2 class="text-2xl font-black text-slate-950">
                            Tarefas
                        </h2>

                        <p class="mt-3 leading-relaxed text-slate-500">
                            Ver, criar e organizar as tarefas deste conteúdo.
                        </p>
                    </div>

                    <div class="border-t border-slate-100 px-7 py-4">
                        <span class="inline-flex items-center gap-2 font-bold text-purple-600">
                            Acessar tarefas
                            <i class="fa-solid fa-arrow-right text-sm transition group-hover:translate-x-1"></i>
                        </span>
                    </div>
                </a>

                <!-- Materiais -->
                <a href="{{ route('materiais.index', [$materia, $conteudo]) }}"
                   class="group overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:border-purple-200 hover:shadow-md">

                    <div class="p-7">
                        <div class="mb-6 flex items-center justify-between">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-purple-50 text-xl text-purple-600">
                                <i class="fa-solid fa-folder-open"></i>
                            </div>

                            <span class="rounded-full bg-purple-50 px-4 py-2 text-sm font-bold text-purple-600">
                                {{ $conteudo->materiais_count ?? $conteudo->materiais->count() }} materiais
                            </span>
                        </div>

                        <h2 class="text-2xl font-black text-slate-950">
                            Materiais
                        </h2>

                        <p class="mt-3 leading-relaxed text-slate-500">
                            Acesse links, PDFs, vídeos, imagens e arquivos de estudo.
                        </p>
                    </div>

                    <div class="border-t border-slate-100 px-7 py-4">
                        <span class="inline-flex items-center gap-2 font-bold text-purple-600">
                            Acessar materiais
                            <i class="fa-solid fa-arrow-right text-sm transition group-hover:translate-x-1"></i>
                        </span>
                    </div>
                </a>

                <!-- Resumos -->
                <a href="{{ route('resumos.index', [$materia, $conteudo]) }}"
                   class="group overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                    <div class="p-7">
                        <div class="mb-6 flex items-center justify-between">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-orange-50 text-xl text-orange-500">
                                <i class="fa-solid fa-note-sticky"></i>
                            </div>

                            <span class="rounded-full bg-orange-50 px-4 py-2 text-sm font-bold text-orange-500">
                                {{ $conteudo->resumos_count ?? $conteudo->resumos->count() }} resumos
                            </span>
                        </div>

                        <h2 class="text-2xl font-black text-slate-950">
                            Resumos
                        </h2>

                        <p class="mt-3 leading-relaxed text-slate-500">
                            Visualize, crie e edite os resumos feitos para este conteúdo.
                        </p>
                    </div>

                    <div class="border-t border-slate-100 px-7 py-4">
                        <span class="inline-flex items-center gap-2 font-bold text-purple-600">
                            Acessar resumos
                            <i class="fa-solid fa-arrow-right text-sm transition group-hover:translate-x-1"></i>
                        </span>
                    </div>
                </a>
            </section>
        </section>
    </main>
</x-app-layout>