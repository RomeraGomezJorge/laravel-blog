<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Tag') }}
            </h2>
            <x-buttons.create/>
        </div>
    </x-slot>
    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">


        <form method="get" class="flex items-center">
            <label for="simple-search" class="sr-only">{{ __('Search')}}</label>
            <div class="relative w-full">
                <x-form.input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ Request::get('name') }}"
                    class="block w-full p-2.5"
                    autocomplete="name"
                />
            </div>
            <x-buttons.search/>
            <x-buttons.clear-filter :href="route('tag.index')" />
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead>
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            {{__('Name')}}
                            <a href="#">
                                <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg>
                            </a>
                        </div>

                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">{{__('Actions')}}</span>
                        {{__('Actions')}}
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">
                            {{$tag->name}}
                        </td>
                        <td class="px-6 py-4">
                            <x-icons.list-edit/>
                            <x-buttons.list-delete
                                data-modal-toggle="confirmDelete{{ $tag->id }}"
                            />
                            <x-modal-delete-confirmation
                                :id="$tag->id"
                                :formAction="route('tag.destroy', ['tag' => $tag->id])"
                            />
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="ml-auto px-10 py-4">
                {{ $tags->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
