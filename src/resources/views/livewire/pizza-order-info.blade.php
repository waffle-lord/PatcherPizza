<div wire:poll.30s class="w-full text-center bg-[#e1e1e1] dark:bg-[#212f4d]">
    <h1 class="text-3xl p-6 text-blue-500 dark:text-indigo-500">Order #{{ $order->order_number }}</h1>
    <p>{{ $order->message }}</p>

    <div class="flex items-center">
        <div class="w-full bg-gray-400 rounded-full h-2.5 dark:bg-[#111827]">
            <div class="bg-blue-500 dark:bg-indigo-500 h-2.5 rounded-full" style="width: {{ $order->progress }}%"></div>
        </div>
        <p class="p-4">{{ $order->progress }}%</p>
    </div>
    <p class="text-sm/relaxed text-gray-700 dark:text-gray-400">This page refreshes automatically :)</p>
</div>
