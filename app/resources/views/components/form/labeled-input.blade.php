@props([
    'withicon' => false,
    'hasErrors' => false,
    'placeholder' => '',
    'label'
])


@php
    $withiconClasses = $withicon ? 'pl-11 pr-4' : 'px-4';
    $inputErrorClasses =  $hasErrors  ? ' bg-red-50 border border-red-500 text-red-900 placeholder-red-700 dark:border dark:border-red-400 dark:text-red-400 dark:placeholder-red-400 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 ' : '';
    $labelErrorClasses =  $hasErrors  ? ' text-red-700 dark:text-red-500 ' : '';
@endphp

<label class="{{$labelErrorClasses}} block mb-2 text-sm font-medium text-gray-900 dark:text-white">
    {{$label}}
    @if(array_key_exists('required', $attributes->getAttributes()))
        *
    @endif
</label>
<input
    {!! $attributes->merge([
            'class' => $withiconClasses .$inputErrorClasses . ' py-2 border-gray-400
            rounded-md
            focus:ring-blue-500
            focus:border-blue-500
            dark:border-gray-600
            dark:bg-dark-eval-1
            dark:text-gray-300 dark:focus:ring-offset-dark-eval-1',
        ])
    !!}
>
