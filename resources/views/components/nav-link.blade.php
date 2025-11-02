@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-sm text-red-900 w-max px-[22px] hover:text-red-600 transition duration-500'
            : 'text-sm text-gray-700 w-max px-[22px] hover:text-red-600 transition duration-500';
@endphp

<a  {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
