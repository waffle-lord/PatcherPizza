@props(['order'])
<div class="rounded-full bg-black text-white p-6">
    <h1>{{ $order->message }}</h1>
    <h2>{{ $order->progress }}%</h2>
</div>
