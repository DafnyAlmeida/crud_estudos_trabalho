<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\ConteudoController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\ResumoController;
use App\Http\Controllers\MaterialController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])
    ->scopeBindings()
    ->group(function () {

    Route::get('/dashboard', [MateriaController::class, 'index'])->name('dashboard');

    Route::name('materias.')->group(function () {
        Route::get('/materias/create', [MateriaController::class, 'create'])->name('create');

        Route::post('/materias', [MateriaController::class, 'store'])->name('store');

        Route::get('/materias/{materia}', [MateriaController::class, 'show'])->name('show');

        Route::get('/materias/{materia}/edit', [MateriaController::class, 'edit'])->name('edit');

        Route::put('/materias/{materia}', [MateriaController::class, 'update'])->name('update');

        Route::delete('/materias/{materia}', [MateriaController::class, 'destroy'])->name('destroy');
    });

    Route::name('conteudos.')->group(function () {

        Route::get('/materias/{materia}/conteudos/create', [ConteudoController::class, 'create'])
        ->name('create');

        Route::post('/materias/{materia}/conteudos', [ConteudoController::class, 'store'])
        ->name('store');

        Route::get('/materias/{materia}/conteudos/{conteudo}', [ConteudoController::class, 'show'])->name('show');

        Route::get('/materias/{materia}/conteudos/{conteudo}/edit', [ConteudoController::class, 'edit'])
        ->name('edit');

        Route::put('/materias/{materia}/conteudos/{conteudo}', [ConteudoController::class, 'update'])
        ->name('update');

        Route::delete('/materias/{materia}/conteudos/{conteudo}', [ConteudoController::class, 'destroy'])
        ->name('destroy');
    });

    Route::name('tarefas.')->group(function () {

        Route::get('/materias/{materia}/conteudos/{conteudo}/tarefas', [TarefaController::class, 'index'])
        ->name('index');

        Route::get('/materias/{materia}/conteudos/{conteudo}/tarefas/create', [TarefaController::class, 'create'])
        ->name('create');

        Route::post('/materias/{materia}/conteudos/{conteudo}/tarefas', [TarefaController::class, 'store'])
        ->name('store');

        Route::get('/conteudos/{conteudo}/materias', [TarefaController::class, 'show'])->name('show');

        Route::get('/materias/{materia}/conteudos/{conteudo}/tarefas/{tarefa}/edit', [TarefaController::class, 'edit'])
        ->name('edit');

        Route::put('/materias/{materia}/conteudos/{conteudo}/tarefas/{tarefa}', [TarefaController::class, 'update'])
        ->name('update');

        Route::delete('/materias/{materia}/conteudos/{conteudo}/tarefas/{tarefa}', [TarefaController::class, 'destroy'])
        ->name('destroy');
    });

    Route::name('resumos.')->group(function () {

        Route::get('/materias/{materia}/conteudos/{conteudo}/resumos', [ResumoController::class, 'index'])
        ->name('index');

        Route::get('/materias/{materia}/conteudos/{conteudo}/resumos/create', [ResumoController::class, 'create'])
        ->name('create');

        Route::post('/materias/{materia}/conteudos/{conteudo}/resumos', [ResumoController::class, 'store'])
        ->name('store');

        Route::get('/materias/{materia}/conteudos/{conteudo}/resumos/{resumo}/edit', [ResumoController::class, 'edit'])
        ->name('edit');

        Route::put('/materias/{materia}/conteudos/{conteudo}/resumos/{resumo}', [ResumoController::class, 'update'])
        ->name('update');

        Route::delete('/materias/{materia}/conteudos/{conteudo}/resumos/{resumo}', [ResumoController::class, 'destroy'])
        ->name('destroy');
    });

    Route::name('materiais.')->group(function () {
        
        Route::get('/materias/{materia}/conteudos/{conteudo}/materiais', [MaterialController::class, 'index'])
        ->name('index');

        Route::get('/materias/{materia}/conteudos/{conteudo}/materiais/create', [MaterialController::class, 'create'])
        ->name('create');

        Route::post('/materias/{materia}/conteudos/{conteudo}/materiais', [MaterialController::class, 'store'])
        ->name('store');

        Route::get('/materias/{materia}/conteudos/{conteudo}/materiais/{material}/edit', [MaterialController::class, 'edit'])
        ->name('edit');

        Route::put('/materias/{materia}/conteudos/{conteudo}/materiais/{material}', [MaterialController::class, 'update'])
        ->name('update');

        Route::delete('/materias/{materia}/conteudos/{conteudo}/materiais/{material}', [MaterialController::class, 'destroy'])
        ->name('destroy');
    });
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';