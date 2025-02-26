@props(['label', 'position', 'current'])

{{-- DESKTOP VERSION --}}
<div class="grid justify-items-center relative hidden lg:flex md:flex">
    @if($position < $current)
        <div class="rounded-full bg-green-600 dark:bg-green-700 h-12 w-12">
            <x-step-icon :label="$label" />
        </div>
        <div class="absolute top-12 text-center w-full flex-wrap">{{ $label }}</div>
    @elseif($position === $current)
        <div class="rounded-full bg-blue-500 dark:bg-indigo-500 h-12 w-12">
            <x-step-icon :label="$label" />
        </div>
        <div class="absolute top-12 text-center w-full flex-wrap">{{ $label }}</div>
    @else
        <div class="rounded-full bg-gray-400 dark:bg-[#111827] h-12 w-12">
            <x-step-icon :label="$label" />
        </div>
        <div class="absolute top-12 text-center w-full flex-wrap">{{ $label }}</div>
    @endif
</div>

{{-- MOBILE VERSION --}}
<div class="relative md:hidden lg:hidden">
    @if($position < $current)
        <div class="rounded-full bg-green-600 dark:bg-green-700 h-12 w-12">
            <x-step-icon :label="$label" />
        </div>
        <div class="absolute top-3 left-14">{{ $label }}</div>
    @elseif($position === $current)
        <div class="rounded-full bg-blue-500 dark:bg-indigo-500 h-12 w-12">
            <x-step-icon :label="$label" />
        </div>
        <div class="absolute top-3 left-14">{{ $label }}</div>
    @else
        <div class="rounded-full bg-gray-400 dark:bg-[#111827] h-12 w-12">
            <x-step-icon :label="$label" />
        </div>
        <div class="absolute top-3 left-14">{{ $label }}</div>
    @endif
</div>
