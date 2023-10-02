@props([
    'disabled' => false,
    'withicon' => false,
    'hasErrors' => false,
    'placeholder' => ''
])

@php
    $withiconClasses = $withicon ? 'pl-11 pr-4' : 'px-4';
    $errorClasses =  $hasErrors  ? ' bg-red-50 border border-red-500 text-red-900 placeholder-red-700 dark:border dark:border-red-400 dark:text-red-400 dark:placeholder-red-400 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 ' : '';
@endphp

<input
    placeholder="{{$placeholder}}"
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
            'class' => $withiconClasses .$errorClasses . ' py-2 border-gray-400
            rounded-md
            focus:ring-blue-500
            focus:border-blue-500
            dark:border-gray-600
            dark:bg-dark-eval-1
            dark:text-gray-300 dark:focus:ring-offset-dark-eval-1',
        ])
    !!}
>
