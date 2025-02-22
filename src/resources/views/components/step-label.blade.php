@props(['label', 'position', 'current'])

<div class="grid justify-items-center relative hidden lg:flex md:flex">
    @if($position < $current)
        <div class="rounded-full bg-green-500 h-12 w-12">
        </div>
        <div class="absolute top-12 text-center w-full flex-wrap">{{ $label }}</div>
    @elseif($position === $current)
        <div class="rounded-full bg-indigo-500 h-12 w-12">
        </div>
        <div class="absolute top-12 text-center w-full flex-wrap">{{ $label }}</div>
    @else
        <div class="rounded-full bg-black h-12 w-12">
        </div>
        <div class="absolute top-12 text-center w-full flex-wrap">{{ $label }}</div>
    @endif
</div>

<div class="relative md:hidden lg:hidden">
    @if($position < $current)
        <div class="rounded-full bg-green-500 h-12 w-12">
        </div>
        <div class="absolute top-3 left-14">{{ $label }}</div>
    @elseif($position === $current)
        <div class="rounded-full bg-indigo-500 h-12 w-12">
        </div>
        <div class="absolute top-3 left-14">{{ $label }}</div>
    @else
        <div class="rounded-full bg-black h-12 w-12">
        </div>
        <div class="absolute top-3 left-14">{{ $label }}</div>
    @endif
</div>
