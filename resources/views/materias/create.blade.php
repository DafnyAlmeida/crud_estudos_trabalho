<x-app-layout>
    <main>
        <div>
            <div>
                <a href="">Pagina inicial</a> > <a href="">Adicionar materia</a>
            </div>
            <div>
                <h1>Nova matéria</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        <div>
            <form action="{{ route('materias.store') }}" method="post">
                @csrf
                <label for="nome">Nome da materia</label>
                <input type="text" id="nome" name="nome">

                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao"></textarea>

                <div>
                    <label for="cor_tema">Cor tema</label>
                    <input type="color" name="cor_tema" id="cor_tema">

                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="ativa">Ativa</option>
                        <option value="arquivada">Arquivada</option>
                    </select>
                </div>

                <label for="icone_tema">Ícone</label>
                <select name="icone_tema" id="icone_tema">
                    <option value="fa-regular fa-pen-to-square">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </option>
                    <option value="fa-regular fa-trash-can">
                        <i class="fa-regular fa-trash-can"></i>
                    </option>
                </select>

                <input type="submit" value="Salvar">
                <a href="{{ route('dashboard') }}">Cancelar</a>
            </form>
        </div>
    </main>
</x-app-layout>