<x-app-layout>
    <main class="min-h-screen bg-white px-6 py-8 lg:px-10">
        <div class="mx-auto max-w-7xl">

            @php
                $cor = $materia->cor_tema ?? '#7c3aed';

                $colunas = [
                    'a_fazer' => [
                        'titulo' => 'A fazer',
                        'icone' => 'fa-regular fa-clipboard',
                        'borda' => 'border-purple-100',
                        'fundo' => 'bg-purple-50/30',
                        'iconeFundo' => 'bg-purple-600',
                        'texto' => 'text-purple-600',
                        'vazio' => 'Nenhuma tarefa a fazer.',
                    ],
                    'fazendo' => [
                        'titulo' => 'Fazendo',
                        'icone' => 'fa-solid fa-rotate',
                        'borda' => 'border-blue-100',
                        'fundo' => 'bg-blue-50/30',
                        'iconeFundo' => 'bg-blue-600',
                        'texto' => 'text-blue-600',
                        'vazio' => 'Nenhuma tarefa em andamento.',
                    ],
                    'feito' => [
                        'titulo' => 'Feito',
                        'icone' => 'fa-solid fa-check',
                        'borda' => 'border-green-100',
                        'fundo' => 'bg-green-50/30',
                        'iconeFundo' => 'bg-green-600',
                        'texto' => 'text-green-600',
                        'vazio' => 'Nenhuma tarefa feita.',
                    ],
                ];
            @endphp

            {{-- CABEÇALHO --}}
            <div class="mb-10">
                <div class="mb-6 flex flex-wrap items-center gap-2 text-sm text-slate-500">
                    <i class="fa-solid fa-book-open text-purple-600"></i>

                    <a href="{{ route('dashboard') }}"
                    class="font-medium text-purple-600 hover:underline">
                        Todas as matérias
                    </a>

                    <span>></span>

                    <i class="{{ $materia->icone_tema }} text-purple-600"></i>

                    <a href="{{ route('materias.show', $materia) }}"
                    class="font-medium text-purple-600 hover:underline">
                        {{ $materia->nome }}
                    </a>

                    <span>></span>

                    <a href="{{ route('conteudos.show', [$materia, $conteudo]) }}"
                    class="font-medium text-purple-600 hover:underline">
                        {{ $conteudo->nome }}
                    </a>

                    <span>></span>

                    <p>Tarefas</p>
                </div>

                <div class="flex items-end justify-between gap-8">
                    <div class="max-w-xl">
                        <h1 class="text-4xl font-bold tracking-tight text-slate-950">
                            Tarefas
                        </h1>

                        <p class="mt-4 text-sm leading-6 text-slate-500">
                            Organize suas tarefas por status dentro do conteúdo {{ $conteudo->nome }}.
                        </p>
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('conteudos.show', [$materia, $conteudo]) }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-purple-100 bg-white px-5 py-3 text-sm font-bold text-purple-600 shadow-sm transition hover:border-purple-200 hover:bg-purple-50">
                            <i class="fa-solid fa-arrow-left"></i>
                            Voltar
                        </a>
                        
                        <a href="{{ route('tarefas.create', [$materia, $conteudo]) }}"
                        class="inline-flex items-center gap-2 rounded-xl bg-purple-600 px-5 py-3 text-sm font-medium text-white shadow-sm transition hover:bg-purple-700">
                            <i class="fa-solid fa-plus"></i>
                            Adicionar tarefa
                        </a>
                    </div>
                </div>
            </div>

            {{-- COLUNAS --}}
            <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">

                @foreach ($colunas as $status => $coluna)
                    <div class="rounded-2xl border {{ $coluna['borda'] }} {{ $coluna['fundo'] }} p-5">
                        <div class="mb-5 flex items-center gap-3">
                            <div class="flex h-9 w-9 items-center justify-center rounded-lg {{ $coluna['iconeFundo'] }} text-white">
                                <i class="{{ $coluna['icone'] }}"></i>
                            </div>

                            <h2 class="text-xl font-semibold text-slate-900">
                                {{ $coluna['titulo'] }}
                            </h2>
                        </div>

                        <div class="space-y-4">
                            @forelse($tarefas->where('status', $status) as $tarefa)
                                @php
                                    $hoje = now()->startOfDay();
                                    $dataEntrega = $tarefa->data_entrega ? $tarefa->data_entrega->copy()->startOfDay() : null;
                                    $dias = $dataEntrega ? (int) $hoje->diffInDays($dataEntrega, false) : null;

                                    if (! $dataEntrega) {
                                        $textoPrazo = 'Sem data de entrega';
                                        $classePrazo = 'text-slate-500 bg-slate-100';
                                        $iconePrazo = 'fa-regular fa-calendar';
                                    } elseif ($dias < 0) {
                                        $textoPrazo = 'Atrasada há ' . abs($dias) . ' ' . (abs($dias) == 1 ? 'dia' : 'dias');
                                        $classePrazo = 'text-red-700 bg-red-100';
                                        $iconePrazo = 'fa-solid fa-triangle-exclamation';
                                    } elseif ($dias === 0) {
                                        $textoPrazo = 'Entrega hoje';
                                        $classePrazo = 'text-yellow-700 bg-yellow-100';
                                        $iconePrazo = 'fa-regular fa-clock';
                                    } elseif ($dias === 1) {
                                        $textoPrazo = 'Entrega amanhã';
                                        $classePrazo = 'text-orange-700 bg-orange-100';
                                        $iconePrazo = 'fa-regular fa-clock';
                                    } else {
                                        $textoPrazo = 'Faltam ' . $dias . ' dias';
                                        $classePrazo = 'text-green-700 bg-green-100';
                                        $iconePrazo = 'fa-regular fa-calendar-check';
                                    }
                                @endphp

                                <div class="flex min-h-[230px] flex-col rounded-xl border border-slate-200 bg-white p-4 shadow-sm">

                                    <div class="flex-1">
                                        <h3 class="line-clamp-2 text-base font-semibold text-slate-900">
                                            {{ $tarefa->titulo }}
                                        </h3>

                                        <p class="mt-2 line-clamp-3 min-h-[60px] text-sm leading-5 text-slate-500">
                                            {{ $tarefa->descricao ?? 'Sem descrição' }}
                                        </p>

                                        <div class="mt-3 flex flex-wrap items-center gap-2">
                                            <span class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-xs font-semibold {{ $classePrazo }}">
                                                <i class="{{ $iconePrazo }}"></i>
                                                {{ $textoPrazo }}
                                            </span>

                                            @if ($dataEntrega)
                                                <span class="text-xs font-medium {{ $coluna['texto'] }}">
                                                    Entrega: {{ $tarefa->data_entrega->format('d/m/Y') }}
                                                </span>
                                            @endif
                                        </div>

                                        <p class="mt-3 text-sm text-slate-500">
                                            Prioridade:
                                            <span class="font-medium text-slate-700">
                                                {{ ucfirst($tarefa->prioridade) }}
                                            </span>
                                        </p>
                                    </div>

                                    <div class="mt-4 flex items-center justify-between border-t border-slate-200 pt-4">
                                        <a href="{{ route('tarefas.edit', [$materia, $conteudo, $tarefa]) }}"
                                           class="inline-flex items-center gap-2 text-sm font-medium {{ $coluna['texto'] }}">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                            Editar
                                        </a>

                                        <form action="{{ route('tarefas.destroy', [$materia, $conteudo, $tarefa]) }}"
                                              method="POST"
                                              onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="inline-flex items-center gap-2 text-sm font-medium text-red-600">
                                                <i class="fa-regular fa-trash-can"></i>
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p class="rounded-xl border border-dashed border-slate-300 bg-white p-4 text-center text-sm text-slate-500">
                                    {{ $coluna['vazio'] }}
                                </p>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</x-app-layout>