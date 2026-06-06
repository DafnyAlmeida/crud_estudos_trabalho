<x-app-layout>
    <main class="min-h-screen bg-gray-50 px-8 py-8">
        <div class="max-w-7xl mx-auto">

            <!-- Cabeçalho -->
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

                    <p>{{ $conteudo->nome }}</p>
            </div>
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-slate-950">
                    {{ $conteudo->nome }}
                </h1>

                <p class="mt-3 max-w-2xl text-slate-500">
                    {{ $conteudo->descricao }}
                </p>
            </div>

            <!-- Abas -->
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm mb-6">
                <div class="flex gap-10 px-8">
                    <button 
                        class="tab-btn py-5 px-3 border-b-2 border-purple-600 text-purple-600 font-semibold"
                        data-tab="visao-geral">
                        Visão geral
                    </button>

                    <button 
                        class="tab-btn py-5 px-3 border-b-2 border-transparent text-gray-500 font-semibold"
                        data-tab="tarefas">
                        Tarefas
                    </button>

                    <button 
                        class="tab-btn py-5 px-3 border-b-2 border-transparent text-gray-500 font-semibold"
                        data-tab="materiais">
                        Materiais
                    </button>

                    <button 
                        class="tab-btn py-5 px-3 border-b-2 border-transparent text-gray-500 font-semibold"
                        data-tab="resumos">
                        Resumos
                    </button>
                </div>
            </div>

            <!-- Conteúdo das abas -->
            <div>

                <!-- ABA VISÃO GERAL -->
                <div class="tab-content" id="visao-geral">

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                        <!-- Card principal -->
                        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8">

                            <div class="flex gap-4 mb-6">
                                <span class="px-5 py-2 rounded-full bg-purple-100 text-purple-600 font-medium">
                                    Morfologia
                                </span>

                                <span class="px-5 py-2 rounded-full bg-green-100 text-green-600 font-medium">
                                    ● Em andamento
                                </span>
                            </div>

                            <p class="text-gray-600 text-lg leading-relaxed mb-10">
                                Estudo das estruturas das orações, seus termos essenciais e integrantes,
                                além das classificações e períodos sintáticos.
                            </p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <div class="border border-gray-200 rounded-2xl p-6">
                                    <p class="text-gray-600 mb-2">Tarefas</p>
                                    <h2 class="text-3xl font-bold text-slate-900">8</h2>
                                    <p class="text-purple-600 mt-1">4 concluídas</p>
                                </div>

                                <div class="border border-gray-200 rounded-2xl p-6">
                                    <p class="text-gray-600 mb-2">Materiais</p>
                                    <h2 class="text-3xl font-bold text-slate-900">12</h2>
                                    <p class="text-gray-500 mt-1">Vídeos, PDFs e textos</p>
                                </div>

                                <div class="border border-gray-200 rounded-2xl p-6">
                                    <p class="text-gray-600 mb-2">Resumo</p>
                                    <h2 class="text-3xl font-bold text-slate-900">1</h2>
                                    <p class="text-green-600 mt-1">Criado</p>
                                </div>

                                <div class="border border-gray-200 rounded-2xl p-6">
                                    <p class="text-gray-600 mb-2">Progresso</p>
                                    <h2 class="text-3xl font-bold text-purple-600">68%</h2>

                                    <div class="w-full h-3 bg-gray-200 rounded-full mt-4">
                                        <div class="h-3 bg-purple-600 rounded-full" style="width: 68%"></div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Lado direito -->
                        <div class="space-y-6">

                            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8">
                                <h2 class="text-2xl font-bold text-slate-900 mb-6">
                                    Resumo
                                </h2>

                                <p class="text-gray-600 leading-relaxed">
                                    Orações são estruturas que organizam palavras em torno de um verbo
                                    ou locução verbal, transmitindo uma ideia completa.
                                </p>

                                <button 
                                    class="mt-6 text-purple-600 font-semibold"
                                    onclick="abrirAba('resumos')">
                                    Ver resumo completo
                                </button>
                            </div>

                            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8">
                                <h2 class="text-2xl font-bold text-slate-900 mb-6">
                                    Tarefas
                                </h2>

                                <div class="space-y-4">
                                    <div class="flex justify-between items-center border-b pb-3">
                                        <div>
                                            <h3 class="font-semibold text-slate-900">Identificar sujeito e predicado</h3>
                                            <p class="text-gray-500 text-sm">Análise sintática</p>
                                        </div>
                                        <span class="bg-green-100 text-green-600 px-4 py-1 rounded-full text-sm">
                                            Concluída
                                        </span>
                                    </div>

                                    <div class="flex justify-between items-center border-b pb-3">
                                        <div>
                                            <h3 class="font-semibold text-slate-900">Classificar orações</h3>
                                            <p class="text-gray-500 text-sm">Exercícios</p>
                                        </div>
                                        <span class="bg-blue-100 text-blue-600 px-4 py-1 rounded-full text-sm">
                                            Em progresso
                                        </span>
                                    </div>

                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h3 class="font-semibold text-slate-900">Orações subordinadas</h3>
                                            <p class="text-gray-500 text-sm">Exercícios</p>
                                        </div>
                                        <span class="bg-purple-100 text-purple-600 px-4 py-1 rounded-full text-sm">
                                            Pendente
                                        </span>
                                    </div>
                                </div>

                                <button 
                                    class="mt-6 text-purple-600 font-semibold"
                                    onclick="abrirAba('tarefas')">
                                    Ver todas as tarefas
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ABA TAREFAS -->
                <div class="tab-content hidden" id="tarefas">
                    <div class="space-y-6">

                        {{-- TOPO DA ABA --}}
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold text-slate-900">
                                    Tarefas
                                </h2>

                                <p class="mt-1 text-slate-500">
                                    Organize suas tarefas por status.
                                </p>
                            </div>

                            <a href="{{ route('tarefas.create', ['materia' => $materia->id, 'conteudo' => $conteudo->id]) }}"
                            class="inline-flex items-center gap-2 rounded-lg bg-purple-600 px-5 py-3 font-semibold text-white transition hover:bg-purple-700">
                                <i class="fa-solid fa-plus"></i>
                                Adicionar tarefa
                            </a>
                        </div>

                        {{-- COLUNAS --}}
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
                                    @forelse($conteudo->tarefas->where('status', 'a_fazer') as $tarefa)
                                        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                                            <h3 class="font-bold text-slate-900">
                                                {{ $tarefa->titulo }}
                                            </h3>

                                            <p class="mt-1 text-sm text-slate-500">
                                                {{ $tarefa->descricao ?? 'Sem descrição' }}
                                            </p>

                                            <p class="mt-3 flex items-center gap-2 text-sm font-medium text-purple-600">
                                                <i class="fa-regular fa-calendar"></i>
                                                {{ $tarefa->created_at->format('d/m/Y') }}
                                            </p>

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
                                    @forelse($conteudo->tarefas->where('status', 'fazendo') as $tarefa)
                                        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                                            <h3 class="font-bold text-slate-900">
                                                {{ $tarefa->titulo }}
                                            </h3>

                                            <p class="mt-1 text-sm text-slate-500">
                                                {{ $tarefa->descricao ?? 'Sem descrição' }}
                                            </p>

                                            <p class="mt-3 flex items-center gap-2 text-sm font-medium text-blue-600">
                                                <i class="fa-regular fa-calendar"></i>
                                                {{ $tarefa->created_at->format('d/m/Y') }}
                                            </p>

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
                                    @forelse($conteudo->tarefas->where('status', 'feito') as $tarefa)
                                        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                                            <h3 class="font-bold text-slate-900">
                                                {{ $tarefa->titulo }}
                                            </h3>

                                            <p class="mt-1 text-sm text-slate-500">
                                                {{ $tarefa->descricao ?? 'Sem descrição' }}
                                            </p>

                                            <p class="mt-3 flex items-center gap-2 text-sm font-medium text-green-600">
                                                <i class="fa-regular fa-calendar"></i>
                                                {{ $tarefa->created_at->format('d/m/Y') }}
                                            </p>

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
                </div>

                <!-- ABA MATERIAIS -->
                <div class="tab-content hidden" id="materiais">
                    <div class="space-y-8">

                        {{-- TOPO DA ABA --}}
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold text-slate-900">
                                    Materiais
                                </h2>

                                <p class="mt-1 text-sm text-slate-500">
                                    Veja os materiais cadastrados para este conteúdo.
                                </p>
                            </div>

                            <a href="{{ route('materiais.create', ['materia'=> $materia->id, 'conteudo' => $conteudo->id]) }}"
                            class="inline-flex items-center gap-2 rounded-xl bg-purple-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-purple-200 transition hover:bg-purple-700">
                                <i class="fa-solid fa-plus"></i>
                                Adicionar material
                            </a>
                        </div>

                        {{-- CARDS DOS MATERIAIS --}}
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">

                            @forelse($conteudo->materiais as $material)
                                @php
                                    $tipo = strtolower($material->tipo ?? 'pdf');
                                @endphp

                                <div class="group overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">

                                {{-- PREVIEW --}}
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

                                <div class="relative mb-6 h-52 overflow-hidden rounded-2xl bg-purple-50">

                                    <span class="absolute right-4 top-4 z-10 rounded-full bg-purple-600 px-4 py-2 text-xs font-semibold text-white shadow-md">
                                        {{ strtoupper($material->tipo) }}
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
                                        @endif

                                        <div class="h-6 w-px bg-slate-200"></div>

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
                
                <!-- ABA RESUMOS -->
                <div class="tab-content hidden" id="resumos">
                    <div class="space-y-5">

                        {{-- TOPO DA ABA --}}
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold text-slate-900">
                                    Resumos
                                </h2>

                                <p class="mt-1 text-sm text-slate-500">
                                    Veja os resumos cadastrados para este conteúdo.
                                </p>
                            </div>

                            <a href="{{ route('resumos.create', ['materia'=> $materia->id, 'conteudo' => $conteudo->id]) }}"
                            class="inline-flex items-center gap-2 rounded-lg bg-purple-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-purple-700">
                                <i class="fa-solid fa-plus"></i>
                                Adicionar resumo
                            </a>
                        </div>

                        @forelse($conteudo->resumos as $resumo)
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

                                {{-- TÍTULO DO RESUMO --}}
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

                                {{-- CARDS DO RESUMO --}}
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
                            <p class="rounded-xl border border-dashed border-slate-300 bg-white p-4 text-center text-sm text-slate-500">
                                Nenhum resumo cadastrado.
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function abrirAba(idAba) {
            const conteudos = document.querySelectorAll('.tab-content');
            const botoes = document.querySelectorAll('.tab-btn');

            conteudos.forEach(function(conteudo) {
                conteudo.classList.add('hidden');
            });

            document.getElementById(idAba).classList.remove('hidden');

            botoes.forEach(function(botao) {
                botao.classList.remove('border-purple-600', 'text-purple-600');
                botao.classList.add('border-transparent', 'text-gray-500');

                if (botao.dataset.tab === idAba) {
                    botao.classList.remove('border-transparent', 'text-gray-500');
                    botao.classList.add('border-purple-600', 'text-purple-600');
                }
            });
        }

        document.querySelectorAll('.tab-btn').forEach(function(botao) {
            botao.addEventListener('click', function() {
                abrirAba(botao.dataset.tab);
            });
        });
    </script>
</x-app-layout>