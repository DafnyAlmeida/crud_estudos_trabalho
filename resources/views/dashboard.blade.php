<x-app-layout>
    <main class="min-h-screen bg-white px-6 py-8 lg:px-10">
        <div class="mx-auto max-w-7xl">
            <div class="mb-10 flex items-end justify-between gap-8">
                <div class="max-w-xl">
                    <p class="mb-3 text-sm font-medium text-violet-600">
                        Página inicial
                    </p>

                    <h1 class="text-4xl font-bold tracking-tight text-slate-950">
                        Olá, {{ $nome_user }}!
                    </h1>

                    <p class="mt-4 text-sm leading-6 text-slate-500">
                        Página inicial do sistema com acesso rápido às matérias.
                        Cada card leva para uma matéria, onde os conteúdos são separados
                        por áreas usando cores e ícones.
                    </p>
                </div>

                <a href="{{ route('materias.create') }}"
                   class="inline-flex items-center gap-2 rounded-xl bg-purple-600 px-5 py-3 text-sm font-medium text-white shadow-sm transition hover:bg-purple-700 ">
                    <i class="fa-solid fa-plus"></i>
                    Adicionar matéria
                </a>
            </div>

            <div class="grid items-stretch gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($materias as $materia)
                    @php
                        $cor = $materia->cor_tema ?? '#7c3aed';
                        $status = ucfirst(str_replace('_', ' ', $materia->status));
                    @endphp

                    <div class="flex min-h-[300px] flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md">

                        <div class="flex flex-1 flex-col p-5">
                            <div class="mb-5 flex items-start justify-between">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl text-lg text-white"
                                     style="background-color: {{ $cor }}">
                                    <i class="{{ $materia->icone_tema }}"></i>
                                </div>

                                <span class="rounded-full px-3 py-1 text-xs font-medium"
                                      style="color: {{ $cor }}; background-color: {{ $cor }}18;">
                                    {{ $status }}
                                </span>
                            </div>

                            <h2 class="text-xl font-semibold text-slate-900">
                                {{ $materia->nome }}
                            </h2>

                            <p class="mt-2 line-clamp-3 min-h-[50px] text-sm leading-5 text-slate-500">
                                {{ $materia->descricao }}
                            </p>

                            <div class="mt-6 border-t border-slate-100 pt-4">
                                <div class="flex items-center justify-between gap-4">

                                    <div class="flex items-center gap-2 text-sm text-slate-500">
                                        <span class="flex h-8 w-8 items-center justify-center rounded-lg"
                                              style="color: {{ $cor }}; background-color: {{ $cor }}18;">
                                            <i class="fa-regular fa-file-lines text-xs"></i>
                                        </span>

                                        <span>{{ $materia->conteudos_count ?? 0 }} conteúdos</span>
                                    </div>

                                    <div class="flex items-center gap-2 text-sm text-slate-500">
                                        <span>{{ $materia->tarefas_count ?? 0 }} tarefas</span>

                                        <span class="flex h-8 w-8 items-center justify-center rounded-lg"
                                              style="color: {{ $cor }}; background-color: {{ $cor }}18;">
                                            <i class="fa-regular fa-square-check text-xs"></i>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="mt-auto grid grid-cols-3 border-t border-slate-100">
                            <a href="{{ route('materias.edit', $materia->id) }}"
                               class="flex items-center justify-center gap-2 border-r border-slate-100 py-3 text-sm font-medium text-violet-600 transition hover:bg-violet-50">
                                <i class="fa-regular fa-pen-to-square"></i>
                                Editar
                            </a>

                            <a href="{{ route('materias.show', $materia->id) }}"
                               class="flex items-center justify-center gap-2 border-r border-slate-100 py-3 text-sm font-medium transition hover:bg-slate-50" style="color: {{ $cor }};">
                                <i class="fa-regular fa-eye"></i>
                                Visualizar
                            </a>

                            <form action="{{ route('materias.destroy', $materia->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Tem certeza que deseja excluir esta matéria?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="flex h-full w-full items-center justify-center gap-2 py-3 text-sm font-medium text-red-500 transition hover:bg-red-50">
                                    <i class="fa-regular fa-trash-can"></i>
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full rounded-2xl border border-dashed border-slate-200 p-8 text-center">
                        <h2 class="font-semibold text-slate-900">
                            Nenhuma matéria cadastrada
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Clique em “Adicionar matéria” para começar.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </main>
</x-app-layout>