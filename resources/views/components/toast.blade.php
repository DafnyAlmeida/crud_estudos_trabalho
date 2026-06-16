@if (session('success') || session('error'))
    @php
        $isSuccess = session('success');
        $message = session('success') ?? session('error');

        $toastClasses = $isSuccess
            ? 'border-green-200 bg-white text-green-700'
            : 'border-red-200 bg-white text-red-700';

        $iconBoxClasses = $isSuccess
            ? 'bg-green-100 text-green-600'
            : 'bg-red-100 text-red-600';

        $progressClasses = $isSuccess
            ? 'bg-green-500'
            : 'bg-red-500';

        $icon = $isSuccess
            ? 'fa-circle-check'
            : 'fa-circle-exclamation';

        $title = $isSuccess
            ? 'Tudo certo!'
            : 'Ops, algo deu errado!';
    @endphp

    <div
        x-data="{ show: true }"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-x-8 scale-95"
        x-transition:enter-end="opacity-100 translate-x-0 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-x-0 scale-100"
        x-transition:leave-end="opacity-0 translate-x-8 scale-95"
        x-init="setTimeout(() => show = false, 3500)"
        class="fixed right-5 top-5 z-50 w-[calc(100%-2.5rem)] max-w-sm overflow-hidden rounded-2xl border shadow-xl shadow-slate-200/70 {{ $toastClasses }}"
    >
        <div class="flex items-start gap-3 px-4 py-4">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl {{ $iconBoxClasses }}">
                <i class="fa-solid {{ $icon }} text-lg"></i>
            </div>

            <div class="min-w-0 flex-1">
                <h3 class="text-sm font-black text-slate-900">
                    {{ $title }}
                </h3>

                <p class="mt-0.5 text-sm font-semibold leading-relaxed">
                    {{ $message }}
                </p>
            </div>

            <button
                type="button"
                @click="show = false"
                class="rounded-lg p-1.5 text-slate-400 transition hover:bg-slate-100 hover:text-slate-600"
            >
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>

        <div class="h-1 w-full bg-slate-100">
            <div
                class="h-full {{ $progressClasses }}"
                style="animation: toast-progress 3.5s linear forwards;"
            ></div>
        </div>
    </div>

    <style>
        @keyframes toast-progress {
            from {
                width: 100%;
            }

            to {
                width: 0%;
            }
        }
    </style>
@endif