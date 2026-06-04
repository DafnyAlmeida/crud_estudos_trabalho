<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <main>
        <div>
            <div>
                <a href="">nome materia</a> > <a href="">Conteudos</a>
            </div>
            <div>
                <h1>Conteúdos</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <div>
                    <a href="{{ route('conteudos.create', $materia->id) }}">Adicionar conteúdo</a>
                </div>
            </div>
        </div>
        <div>
        @forelse ($conteudos as $conteudo)
                <div>
                    <a href="{{ route('conteudos.show', ['materia' => $materia, 'conteudo' => $conteudo]) }}">
                        <div>
                            <h2>{{ $conteudo->nome }}</h2>
                            <p>{{ $conteudo->descricao }}</p>
                            <p>{{ $conteudo->status }}</p>
                            <p>{{ $conteudo->area }}</p>
                        </div>
                        <div>
                            <p>{{ $conteudo->prioridade }}</p>
                        </div>
                    </a>
                    <div>
                        <div>
                            <form action="{{ route('conteudos.destroy', [$materia->id, $conteudo->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este conteúdo?')">
                                    <i class="fa-regular fa-trash-can"></i>
                                    Apagar
                                </button>
                            </form>
                        </div>
                        <div>
                            <i class="fa-regular fa-pen-to-square"></i>
                            <a href="{{ route('conteudos.edit', [$materia->id, $conteudo->id]) }}">
                                Editar
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white p-10 text-center">
                    <h2 class="text-lg font-bold text-slate-900">
                        Nenhuma contéudo cadastrado
                    </h2>

                    <p class="mt-2 text-slate-500">
                        Clique em “Adicionar conteúdo” para começar.
                    </p>
                </div>
            @endforelse
        </div>
    </main>
</x-app-layout> 