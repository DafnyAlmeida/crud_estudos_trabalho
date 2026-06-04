<x-app-layout>
    <main>
        <div>
            <div>
                <a href="">Pagina inicial</a> > <a href="">Nome materia</a> > <a href="">Contéudos</a> > <a href="">Novo conteúdo</a>
            </div>
            <div>
                <div>
                    <h1>Novo contéudo</h1>
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
        <form id="form-conteudo" action="{{ route('conteudos.store', $materia->id) }}" method="POST">
                @csrf

                <label for="nome">Título do conteúdo</label>
                <input type="text" id="nome" name="nome">

                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao"></textarea>

                <div>
                    <label for="area">Área</label>
                    <select name="area" id="area">
                        <option value="">Selecione uma área</option>
                        <option value="Álgebra">Álgebra</option>
                        <option value="Geometria">Geometria</option>
                        <option value="Funções">Funções</option>
                        <option value="Logaritmos">Logaritmos</option>
                        <option value="Trigonometria">Trigonometria</option>
                        <option value="Estatística">Estatística</option>
                    </select>
                </div>

                <label for="nivel_dificuldade">Nível de dificuldade</label>
                <select name="nivel_dificuldade" id="nivel_dificuldade">
                    <option value="basico">Básico</option>
                    <option value="intermediario">Intermediário</option>
                    <option value="avancado">Avançado</option>
                </select>

                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="nao_iniciado">Não iniciado</option>
                    <option value="iniciado">Iniciado</option>
                    <option value="em_andamento">Em andamento</option>
                    <option value="concluido">Concluído</option>
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