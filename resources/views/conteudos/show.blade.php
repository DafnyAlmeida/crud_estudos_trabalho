<x-app-layout>
    <main class="min-h-screen bg-gray-50 px-8 py-8">
        <div class="max-w-7xl mx-auto">

            <!-- Cabeçalho -->
            <div class="mb-8">
                <h1 class="text-5xl font-bold text-slate-900 mb-3">
                    Nome conteúdo
                </h1>

                <p class="text-gray-500 text-lg">
                    Descrição do conteúdo aqui
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
                    <div>
                        <div>
                            <h2>Tarefas</h2>
                            <p>Quantidade de tarefas</p>

                            <a href="{{ route('tarefas.create', ['materia' => $materia->id, 'conteudo' => $conteudo->id]) }}">
                                Adicionar tarefa
                            </a>
                        </div>
                        <div class="flex items-center justify-center gap-10">
                            <div class="boder border-color">
                                <h2>A fazer</h2>

                                @forelse($conteudo->tarefas->where('status', 'a_fazer') as $tarefa)
                                    <div>
                                        <h3>
                                            {{ $tarefa->titulo }}
                                        </h3>
                                        <p>
                                            {{ $tarefa->descricao ?? "Sem descrição"}}
                                        </p>
                                        <p>
                                            Cadastro: {{ $tarefa->created_at->format('d/m/Y') }}
                                        </p>
                                        <p>
                                            Prioridade: {{ $tarefa->prioridade }}
                                        </p>
                                        <div class="flex items-center justify-center gap-10">
                                            <a href="{{ route('tarefas.edit', [$materia, $conteudo, $tarefa]) }}">
                                                Modificar
                                            </a>
                                            <form action="{{ route('tarefas.destroy', [$materia, $conteudo, $tarefa]) }}" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="text-sm text-red-600">
                                                    Excluir
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-500">
                                        Nenhuma tarefa a fazer.
                                    </p>
                                @endforelse
                            </div>

                            <div>
                                <h2>Fazendo</h2>
                                    @forelse($conteudo->tarefas->where('status', 'fazendo') as $tarefa)
                                        <h3>
                                            {{ $tarefa->titulo }}
                                        </h3>
                                        <p>
                                            {{ $tarefa->descricao ?? "Sem descrição"}}
                                        </p>
                                        <p>
                                            Cadastro: {{ $tarefa->created_at->format('d/m/Y') }}
                                        </p>
                                        <p>
                                            Prioridade: {{ $tarefa->prioridade }}
                                        </p>
                                        <div class="flex items-center justify-center gap-10">
                                            <a href="{{ route('tarefas.edit', [$materia, $conteudo, $tarefa]) }}">
                                                Modificar
                                            </a>
                                            <form action="{{ route('tarefas.destroy', [$materia, $conteudo, $tarefa]) }}" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="text-sm text-red-600">
                                                    Excluir
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-500">
                                        Nenhuma tarefa a fazer.
                                    </p>
                                @endforelse
                            </div>

                            <div>
                                <h2>Feito</h2>
                                @forelse($conteudo->tarefas->where('status', 'feito') as $tarefa)
                                        <h3>
                                            {{ $tarefa->titulo }}
                                        </h3>
                                        <p>
                                            {{ $tarefa->descricao ?? "Sem descrição"}}
                                        </p>
                                        <p>
                                            Cadastro: {{ $tarefa->created_at->format('d/m/Y') }}
                                        </p>
                                        <p>
                                            Prioridade: {{ $tarefa->prioridade }}
                                        </p>
                                        <div class="flex items-center justify-center gap-10">
                                            <a href="{{ route('tarefas.edit', [$materia, $conteudo, $tarefa]) }}">
                                                Modificar
                                            </a>
                                            <form action="{{ route('tarefas.destroy', [$materia, $conteudo, $tarefa]) }}" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="text-sm text-red-600">
                                                    Excluir
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-500">
                                        Nenhuma tarefa a fazer.
                                    </p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ABA MATERIAIS -->
                <div class="tab-content hidden" id="materiais">
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8">
                        <h2 class="text-2xl font-bold mb-6">Materiais</h2>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div class="border rounded-xl p-5">
                                <h3 class="font-semibold">PDF sobre orações</h3>
                                <p class="text-gray-500">Material em PDF</p>
                            </div>

                            <div class="border rounded-xl p-5">
                                <h3 class="font-semibold">Vídeo explicativo</h3>
                                <p class="text-gray-500">Aula gravada</p>
                            </div>

                            <div class="border rounded-xl p-5">
                                <h3 class="font-semibold">Texto complementar</h3>
                                <p class="text-gray-500">Leitura extra</p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ABA RESUMOS -->
                <div class="tab-content hidden" id="resumos">
                    <div>
                        <h1>Resumos</h1>
                        <a href="{{ route('resumos.create', ['materia'=> $materia->id, 'conteudo' => $conteudo->id]) }}">Adicionar resumo</a>
                    </div>
                    @forelse($conteudo->resumos as $resumo)
                        <div>
                            <div>
                                <h2>Resumo sobre </h2>
                                <a href="{{ route('resumos.edit', [$materia, $conteudo, $resumo]) }}">Editar</a>

                                <form action="{{ route('resumos.destroy', [$materia, $conteudo, $resumo]) }}" onsubmit="return confirm('Tem certeza que deseja excluir este resumo?')" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-sm text-red-600">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                            <div>
                                <div>
                                    <h2>Conceitos principais</h2>
                                    <p>
                                        {{ $resumo->conceito }}
                                    </p>
                                </div>
                                <div>
                                    <h2>Principais caracteristicas</h2>
                                    <p>
                                        {{ $resumo->caracteristicas }}
                                    </p>
                                </div>
                                <div>
                                    <h2>Classificações</h2>
                                    <p>
                                        {{ $resumo->tipos_classificacoes }}
                                    </p>
                                </div>
                                <div>
                                    <h2>Funções</h2>
                                    <p>
                                        {{ $resumo->funcoes }}
                                    </p>
                                </div>
                                <div>
                                    <h2>Exemplos</h2>
                                    <p>
                                        {{ $resumo->exemplos }}
                                    </p>
                                </div>
                                <div>
                                    <h2>Informações importantes</h2>
                                    <p>
                                        {{ $resumo->informacoes_importantes }}
                                    </p>
                                </div>
                                <div>
                                    <h2>Dúvidas e erros</h2>
                                    <p>
                                        {{ $resumo->duvidas }}
                                    </p>
                                </div>
                                <div>
                                    <h2>Revisão rápida</h2>
                                    <p>
                                        {{ $resumo->revisao_rapida}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8">
                                <p class="text-gray-600 leading-relaxed">
                                    Nenhum resumo feito
                                </p>
                            </div>
                        @endforelse   
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