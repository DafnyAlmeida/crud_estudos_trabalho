<x-app-layout>
    <main>
        <div>
            <div>
                <a href="">Pagina inicial</a> > <a href="">Nome materia</a> > <a href="">Contéudos</a> > <a href="">Nova tarefa</a>
            </div>
            <div>
                <div>
                    <h1>Nova tarefa</h1>
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
        <form id="form-conteudo" action="{{ route('tarefas.store', [$materia, $conteudo]) }}" method="POST">
                @csrf

                <label for="nome">Título da tarefa</label>
                <input type="text" id="titulo" name="titulo">

                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao"></textarea>

                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="a_fazer">A fazer</option>
                    <option value="fazendo">Fazendo</option>
                    <option value="feito">Feito</option>
                </select>

                <label for="prioridade">Prioridade</label>
                <select name="prioridade" id="prioridade">
                    <option value="alta">Alta</option>
                    <option value="media">Média</option>
                    <option value="baixa">Baixa</option>
                </select>
            </form>
        </div>
    </main>
</x-app-layout>