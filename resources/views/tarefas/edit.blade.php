<x-app-layout>
    <main>
        <div>
            <div>
                <a href="">Pagina inicial</a> > <a href="">Nome materia</a> > <a href="">Contéudos</a> > <a href="">Alterar tarefa</a>
            </div>
            <div>
                <div>
                    <h1>Alterar informações</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                </div>
                <div>
                    <button type="submit" form="form-conteudo">
                        Salvar
                    </button>
                    <a href="">Cancelar</a>
                </div>
            </div>
        </div>
        <div>
        <form id="form-conteudo" action="{{ route('tarefas.update', [$conteudo, $materia, $tarefa]) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" value="{{ $tarefa->titulo }}">

                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao">
                    {{ $tarefa->descricao }}
                </textarea>

                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="a_fazer" @selected(old('status', $tarefa->status) == 'a_fazer')>A fazer</option>
                    <option value="fazendo" @selected(old('iniciado', $tarefa->status) == 'fazendo')>Fazendo</option>
                    <option value="feito" @selected(old('status', $tarefa->status) == 'feito')>Feito</option>
                </select>

                <label for="prioridade">Prioridade</label>
                <select name="prioridade" id="prioridade">
                    <option value="alta" @selected(old('prioridade', $tarefa->prioridade) == 'alta')>Alta</option>
                    <option value="media" @selected(old('prioridade', $tarefa->prioridade) == 'media')>Média</option>
                    <option value="baixa" @selected(old('prioridade', $tarefa->prioridade) == 'baixa')>Baixa</option>
                </select>
            </form>
        </div>
    </main>
</x-app-layout>