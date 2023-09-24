@props(['href'])
<x-button
    type="submit"
    class="p-2.5 ml-2 mb-0"
    variant="alternative"
    href="{{$href}}"
>
    <x-icons.cancel class="w-4 h-4 mr-2 -ml-1" />
    {{__('Cancel')}}
</x-button>

