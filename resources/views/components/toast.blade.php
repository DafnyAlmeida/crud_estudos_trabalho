@if (session('success') || session('error'))
    <div 
        id="toast-message"
        class="fixed right-6 top-6 z-50 flex items-center gap-3 rounded-xl px-5 py-4 shadow-lg transition-all duration-500
            {{ session('success') ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-red-100 text-red-700 border border-red-200' }}"
    >
        @if (session('success'))
            <i class="fa-solid fa-circle-check text-xl"></i>

            <p class="font-semibold">
                {{ session('success') }}
            </p>
        @endif

        @if (session('error'))
            <i class="fa-solid fa-circle-exclamation text-xl"></i>

            <p class="font-semibold">
                {{ session('error') }}
            </p>
        @endif
    </div>

    <script>
        setTimeout(function () {
            const toast = document.getElementById('toast-message');

            if (toast) {
                toast.classList.add('opacity-0', 'translate-x-10');

                setTimeout(function () {
                    toast.remove();
                }, 500);
            }
        }, 3000);
    </script>
@endif