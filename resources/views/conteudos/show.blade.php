<x-app-layout>
    <main class="p-6">
        <div class="mb-6">
            <a href="{{ route('materias.show', $materia) }}" class="text-purple-600">
                Voltar para {{ $materia->nome }}
            </a>

            <h1 class="text-3xl font-bold mt-4">
                {{ $conteudo->nome }}
            </h1>

            <p class="text-gray-600 mt-2">
                {{ $conteudo->descricao }}
            </p>
        </div>

        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('tarefas.index', [$materia, $conteudo]) }}"
               class="block bg-white rounded-2xl shadow p-6 hover:shadow-lg transition">
                <h2 class="text-xl font-bold mb-2">Tarefas</h2>
                <p class="text-gray-600">
                    Ver, criar e organizar as tarefas deste conteúdo.
                </p>
            </a>

            <a href="{{ route('materiais.index', [$materia, $conteudo]) }}"
               class="block bg-white rounded-2xl shadow p-6 hover:shadow-lg transition">
                <h2 class="text-xl font-bold mb-2">Materiais</h2>
                <p class="text-gray-600">
                    Acessar links, PDFs, vídeos e arquivos de estudo.
                </p>
            </a>

            <a href="{{ route('resumos.index', [$materia, $conteudo]) }}"
               class="block bg-white rounded-2xl shadow p-6 hover:shadow-lg transition">
                <h2 class="text-xl font-bold mb-2">Resumos</h2>
                <p class="text-gray-600">
                    Ver e editar os resumos feitos para este conteúdo.
                </p>
            </a>
        </section>
    </main>
</x-app-layout>