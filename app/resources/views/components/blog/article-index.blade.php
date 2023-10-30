@props([
    'title',
    'description',
    'category_name',
    'image_url',
    'created_at',
])

<article class="grid grid-rows-[300px_auto] md:grid-rows-[300px_220px] min-h-full group">
    <a class="relative effect overflow-hidden" href="#">
        <img src="{{$image_url}}"
             class="h-full min-w-full object-cover hover:scale-[101%] transition-all duration-200 rounded-[2px]"
             alt="img of Components"
             width="600"
             height="200"
             loading="lazy"
             decoding="async"
        >
        <div class="z-30 absolute bottom-0 w-full h-20">
            <div class="-z-10 absolute bottom-0 glass w-full min-h-full"></div>
            <div class="flex items-center justify-between gap-x-1 text-white px-6 py-4">
                <div class="flex flex-col gap-1 items-center justify-center">
                    <time class="text-sm font-bold text-opacity-60" >
                        {{$created_at}}
                    </time>
                </div>
                <span class="pb-1">
                    {{$category_name}}
                </span>
            </div>
        </div>
    </a>
    <div class="flex justify-between flex-col gap-4 md:gap-0 py-6 pl-1">
        <div class="flex flex-col gap-3">
            <div class="flex flex-col gap-2">
                <a class="text-2xl font-semibold -tracking-wider" href="/post/astro-copy-4/">
                    {{$title}}
                </a>
            </div>
            <p class="overflow-hidden line-clamp-3 text-gray-700 dark:text-white mb-5 font-[400] md:pr-[15%]">
                {{$description}}
            </p>
        </div>
        <footer class="flex justify-between items-center">
            <a href="/post/astro-copy-4/"
               class="flex justify-center items-center dark:text-white rounded-full hover:translate-x-1 transition-transform duration-150 ease-in-out font-semibold gap-1 group"
               aria-label="go to Components"
            >
                Read Post
                <span class="mt-[1px] group-hover:rotate-45 transition-transform duration-250 ease-in-out">
                    <svg class="feather feather-arrow-up-right"
                         fill="none"
                         height="18"
                         stroke="currentColor"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         stroke-width="2.5"
                         viewBox="0 0 24 24"
                         width="18"
                         xmlns="http://www.w3.org/2000/svg"
                         data-darkreader-inline-stroke=""
                         style="--darkreader-inline-stroke: currentColor;">
                        <line x1="7" x2="17" y1="17" y2="7"></line>
                        <polyline points="7 7 17 7 17 17"></polyline>
                    </svg>
                </span>
            </a>
        </footer>
    </div>
</article>
