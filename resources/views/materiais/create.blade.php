<x-app-layout>
    <main>
        <div>
            <div>
                <a href="">Pagina inicial</a> > <a href="">Nome materia</a> > <a href="">Contéudos</a> > <a href="">Novo material</a>
            </div>
            <div>
                <div>
                    <h1>Novo material</h1>
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
        <form id="form-conteudo" action="{{ route('materiais.store', [$materia, $conteudo]) }}" method="POST">
                @csrf

                <label for="titulo">Título do material</label>
                <input type="text" id="titulo" name="titulo">

                <label for="link">Link</label>
                <input type="text" id="link" name="link">

                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao"></textarea>

                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo">
                    <option value="pdf">Pdf</option>
                    <option value="imagem">Imagem</option>
                    <option value="video">Vídeo</option>
                    <option value="link">Link</option>
                </select>

            </form>
        </div>
    </main>
</x-app-layout>