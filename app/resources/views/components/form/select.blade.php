@props([
    'hasErrors' => false,
])

@php
    $errorClasses =  $hasErrors  ? ' bg-red-50 border border-red-500 text-red-900 placeholder-red-700 dark:border dark:border-red-400 dark:text-red-400 dark:placeholder-red-400 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 ' : '';
    $labelErrorClasses =  $hasErrors  ? ' text-red-700 dark:text-red-500 ' : '';
@endphp

<select
    {{
        $attributes->merge([
            'class'=>  $errorClasses .'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'
        ])
    }}
>
    @if(array_key_exists('placeholder', $attributes->getAttributes()))
        <option value="" selected disabled > {{ $attributes['placeholder'] }} </option>
    @endif
    {{ $slot }}
</select>
