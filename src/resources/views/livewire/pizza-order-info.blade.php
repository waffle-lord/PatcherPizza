<div class="w-full text-center bg-[#e1e1e1] dark:bg-[#212f4d]">
    <h1 class="text-3xl p-6 text-blue-500 dark:text-indigo-500">Order #{{ $order->order_number }}</h1>
    <div class="grid grid-cols-9 justify-items-center p-20 invisible md:visible lg:visible">
        @for($i = 0; $i < count($steps); $i++)
            <x-step-label :label="$steps[$i]" />
            @if($i < count($steps) - 1)
                <div class="flex items-center w-full">
                    <div class="w-full bg-gray-400 rounded-full h-2.5 dark:bg-[#111827]">
                        <div class="bg-blue-500 dark:bg-indigo-500 h-2.5 rounded-full" style="width: {{ $order->step_progress }}%"></div>
                    </div>
                </div>
            @endif
        @endfor

    </div>
    <div class="lg:hidden md:hidden">
        @for($i = 0; $i < count($steps); $i++)
            <x-step-label :label="$steps[$i]" />
            @if($i < count($steps) - 1)
                <div class="flex items-center w-full">
                    <div class="w-full bg-gray-400 rounded-full h-2.5 dark:bg-[#111827]">
                        <div class="bg-blue-500 dark:bg-indigo-500 h-2.5 rounded-full" style="width: {{ $order->step_progress }}%"></div>
                    </div>
                </div>
            @endif
        @endfor

    </div>
    <p>{{ $order->message }}</p>
    <p class="text-sm/relaxed text-gray-700 dark:text-gray-400">This page refreshes automatically :)</p>
</div>
