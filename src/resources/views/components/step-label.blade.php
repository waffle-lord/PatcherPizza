@props(['label'])

<div class="grid justify-items-center relative invisible lg:visible md:visible">
    <div class="rounded-full bg-black h-12 w-12">
    </div>
    <div class="absolute -bottom-10 text-center">{{ $label }}</div>
</div>

<div class="grid justify-items-center justify-start relative md:hidden lg:hidden">
    <div class="rounded-full bg-black h-12 w-12">
    </div>
    <div class="absolute -bottom-10 text-center">{{ $label }}</div>
</div>
