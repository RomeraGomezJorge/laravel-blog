<x-button {{ $attributes->merge(['variant' => 'cancel', 'type'=>'button']) }}>
    <x-icons.cancel class="w-4 h-4 mr-2 -ml-1 text-gray-400  dark:text-white" />
    {{__('Cancel')}}
</x-button>
