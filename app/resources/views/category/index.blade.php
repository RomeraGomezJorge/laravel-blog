<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Category') }}
            </h2>
            <x-buttons.create :href="route('categories.create')"/>
        </div>
    </x-slot>
    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <x-alerts.success/>
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
            <x-buttons.clear-filter :href="route('categories.index')"/>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead>
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center space-x-2">
                            @sortablelink('name',__('Name'))
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center space-x-2">
                            @sortablelink('display_order',__('Order'))
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">{{__('Actions')}}</span>
                        {{__('Actions')}}
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{$category->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$category->display_order}}
                        </td>
                        <td class="px-6 py-4">
                            <x-buttons.list.edit :href="route('categories.edit',$category->id)"/>
                            <x-buttons.list.delete
                                data-modal-toggle="confirmDelete{{ $category->id }}"
                            />
                            <x-modal-delete-confirmation
                                :id="$category->id"
                                :formAction="route('categories.destroy', $category->id)"
                            />
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="ml-auto px-10 py-4">
                {{ $categories->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
