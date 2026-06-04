<x-app-layout>
    <main>
        <div>
            <div>
                <a href="">Pagina inicial</a> > <a href="">Nome materia</a> > <a href="">Contéudos</a> > <a href="">Alterar conteudo</a>
            </div>
            <div>
                <div>
                    <h1>Alterar informações</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
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
        <form id="form-conteudo" action="{{ route('conteudos.update', [$materia->id, $conteudo->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="nome">Título do conteúdo</label>
                <input type="text" id="nome" name="nome" value="{{ $conteudo->nome }}">

                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao">
                    {{ $conteudo->descricao }}
                </textarea>

                <div>
                    <label for="area">Área</label>
                    <select name="area" id="area">
                        <option value="">Selecione uma área</option>
                        <option value="Álgebra" @selected(old('area', $conteudo->area) == 'Álgebra')>Álgebra</option>
                        <option value="Geometria" @selected(old('area', $conteudo->area) == 'Geometria')>Geometria</option>
                        <option value="Funções" @selected(old('area', $conteudo->area) == 'Funções')>Funções</option>
                        <option value="Logaritmos" @selected(old('area', $conteudo->area) == 'Logaritmos')>Logaritmos</option>
                        <option value="Trigonometria" @selected(old('area', $conteudo->area) == 'Trigonometria')>Trigonometria</option>
                        <option value="Estatística" @selected(old('area', $conteudo->area) == 'Estatística')>Estatística</option>
                    </select>
                </div>

                <label for="nivel_dificuldade">Nível de dificuldade</label>
                <select name="nivel_dificuldade" id="nivel_dificuldade">
                    <option value="basico" @selected(old('nivel_dificuldade', $conteudo->nivel_dificuldade) == 'basico')>Básico</option>
                    <option value="intermediario" @selected(old('nivel_dificuldade', $conteudo->nivel_dificuldade) == 'intermediario')>Intermediário</option>
                    <option value="avancado" @selected(old('nivel_dificuldade', $conteudo->nivel_dificuldade) == 'avancado')>Avançado</option>
                </select>

                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="nao_iniciado" @selected(old('status', $conteudo->status) == 'nao_iniciado')>Não iniciado</option>
                    <option value="iniciado" @selected(old('iniciado', $conteudo->status) == 'iniciado')>Iniciado</option>
                    <option value="em_andamento" @selected(old('status', $conteudo->status) == 'em_andamento')>Em andamento</option>
                    <option value="concluido" @selected(old('status', $conteudo->status) == 'concluido')>Concluído</option>
                </select>

                <label for="prioridade">Prioridade</label>
                <select name="prioridade" id="prioridade">
                    <option value="alta" @selected(old('prioridade', $conteudo->prioridade) == 'alta')>Alta</option>
                    <option value="media" @selected(old('prioridade', $conteudo->prioridade) == 'media')>Média</option>
                    <option value="baixa" @selected(old('prioridade', $conteudo->prioridade) == 'baixa')>Baixa</option>
                </select>
            </form>
        </div>
    </main>
</x-app-layout>