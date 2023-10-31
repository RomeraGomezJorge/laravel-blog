<x-blog-layout
    :categories="$categories"
    :title_page="$page_title"
>
    <div class="flex justify-center flex-wrap gap-4">
        @forelse($tags as $tag)
            <a href="{{ route('blog.articles.tag',$tag) }}" class="inline-block bg-gray-200  rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                #{{ $tag->name }} ({{ $tag->articles_count }})
            </a>
        @empty
                {{ __('No entries found') }}
        @endforelse
    </div>
    <div class="ml-auto px-10 py-4">
        {{ $tags->links() }}
    </div>
</x-blog-layout>
