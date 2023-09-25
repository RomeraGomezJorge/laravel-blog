<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight text-capitalize">
                {{ __('Edit') }} {{ __('Category') }}
            </h2>
        </div>
    </x-slot>
    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        @include('category.partials.handle-category-form',[
            'method' => 'PUT',
            'url_action' => route('categories.update',$category->id),
            'category' => $category,
        ])
    </div>
</x-app-layout>
