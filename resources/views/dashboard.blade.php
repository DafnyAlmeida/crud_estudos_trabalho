<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main class="flex flex-col gap-10 p-10">
        <div class="flex gap-10">
            <div>
                <p>Página inicial</p>
                <h1>Olá, seja bem-vindo(a) {{ $nome_user }}</h1>
                <p>
                    Página inicial do sistema com acesso rápido às matérias.
                    Cada card leva para uma matéria, onde os conteúdos são separados por áreas usando cores e ícones.
                </p>
            </div>

            <div class="bg-gray-400 h-8 rounded-lg w-60 flex justify-center items-center">
                <a href="{{ route('materias.create') }}">
                    Adicionar nova matéria
                </a>
            </div>
        </div>

        <div class="flex gap-10">
            @forelse ($materias as $materia)
                <div class="border border-black rounded-large py-2 px-3">
                    <a href="{{ route('materias.show', $materia->id) }}">
                        <div class="">
                            <i class="{{ $materia->icone_tema }}"></i>

                            <h2>{{ $materia->nome }}</h2>
                            <p>{{ $materia->descricao }}</p>
                        </div>

                        <div>
                            <i class="fa-regular fa-folder-open"></i>

                            <span>
                                {{ $materia->conteudos_count ?? 0 }} conteúdos
                            </span>
                        </div>
                    </a>

                    <div>
                        <div>
                            <a href="{{ route('materias.edit', $materia->id) }}">
                                <i class="fa-regular fa-pen-to-square"></i>
                                Editar
                            </a>
                        </div>

                        <div>
                            <form action="{{ route('materias.destroy', $materia->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" onclick="return confirm('Tem certeza que deseja apagar esta matéria?')">
                                    <i class="fa-regular fa-trash-can"></i>
                                    Apagar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div>
                    <h2>
                        Nenhuma matéria cadastrada
                    </h2>

                    <p>
                        Clique em “Adicionar nova matéria” para começar.
                    </p>
                </div>
            @endforelse
        </div>
    </main>
</x-app-layout>