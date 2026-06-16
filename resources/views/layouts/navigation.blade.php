<nav x-data="{ open: false }"
     class="left-0 top-0 z-50 w-full border-b border-violet-100 bg-white/80 backdrop-blur-xl">

    <div class="flex h-20 max-w-8xl items-center justify-between px-5 lg:px-10">

        <!-- Logo -->
        <div class="shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
        </div>

        <!-- Perfil Desktop -->
        <div class="hidden items-center gap-4 sm:flex">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center gap-3 rounded-2xl border border-violet-100 bg-white px-3 py-2 text-sm font-medium text-slate-600 shadow-sm transition hover:border-violet-200 hover:bg-violet-50 focus:outline-none">

                        <div class="h-9 w-9 overflow-hidden rounded-full bg-violet-100 ring-2 ring-violet-100">
                            @if (Auth::user()->avatar)
                                <img
                                    src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                    alt="Foto de perfil"
                                    class="h-full w-full object-cover"
                                >
                            @else
                                <div class="flex h-full w-full items-center justify-center text-sm font-black text-violet-700">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                        </div>

                        <div class="hidden text-left lg:block">
                            <p class="max-w-32 truncate text-sm font-bold text-slate-800">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-xs font-medium text-slate-400">
                                Minha conta
                            </p>
                        </div>

                        <svg class="h-4 w-4 fill-current text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Sair') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

        <!-- Botão Mobile -->
        <div class="flex items-center md:hidden">
            <button @click="open = ! open"
                    class="inline-flex items-center justify-center rounded-xl bg-violet-50 p-2 text-violet-700 transition hover:bg-violet-100 focus:outline-none">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }"
                          class="inline-flex"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />

                    <path :class="{'hidden': ! open, 'inline-flex': open }"
                          class="hidden"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div :class="{'block': open, 'hidden': ! open}"
         class="hidden border-t border-violet-100 bg-white/95 px-5 pb-5 pt-3 shadow-lg shadow-violet-100 md:hidden">

        <div class="space-y-2">
            
        </div>

        <!-- Perfil Mobile -->
        <div class="mt-5 border-t border-violet-100 pt-5">
            <div class="flex items-center gap-3">
                <div class="h-12 w-12 overflow-hidden rounded-full bg-violet-100 ring-2 ring-violet-100">
                    @if (Auth::user()->avatar)
                        <img
                            src="{{ asset('storage/' . Auth::user()->avatar) }}"
                            alt="Foto de perfil"
                            class="h-full w-full object-cover"
                        >
                    @else
                        <div class="flex h-full w-full items-center justify-center text-base font-black text-violet-700">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <div>
                    <div class="text-base font-black text-slate-800">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="text-sm font-medium text-slate-500">
                        {{ Auth::user()->email }}
                    </div>
                </div>
            </div>

            <div class="mt-4 space-y-2">
                <a href="{{ route('profile.edit') }}"
                   class="block rounded-xl px-4 py-3 text-sm font-bold text-slate-500 transition hover:bg-violet-50 hover:text-violet-700">
                    Perfil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();"
                       class="block rounded-xl px-4 py-3 text-sm font-bold text-red-500 transition hover:bg-red-50">
                        Sair
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>