@props([
    'title',
    'description',
    'category_name',
    'image_url',
    'created_at',
    'tags' => []
])

<article class="grid grid-rows-[300px_auto] md:grid-rows-[300px_220px] min-h-full group mb-5">
    <figure class="relative effect overflow-hidden" >
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
    </figure>
    <div class="flex justify-between flex-col gap-4 md:gap-0 py-6 pl-1">
        <div class="flex flex-col gap-3">
            <div class="flex flex-col gap-2">
                <h3 class="text-2xl font-semibold -tracking-wider">
                    {{$title}}
                </h3>
            </div>
            <p class="overflow-hidden line-clamp-3 text-gray-700 dark:text-white mb-2 font-[400] md:pr-[15%]">
                {{$description}}
            </p>
            <div class="flex justify-left flex-wrap gap-1 mb-5">
                @foreach( $tags as $tag)
                    <a href="{{ route('blog.articles.tag',$tag) }}"
                       class="inline-block bg-gray-200  rounded-full px-3 py-1 text-xs font-semibold text-gray-700 mr-2 mb-2">
                        #{{ $tag->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</article>
