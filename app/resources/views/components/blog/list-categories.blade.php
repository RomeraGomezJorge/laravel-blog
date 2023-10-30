@props([
    'categories',
])
<div class="relative flex flex-wrap min-w-full gap-5">
    <a href="/"
       class="pb-2.5 first-letter:uppercase font-medium hover:text-gray-800 dark:hover:border-white hover:border-opacity-100 transition-colors duration-150 ease-linear border-black border-b-2 text-black z-10 dark:border-white dark:text-white dark:border-opacity-100 border-opacity-100">
        {{__('View All')}}
    </a>
    @foreach( $categories as $category  )
        <a href="/"
           class="text-gray-600 dark:text-gray-300 pb-2.5 first-letter:uppercase font-medium hover:text-gray-800 border-b-2 border-opacity-0 dark:border-opacity-0 border-black dark:border-white dark:hover:border-white hover:border-opacity-100 transition-colors duration-150 ease-linear">
            {{$category->name}}
        </a>
    @endforeach
    <div class="hidden sm:block absolute w-full bottom-0 border-b-2 -z-40 dark:border-gray-600"></div>
</div>

