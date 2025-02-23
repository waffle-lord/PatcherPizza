<div wire:poll.30s class="w-full text-center bg-[#e1e1e1] dark:bg-[#212f4d]">
    <h1 class="text-3xl text-blue-500 dark:text-indigo-500">Order #{{ $order->order_number }}</h1>
    <p class="text-sm/relaxed text-gray-700 dark:text-gray-400">This page refreshes automatically :)</p>
    <div class="grid grid-cols-9 justify-items-center p-20 hidden md:flex lg:flex">
        @for($i = 0; $i < count($steps); $i++)
            <x-step-label :label="$steps[$i]" :position="$i" :current="$order->current_step"/>
            @if($i < count($steps))
                <div class="flex items-center w-full">
                    <div class="w-full bg-gray-400 h-2.5 dark:bg-[#111827]">
                        @if($i < $order->current_step)
                            <div class="bg-green-600 dark:bg-green-700 h-2.5" style="width: 100%"></div>
                        @elseif($i == $order->current_step)
                            <div class="bg-blue-500 dark:bg-indigo-500 h-2.5 rounded-r-md" style="width: {{ $order->step_progress }}%"></div>
                        @else
                            <div class="bg-blue-500 dark:bg-indigo-500 h-2.5 rounded-r-md" style="width: 0"></div>
                        @endif
                    </div>
                </div>
            @endif
        @endfor
        <x-step-label label="Done" :position="$i" :current="$order->current_step"/>
        <div class="bg-blue-500 dark:bg-indigo-500 h-2.5 rounded-r-md" style="width: 0"></div>

    </div>
    <div class="py-6 lg:hidden md:hidden">
        @for($i = 0; $i < count($steps); $i++)
            <div class="py-2 flex flex-row relative">
                <x-step-label :label="$steps[$i]" :position="$i" :current="$order->current_step"/>
            @if($i < count($steps))
                <div class="flex flex-row w-full">
                    @if($i < $order->current_step)
                        <p class="absolute w-full text-green-600 dark:text-green-700 top-5 text-end px-20">Done</p>
                    @elseif($i == $order->current_step)
                        <p class="absolute w-full top-5 text-end px-20 text-blue-500 dark:text-indigo-500 font-medium">{{ $order->step_progress }}%</p>
                    @endif
                </div>
            @endif
            </div>
        @endfor

    </div>
    <p>{{ $order->message }}</p>
</div>
