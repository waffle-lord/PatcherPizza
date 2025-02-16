@push('meta')
    <meta http-equiv="refresh" content="30">
@endpush

@auth
    <x-app-layout>
        <div class="flex h-screen justify-center items-center">
            <div class="w-full flex p-20">
                @if($order === null)
                    <div class="w-full text-center">
                        <p>The kitchen is closed :)</p>
                    </div>
                @else
                    <x-pizza-progress :order="$order"/>
                @endif
            </div>
        </div>
    </x-app-layout>
@else
    <x-guest-layout>
        <div class="flex-row relative px-6 py-2 text-black dark:text-white bg-white dark:bg-[#111827]">
            <h2 class="flex-1 text-center">Patcher Pizza</h2>
            <div class="absolute flex flex-row top-2 right-5">
                <x-dark-mode-toggle />
                @if (Route::has('login'))
                    <nav >
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

        </div>
        <div class="flex h-screen justify-center items-center text-black dark:text-white bg-[#e1e1e1] dark:bg-[#212f4d]">
            <div class="w-full flex p-20">
                @if($order === null)
                    <div class="w-full text-center">
                        <p>The kitchen is closed :)</p>
                    </div>
                @else
                    <x-pizza-progress :order="$order"/>
                @endif
            </div>
        </div>
    </x-guest-layout>
@endauth
