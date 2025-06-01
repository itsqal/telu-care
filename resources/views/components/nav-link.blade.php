@props(['href', 'active'])

@php
    $baseClass = 'px-3 py-2 rounded text-sm flex items-center gap-2 cursor-pointer transition';
    $activeClass = $active
        ? 'bg-gray-100 text-[var(--color-red-main)] font-semibold'
        : 'text-white hover:bg-[var(--color-dark-red)] hover:text-gray-200';
@endphp

<a href="{{ $href }}" class="{{ $baseClass }} {{ $activeClass }}">
    {{ $slot }}
</a>