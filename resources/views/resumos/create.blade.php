<x-app-layout>
    <main>
        <div>
            <div>
                <a href="">Pagina inicial</a> > <a href="">Nome materia</a> > <a href="">Contéudos</a> > <a href="">Novo resumo</a>
            </div>
            <div>
                <div>
                    <h1>Nova resumo</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                </div>
                <div>
                    <button type="submit" form="form-conteudo">
                        Salvar
                    </button>
                    <a href="{{ route('materias.show', $materia->id) }}">Cancelar</a>
                </div>
            </div>
        </div>
        <div>
        <form id="form-conteudo" action="{{ route('resumos.store', [$materia, $conteudo]) }}" method="POST">
                @csrf

                <label for="nome">Título do resumo</label>
                <input type="text" id="nome" name="nome">

                <label for="conceito">Conceito principal</label>
                <textarea name="conceito" id="conceito"></textarea>

                <label for="caracteristicas">Principais caracteristicas</label>
                <textarea name="caracteristicas" id="caracteristicas"></textarea>

                <label for="tipos_classificacoes">Tipos ou classificações</label>
                <textarea name="tipos_classificacoes" id="tipos_classificacoes"></textarea>

                <label for="funcoes">Funções</label>
                <textarea name="funcoes" id="funcoes"></textarea>

                <label for="exemplos">Exemplos</label>
                <textarea name="exemplos" id="exemplos"></textarea>

                <label for="informacoes_importantes">Informações importantes</label>
                <textarea name="informacoes_importantes" id="informacoes_importantes"></textarea>

                <label for="duvidas">Dúvidas ou erros</label>
                <textarea name="duvidas" id="duvidas"></textarea>

                <label for="revisao_rapida">Revisão rápida</label>
                <textarea name="revisao_rapida" id="revisao_rapida"></textarea>
            </form>
        </div>
    </main>
</x-app-layout>