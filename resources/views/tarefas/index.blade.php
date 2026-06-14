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

                <p>Tarefas</p>
            </div>

            {{-- Cabeçalho --}}
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-slate-950">
                        Tarefas
                    </h1>

                    <p class="mt-3 max-w-2xl text-slate-500">
                        Organize suas tarefas por status dentro do conteúdo {{ $conteudo->nome }}.
                    </p>
                </div>

                <a href="{{ route('tarefas.create', [$materia, $conteudo]) }}"
                   class="inline-flex items-center gap-2 rounded-lg bg-purple-600 px-5 py-3 font-semibold text-white transition hover:bg-purple-700">
                    <i class="fa-solid fa-plus"></i>
                    Adicionar tarefa
                </a>
            </div>

            {{-- Colunas --}}
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                {{-- A FAZER --}}
                <div class="rounded-2xl border border-purple-100 bg-purple-50/30 p-5">
                    <div class="mb-5 flex items-center gap-3">
                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-purple-600 text-white">
                            <i class="fa-regular fa-clipboard"></i>
                        </div>

                        <h2 class="text-xl font-bold text-slate-900">
                            A fazer
                        </h2>
                    </div>

                    <div class="space-y-4">
                        @forelse($tarefas->where('status', 'a_fazer') as $tarefa)
                            <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                                <h3 class="font-bold text-slate-900">
                                    {{ $tarefa->titulo }}
                                </h3>

                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $tarefa->descricao ?? 'Sem descrição' }}
                                </p>

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

                                <div class="mt-3 flex flex-wrap items-center gap-2">
                                    <span class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-xs font-semibold {{ $classePrazo }}">
                                        <i class="{{ $iconePrazo }}"></i>
                                        {{ $textoPrazo }}
                                    </span>

                                    @if ($dataEntrega)
                                        <span class="text-xs font-medium text-purple-600">
                                            Entrega: {{ $tarefa->data_entrega->format('d/m/Y') }}
                                        </span>
                                    @endif
                                </div>

                                <p class="mt-1 text-sm text-slate-500">
                                    Prioridade: {{ ucfirst($tarefa->prioridade) }}
                                </p>

                                <div class="mt-4 flex items-center justify-between border-t border-slate-200 pt-4">
                                    <a href="{{ route('tarefas.edit', [$materia, $conteudo, $tarefa]) }}"
                                       class="inline-flex items-center gap-2 text-sm font-medium text-purple-600">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                        Editar
                                    </a>

                                    <form action="{{ route('tarefas.destroy', [$materia, $conteudo, $tarefa]) }}"
                                          method="POST"
                                          onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="inline-flex items-center gap-2 text-sm font-medium text-red-600">
                                            <i class="fa-regular fa-trash-can"></i>
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="rounded-xl border border-dashed border-slate-300 bg-white p-4 text-center text-sm text-slate-500">
                                Nenhuma tarefa a fazer.
                            </p>
                        @endforelse
                    </div>
                </div>

                {{-- FAZENDO --}}
                <div class="rounded-2xl border border-blue-100 bg-blue-50/30 p-5">
                    <div class="mb-5 flex items-center gap-3">
                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-600 text-white">
                            <i class="fa-solid fa-rotate"></i>
                        </div>

                        <h2 class="text-xl font-bold text-slate-900">
                            Fazendo
                        </h2>
                    </div>

                    <div class="space-y-4">
                        @forelse($tarefas->where('status', 'fazendo') as $tarefa)
                            <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                                <h3 class="font-bold text-slate-900">
                                    {{ $tarefa->titulo }}
                                </h3>

                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $tarefa->descricao ?? 'Sem descrição' }}
                                </p>

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

                                <div class="mt-3 flex flex-wrap items-center gap-2">
                                    <span class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-xs font-semibold {{ $classePrazo }}">
                                        <i class="{{ $iconePrazo }}"></i>
                                        {{ $textoPrazo }}
                                    </span>

                                    @if ($dataEntrega)
                                        <span class="text-xs font-medium text-blue-600">
                                            Entrega: {{ $tarefa->data_entrega->format('d/m/Y') }}
                                        </span>
                                    @endif
                                </div>

                                <p class="mt-1 text-sm text-slate-500">
                                    Prioridade: {{ ucfirst($tarefa->prioridade) }}
                                </p>

                                <div class="mt-4 flex items-center justify-between border-t border-slate-200 pt-4">
                                    <a href="{{ route('tarefas.edit', [$materia, $conteudo, $tarefa]) }}"
                                       class="inline-flex items-center gap-2 text-sm font-medium text-blue-600">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                        Editar
                                    </a>

                                    <form action="{{ route('tarefas.destroy', [$materia, $conteudo, $tarefa]) }}"
                                          method="POST"
                                          onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="inline-flex items-center gap-2 text-sm font-medium text-red-600">
                                            <i class="fa-regular fa-trash-can"></i>
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="rounded-xl border border-dashed border-slate-300 bg-white p-4 text-center text-sm text-slate-500">
                                Nenhuma tarefa fazendo.
                            </p>
                        @endforelse
                    </div>
                </div>

                {{-- FEITO --}}
                <div class="rounded-2xl border border-green-100 bg-green-50/30 p-5">
                    <div class="mb-5 flex items-center gap-3">
                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-green-600 text-white">
                            <i class="fa-solid fa-check"></i>
                        </div>

                        <h2 class="text-xl font-bold text-slate-900">
                            Feito
                        </h2>
                    </div>

                    <div class="space-y-4">
                        @forelse($tarefas->where('status', 'feito') as $tarefa)
                            <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                                <h3 class="font-bold text-slate-900">
                                    {{ $tarefa->titulo }}
                                </h3>

                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $tarefa->descricao ?? 'Sem descrição' }}
                                </p>

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

                                <div class="mt-3 flex flex-wrap items-center gap-2">
                                    <span class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-xs font-semibold {{ $classePrazo }}">
                                        <i class="{{ $iconePrazo }}"></i>
                                        {{ $textoPrazo }}
                                    </span>

                                    @if ($dataEntrega)
                                        <span class="text-xs font-medium text-green-600">
                                            Entrega: {{ $tarefa->data_entrega->format('d/m/Y') }}
                                        </span>
                                    @endif
                                </div>

                                <p class="mt-1 text-sm text-slate-500">
                                    Prioridade: {{ ucfirst($tarefa->prioridade) }}
                                </p>

                                <div class="mt-4 flex items-center justify-between border-t border-slate-200 pt-4">
                                    <a href="{{ route('tarefas.edit', [$materia, $conteudo, $tarefa]) }}"
                                       class="inline-flex items-center gap-2 text-sm font-medium text-green-600">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                        Editar
                                    </a>

                                    <form action="{{ route('tarefas.destroy', [$materia, $conteudo, $tarefa]) }}"
                                          method="POST"
                                          onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="inline-flex items-center gap-2 text-sm font-medium text-red-600">
                                            <i class="fa-regular fa-trash-can"></i>
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="rounded-xl border border-dashed border-slate-300 bg-white p-4 text-center text-sm text-slate-500">
                                Nenhuma tarefa feita.
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>