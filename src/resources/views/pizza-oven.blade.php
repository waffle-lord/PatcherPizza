
@auth
    <x-app-layout>
        <h1>Hello There</h1>
    </x-app-layout>
@else
    <x-guest-layout>
        <div class="flex-row relative px-6 py-2 dark:bg-gray-900 dark:text-gray-100">
            <h2 class="flex-1 text-center">Patcher Pizza</h2>
            @if (Route::has('login'))
                <nav class="absolute top-0 right-0">
                    @guest
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Log in
                        </a>
                    @endguest
                </nav>
            @endif
        </div>
        <div class="flex h-screen justify-center items-center">
            <div class="flex">
                <x-pizza-progress />
            </div>
        </div>
    </x-guest-layout>
@endauth
