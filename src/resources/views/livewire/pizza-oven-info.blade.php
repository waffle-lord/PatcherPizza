<div wire:poll.30s="updateInfo" class="w-full flex p-20">
    @if($order === null)
        <div class="w-full text-center">
            <p>The kitchen is closed</p>
            <p class="text-sm/relaxed text-gray-700 dark:text-gray-400">This page refreshes automatically
                :)</p>
            <x-last-order :lastOrder="$lastOrder"/>
        </div>
    @else
        <livewire:pizza-order-info :order="$order"/>
    @endif
</div>
