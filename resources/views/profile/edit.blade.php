<x-app-layout>
    <div class="min-h-screen bg-[#f7f7fb] py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <h1 class="text-4xl font-bold tracking-tight text-slate-950">
                    Meu perfil
                </h1>
                <p class="mt-2 text-base text-slate-500">
                    Gerencie suas informações pessoais e a segurança da sua conta.
                </p>
            </div>

            @if (session('status') === 'profile-updated')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2500)"
                    class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700"
                >
                    Perfil atualizado com sucesso!
                </div>
            @endif

            {{-- CARD SUPERIOR --}}
            <div class="mb-6 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex flex-col items-start justify-between gap-6 md:flex-row md:items-center">
                    <div class="flex items-center gap-5">
                        <div class="h-28 w-28 overflow-hidden rounded-full bg-violet-100 ring-4 ring-violet-50">
                            @if ($user->avatar)
                                <img
                                    src="{{ asset('storage/' . $user->avatar) }}"
                                    alt="Foto de perfil"
                                    class="h-full w-full object-cover"
                                >
                            @else
                                <div class="flex h-full w-full items-center justify-center text-4xl font-bold text-violet-700">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                            @endif
                        </div>

                        <div>
                            <h2 class="text-3xl font-bold text-slate-950">
                                {{ $user->name }}
                            </h2>

                            <div class="mt-2 flex items-center gap-2 text-slate-500">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 7.5v9A2.25 2.25 0 0 1 19.5 18.75h-15A2.25 2.25 0 0 1 2.25 16.5v-9m19.5 0A2.25 2.25 0 0 0 19.5 5.25h-15A2.25 2.25 0 0 0 2.25 7.5m19.5 0-8.69 5.212a2.25 2.25 0 0 1-2.32 0L2.25 7.5" />
                                </svg>
                                <span class="text-base">{{ $user->email }}</span>
                            </div>

                            <div class="mt-4 inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-1.5 text-sm font-semibold text-green-700">
                                <span class="h-2.5 w-2.5 rounded-full bg-green-500"></span>
                                Conta ativa
                            </div>
                        </div>
                    </div>

                    <button
                        type="button"
                        onclick="document.getElementById('name').focus()"
                        class="inline-flex items-center gap-2 rounded-xl border border-violet-300 px-4 py-2.5 text-sm font-semibold text-violet-700 transition hover:bg-violet-50"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487a2.25 2.25 0 1 1 3.182 3.182L7.5 20.213 3 21l.787-4.5L16.862 4.487Z"/>
                        </svg>
                        Editar perfil
                    </button>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">

                {{-- INFORMAÇÕES DO PERFIL --}}
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="mb-6 flex items-start gap-3">
                        <div class="rounded-xl bg-violet-100 p-2.5 text-violet-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-950">Informações do perfil</h3>
                            <p class="text-sm text-slate-500">Atualize suas informações pessoais.</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        @method('patch')

                        <div>
                            <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">
                                Nome
                            </label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name', $user->name) }}"
                                class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm shadow-sm focus:border-violet-500 focus:ring-violet-500"
                                required
                                autofocus
                            >
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">
                                E-mail
                            </label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email', $user->email) }}"
                                class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm shadow-sm focus:border-violet-500 focus:ring-violet-500"
                                required
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button
                                type="submit"
                                class="inline-flex items-center gap-2 rounded-xl bg-violet-600 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-violet-700"
                            >
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                Salvar alterações
                            </button>
                        </div>
                    </form>
                </div>

                {{-- FOTO DO PERFIL COM PREVIEW --}}
                <div
                    x-data="{
                        photoName: null,
                        photoPreview: null,
                        updatePhotoPreview() {
                            const file = this.$refs.photo.files[0];
                            if (!file) return;
                            this.photoName = file.name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                this.photoPreview = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    }"
                    class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm"
                >
                    <div class="mb-6 flex items-start gap-3">
                        <div class="rounded-xl bg-violet-100 p-2.5 text-violet-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l.159.159a2.25 2.25 0 0 0 3.182 0l3.409-3.409a2.25 2.25 0 0 1 3.182 0l1.409 1.409M3.75 18h16.5A1.5 1.5 0 0 0 21.75 16.5v-9A1.5 1.5 0 0 0 20.25 6h-16.5A1.5 1.5 0 0 0 2.25 7.5v9A1.5 1.5 0 0 0 3.75 18ZM8.25 10.5h.008v.008H8.25V10.5Z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-950">Foto do perfil</h3>
                            <p class="text-sm text-slate-500">Selecione uma nova foto para o seu perfil.</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <input type="hidden" name="name" value="{{ $user->name }}">
                        <input type="hidden" name="email" value="{{ $user->email }}">

                        <div class="grid gap-6 md:grid-cols-2 md:items-start">
                            <div>
                                <label class="mb-3 block text-sm font-semibold text-slate-700">
                                    Escolher foto
                                </label>

                                <input
                                    type="file"
                                    name="avatar"
                                    x-ref="photo"
                                    @change="updatePhotoPreview()"
                                    class="hidden"
                                    id="avatar"
                                    accept="image/*"
                                >

                                <label
                                    for="avatar"
                                    class="flex h-44 w-full cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-violet-300 bg-violet-50/40 px-6 text-center transition hover:bg-violet-50"
                                >
                                    <svg class="mb-3 h-8 w-8 text-violet-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V6.75m0 0-3.75 3.75M12 6.75l3.75 3.75M3.75 15v2.25A2.25 2.25 0 0 0 6 19.5h12a2.25 2.25 0 0 0 2.25-2.25V15"/>
                                    </svg>

                                    <span class="font-semibold text-slate-700">Clique para escolher</span>
                                    <span class="mt-1 text-sm text-slate-500">PNG, JPG, JPEG, WEBP ou GIF até 2MB</span>

                                    <template x-if="photoName">
                                        <span class="mt-3 text-sm font-medium text-violet-700" x-text="photoName"></span>
                                    </template>
                                </label>

                                @error('avatar')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-3 block text-sm font-semibold text-slate-700">
                                    Pré-visualização da nova foto
                                </label>

                                <div class="flex min-h-[176px] items-center justify-center rounded-2xl border border-slate-200 bg-slate-50">
                                    <template x-if="photoPreview">
                                        <img
                                            :src="photoPreview"
                                            alt="Preview"
                                            class="h-32 w-32 rounded-full object-cover ring-4 ring-violet-100"
                                        >
                                    </template>

                                    <template x-if="!photoPreview">
                                        <div>
                                            @if ($user->avatar)
                                                <img
                                                    src="{{ asset('storage/' . $user->avatar) }}"
                                                    alt="Foto atual"
                                                    class="h-32 w-32 rounded-full object-cover ring-4 ring-violet-100"
                                                >
                                            @else
                                                <div class="flex h-32 w-32 items-center justify-center rounded-full bg-violet-100 text-4xl font-bold text-violet-700 ring-4 ring-violet-50">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </div>
                                            @endif
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button
                                type="submit"
                                class="inline-flex items-center gap-2 rounded-xl bg-violet-600 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-violet-700"
                            >
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                Salvar alterações
                            </button>
                        </div>
                    </form>
                </div>

                {{-- SENHA --}}
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="mb-6 flex items-start gap-3">
                        <div class="rounded-xl bg-violet-100 p-2.5 text-violet-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 0h10.5A2.25 2.25 0 0 1 19.5 12.75v6A2.25 2.25 0 0 1 17.25 21h-10.5A2.25 2.25 0 0 1 4.5 18.75v-6A2.25 2.25 0 0 1 6.75 10.5Z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-950">Atualizar senha</h3>
                            <p class="text-sm text-slate-500">
                                Certifique-se de que sua conta está usando uma senha longa e segura.
                            </p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                        @csrf
                        @method('put')

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <label for="current_password" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Senha atual
                                </label>
                                <input
                                    id="current_password"
                                    name="current_password"
                                    type="password"
                                    class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm shadow-sm focus:border-violet-500 focus:ring-violet-500"
                                >
                                @error('current_password', 'updatePassword')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Nova senha
                                </label>
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm shadow-sm focus:border-violet-500 focus:ring-violet-500"
                                >
                                @error('password', 'updatePassword')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-slate-700">
                                Confirmar nova senha
                            </label>
                            <input
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm shadow-sm focus:border-violet-500 focus:ring-violet-500"
                            >
                        </div>

                        <div class="flex justify-end">
                            <button
                                type="submit"
                                class="inline-flex items-center gap-2 rounded-xl bg-violet-600 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-violet-700"
                            >
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                Salvar alterações
                            </button>
                        </div>
                    </form>
                </div>

                {{-- EXCLUIR CONTA --}}
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="mb-6 flex items-start gap-3">
                        <div class="rounded-xl bg-red-100 p-2.5 text-red-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.008v.008H12v-.008Zm8.25-.562c0 .414-.336.75-.75.75H4.5a.75.75 0 0 1-.75-.75c0-.133.036-.263.105-.377l7.5-12.375a.75.75 0 0 1 1.29 0l7.5 12.375a.75.75 0 0 1 .105.377Z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-950">Excluir conta</h3>
                            <p class="text-sm text-slate-500">
                                Uma vez que sua conta for excluída, todos os seus dados serão permanentemente apagados.
                            </p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('profile.destroy') }}" class="space-y-5">
                        @csrf
                        @method('delete')

                        <div>
                            <label for="password_delete" class="mb-2 block text-sm font-semibold text-slate-700">
                                Confirme sua senha para continuar
                            </label>
                            <input
                                id="password_delete"
                                name="password"
                                type="password"
                                class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm shadow-sm focus:border-red-500 focus:ring-red-500"
                            >
                            @error('password', 'userDeletion')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button
                                type="submit"
                                onclick="return confirm('Tem certeza que deseja excluir sua conta?')"
                                class="rounded-xl border border-red-300 bg-white px-5 py-3 text-sm font-bold text-red-600 transition hover:bg-red-50"
                            >
                                Excluir conta
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-8 flex flex-col items-center justify-center gap-4 sm:flex-row">
                <a
                    href="{{ route('dashboard') }}"
                    class="rounded-xl border border-slate-200 bg-white px-8 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                >
                    Cancelar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>