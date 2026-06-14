@include('errors.base', [
    'code' => '405',
    'eyebrow' => 'Método não permitido',
    'title' => 'Essa ação não pode ser feita por aqui.',
    'message' => 'A página existe, mas a forma como você tentou acessá-la não é permitida. Isso pode acontecer ao enviar um formulário com o método errado.',
    'tip' => 'Volte para a página anterior e tente novamente. Se for um formulário de edição ou exclusão, confira se ele está usando o método correto.',
])