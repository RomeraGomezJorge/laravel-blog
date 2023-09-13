@props([
    'value' ,
    'hasErrors' => false,
])
@php
    $errorClasses =  $hasErrors  ? ' text-red-700 dark:text-red-500 ' : '';
@endphp

<label {{ $attributes->merge(['class' => ' block mb-2 text-sm font-medium text-gray-900 dark:text-white '.$errorClasses]) }}>
    {{ $value ?? $slot }}
</label>
