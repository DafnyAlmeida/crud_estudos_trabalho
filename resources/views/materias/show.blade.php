<x-app-layout>
    <main class="min-h-screen bg-slate-50 p-6">
        <div class="mx-auto max-w-8xl rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- CABEÇALHO --}}
            <div class="border-b border-slate-200 p-8">
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
                            Aqui você pode visualizar e gerenciar os conteúdos da matéria {{ $materia->nome }}.
                        </p>
                    </div>

                    <a href="{{ route('conteudos.create', $materia->id) }}"
                       class="inline-flex items-center gap-2 rounded-lg bg-purple-600 px-5 py-3 font-semibold text-white transition hover:bg-purple-700">
                        <i class="fa-solid fa-plus"></i>
                        Adicionar conteúdo
                    </a>
                </div>
            </div>

            {{-- LISTA --}}
            <div class="p-8">
                <div class="space-y-4">
                    @forelse ($conteudos as $conteudo)
                        @php
                            $statusClasses = [
                                'nao_iniciado' => 'bg-slate-100 text-slate-600',
                                'iniciado' => 'bg-blue-100 text-blue-700',
                                'em_andamento' => 'bg-yellow-100 text-yellow-700',
                                'concluido' => 'bg-green-100 text-green-700',
                            ];

                            $prioridadeClasses = [
                                'alta' => 'text-red-600',
                                'media' => 'text-yellow-600',
                                'baixa' => 'text-green-600',
                            ];
                        @endphp

                        <div class="flex items-center justify-between gap-6 rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md">

                            {{-- LINK DO CARD --}}
                            <a href="{{ route('conteudos.show', ['materia' => $materia, 'conteudo' => $conteudo]) }}"
                               class="flex flex-1 items-center gap-5">

                                <div class="flex h-16 w-16 items-center justify-center rounded-xl bg-purple-100 text-2xl text-purple-600">
                                    <i class="fa-solid fa-book"></i>
                                </div>

                                <div>
                                    <h2 class="text-xl font-bold text-slate-950">
                                        {{ $conteudo->nome }}
                                    </h2>

                                    <p class="mt-1 text-slate-500">
                                        {{ $conteudo->descricao }}
                                    </p>

                                    <div class="mt-3 flex gap-2">
                                        <span class="rounded-md bg-purple-100 px-3 py-1 text-sm font-semibold text-purple-700">
                                            {{ $conteudo->area }}
                                        </span>

                                        <span class="rounded-md px-3 py-1 text-sm font-semibold {{ $statusClasses[$conteudo->status] ?? 'bg-slate-100 text-slate-600' }}">
                                            {{ str_replace('_', ' ', ucfirst($conteudo->status)) }}
                                        </span>
                                    </div>
                                </div>
                            </a>

                            {{-- PRIORIDADE --}}
                            <div class="border-l border-slate-200 px-8">
                                <p class="text-sm text-slate-500">
                                    Prioridade
                                </p>

                                <p class="font-bold {{ $prioridadeClasses[$conteudo->prioridade] ?? 'text-slate-700' }}">
                                    {{ ucfirst($conteudo->prioridade) }}
                                </p>
                            </div>

                            {{-- BOTÕES --}}
                            <div class="flex gap-3">
                                <a href="{{ route('conteudos.edit', [$materia->id, $conteudo->id]) }}"
                                   class="inline-flex items-center gap-2 rounded-lg border border-slate-200 px-4 py-3 font-medium text-purple-600 transition hover:bg-purple-50">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    Editar
                                </a>

                                <form action="{{ route('conteudos.destroy', [$materia->id, $conteudo->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Tem certeza que deseja apagar este conteúdo?')"
                                            class="inline-flex items-center gap-2 rounded-lg border border-slate-200 px-4 py-3 font-medium text-red-600 transition hover:bg-red-50">
                                        <i class="fa-regular fa-trash-can"></i>
                                        Apagar
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-10 text-center">
                            <h2 class="text-lg font-bold text-slate-900">
                                Nenhum conteúdo cadastrado
                            </h2>

                            <p class="mt-2 text-slate-500">
                                Clique em “Adicionar conteúdo” para começar.
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>
</x-app-layout>