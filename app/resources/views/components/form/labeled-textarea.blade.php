@props([
    'hasErrors' => false,
    'label',
    'value'
])


@php
    $inputErrorClasses =  $hasErrors  ? ' bg-red-50 border border-red-500 text-red-900 placeholder-red-700 dark:border dark:border-red-400 dark:text-red-400 dark:placeholder-red-400 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 ' : '';
    $labelErrorClasses =  $hasErrors  ? ' text-red-700 dark:text-red-500 ' : '';
@endphp

<label class="{{$labelErrorClasses}} block mb-2 text-sm font-medium text-gray-900 dark:text-white">
    {{$label}}
    @if(array_key_exists('required', $attributes->getAttributes()))
        *
    @endif
</label>
<textarea  rows="4"
            {!! $attributes->merge([
                    'class' => $inputErrorClasses . ' block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'
                ])
            !!}
>{{$value}}</textarea>
