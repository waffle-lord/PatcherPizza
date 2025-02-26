<div wire:poll.30s="updateInfo" class="w-full flex p-20">
    @if($order === null)
        <div class="w-full text-center">
            <p>The kitchen is closed</p>
            <p class="text-sm/relaxed text-gray-700 dark:text-gray-400">This page refreshes automatically :)</p>
            <div class="flex w-full justify-center items-center p-6">
                <x-last-order :lastOrder="$lastOrder" />
            </div>
        </div>
    @else
        <livewire:pizza-order-info :order="$order"/>
    @endif
</div>
