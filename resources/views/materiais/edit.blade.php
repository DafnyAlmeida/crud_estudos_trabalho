<x-app-layout>
    <main>
        <div>
            <div>
                <a href="">Pagina inicial</a> > <a href="">Nome materia</a> > <a href="">Contéudos</a> > <a href="">Alterar material</a>
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
        <form id="form-conteudo" action="{{ route('materiais.update', ['materia' => $materia->id, 'conteudo' => $conteudo->id, 'material' => $material->id ]) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" value="{{ $material->titulo }}">

                <label for="link">Link</label>
                <input type="text" id="link" name="link" value="{{ $material->link }}">

                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao">
                    {{ $material->descricao }}
                </textarea>

                <select name="tipo" class="w-full rounded-lg border-gray-300">
    <option value="pdf" @selected(old('tipo', $material->tipo ?? '') == 'pdf')>
        PDF
    </option>

    <option value="link" @selected(old('tipo', $material->tipo ?? '') == 'link')>
        Link
    </option>

    <option value="video" @selected(old('tipo', $material->tipo ?? '') == 'video')>
        Vídeo
    </option>

    <option value="imagem" @selected(old('tipo', $material->tipo ?? '') == 'imagem')>
        Imagem
    </option>
</select>

            </form>
        </div>
    </main>
</x-app-layout>