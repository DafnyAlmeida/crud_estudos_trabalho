<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Ação não permitida</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100 px-6">
    <main class="bg-white rounded-2xl shadow-lg p-8 max-w-md w-full text-center">
        <h1 class="text-5xl font-bold text-red-600 mb-4">405</h1>

        <h2 class="text-2xl font-semibold text-gray-800 mb-3">
            Ação não permitida
        </h2>

        <p class="text-gray-600 mb-6">
            Essa página não pode ser acessada diretamente por esse método.
        </p>

        @auth
            <a href="{{ route('dashboard') }}"
               class="inline-block px-5 py-2 rounded-lg bg-purple-600 text-white hover:bg-purple-700">
                Voltar para o dashboard
            </a>
        @else
            <a href="{{ route('login') }}"
               class="inline-block px-5 py-2 rounded-lg bg-purple-600 text-white hover:bg-purple-700">
                Ir para o login
            </a>
        @endauth
    </main>
</body>
</html>