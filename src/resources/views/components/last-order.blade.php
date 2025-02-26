@props(['lastOrder'])


@if($lastOrder !== null)
    <div class="flex lg:w-1/3 md:w-1/2 w-full h-10 items-center justify-center rounded-lg bg-gray-50 dark:dark:bg-[#111827]">
        <div class="text-green-600 dark:text-green-700">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M0 0h24v24H0z" fill="none"></path><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"></path>
            </svg>
        </div>
        <span class="ml-2 mr-2">Last Completed Order:</span>
        <span class="text-green-600 dark:text-green-700 font-bold text-lg">#{{$lastOrder->order_number}}</span>
    </div>
@endif
