<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>
    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="grid grid-cols-3 gap-6">
            <div
                class="flex flex-col p-5 gap-y-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="inline-flex justify-center">

                    <div
                        class="inline-flex items-center justify-center w-20 h-20 mr-2 text-sm font-semibold text-blue-900 bg-blue-200 rounded-full dark:bg-blue-700 dark:text-blue-300">
                        <x-icons.article class="w-8 h-8"/>
                    </div>
                    <div class="ml-4 mt-2">
                        <div class="4 mb-2 text-3xl font-extrabold">
                            {{ $article_count }}
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">{{ __('Articles') }}</div>
                    </div>
                </div>
                <a href="{{ route('articles.index') }}">
                    <div class="flex text-xs gap-2 justify-center items-center">
                        <x-icons.plus class="w-4 h-4 text-blue-600 dark:text-white"/>
                        {{ __('Show more') }}
                    </div>
                </a>
            </div>
            <div
                class="flex flex-col p-5 gap-y-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="inline-flex justify-center">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 mr-2 text-sm font-semibold text-blue-900 bg-blue-200 rounded-full dark:bg-blue-700 dark:text-blue-300">
                        <x-icons.tag class="w-8 h-8"/>
                    </div>
                    <div class="ml-4 mt-2">
                        <div class="4 mb-2 text-3xl font-extrabold">
                            {{ $tag_count }}
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">{{ __('Tags') }}</div>
                    </div>
                </div>
                <a href="{{ route('tags.index') }}">
                    <div class="flex text-xs gap-2 justify-center items-center">
                        <x-icons.plus class="w-4 h-4 text-blue-600 dark:text-white"/>
                        {{ __('Show more') }}
                    </div>
                </a>
            </div>
            <div
                class="flex flex-col p-5 gap-y-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="inline-flex justify-center">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 mr-2 text-sm font-semibold text-blue-900 bg-blue-200 rounded-full dark:bg-blue-700 dark:text-blue-300">
                        <x-icons.category class="w-8 h-8    "/>
                    </div>
                    <div class="ml-4 mt-2">
                        <div class="4 mb-2 text-3xl font-extrabold">
                            {{ $category_count }}
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">{{ __('Categories') }}</div>
                    </div>
                </div>
                <a href="{{ route('categories.index') }}">
                    <div class="flex text-xs gap-2 justify-center items-center">
                        <x-icons.plus class="w-4 h-4 text-blue-600 dark:text-white"/>
                        {{ __('Show more') }}
                    </div>
                </a>
            </div>


        </div>

    </div>
</x-app-layout>
