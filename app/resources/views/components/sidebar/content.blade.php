<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-3 px-3"
>

    <x-sidebar.link
        title="Dashboard"
        href="{{ route('backoffice.dashboard') }}"
        :isActive="request()->routeIs('backoffice.dashboard')"
    >
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-4 h-4" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="{{__('Articles')}}"
        href="{{ route('backoffice.articles.index') }}"
        :isActive="request()->routeIs('backoffice.articles.*')"
    >
        <x-slot name="icon" class="align-middle">
            <x-icons.article class="flex-shrink-0 w-4 h-4" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="{{__('Tags')}}"
        href="{{ route('backoffice.tags.index') }}"
        :isActive="request()->routeIs('backoffice.tags.*')"
    >
        <x-slot name="icon" class="align-middle">
            <x-icons.tag class="flex-shrink-0 w-4 h-4" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="{{__('Categories')}}"
        href="{{ route('backoffice.categories.index') }}"
        :isActive="request()->routeIs('backoffice.categories.*')"
    >
        <x-slot name="icon" class="align-middle">
            <x-icons.category class="flex-shrink-0 w-4 h-4" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

</x-perfect-scrollbar>
