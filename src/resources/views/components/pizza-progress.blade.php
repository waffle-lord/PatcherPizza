@props(['order'])
<div class="bg-[#e1e1e1] dark:bg-[#212f4d]">
    <h1>{{ $order->message }}</h1>

    <div class="flex justify-center items-center p-6">
        <div class="w-1/2 bg-gray-400 rounded-full h-2.5 dark:bg-gray-500">
            <div class="bg-blue-500 h-2.5 rounded-full" style="width: {{ $order->progress }}%"></div>
        </div>
        <p class="p-4">{{ $order->progress }}%</p>
    </div>
</div>
