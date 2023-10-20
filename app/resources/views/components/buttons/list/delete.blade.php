<button
    {{ $attributes->merge(['class' => "inline-flex items-center justify-center w-8 h-8 mr-2 text-sm font-semibold text-red-900 bg-red-200 rounded-full dark:bg-red-700 dark:text-red-300"]) }}
>
    <x-icons.trash class="w-3.5 h-3.5"/>
    <span class="sr-only">{{__('Delete')}}</span>
</button>
