@props(['style' => 'success'])
@php
    if ($style == 'danger') {
        $color = 'bg-red-500';
    } elseif ($style == 'success') {
        $color = 'bg-green-500';
    }

@endphp
<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)" x-transition:enter="transition ease-out duration-1000"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="flex justify-end w-full">
    <div class="px-3 py-4 mt-4 mr-10 text-white {{ $color }} rounded-md alert alert-success">
        {{ $slot }}
    </div>
</div>
