@props(['order'])
<div class="bg-white text-black">
    <h1>{{ $order->message }}</h1>

    <div class="flex justify-center items-center p-6">
        <div class="w-1/2 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $order->progress }}%"></div>
        </div>
        <p class="p-4">{{ $order->progress }}%</p>
    </div>
</div>
