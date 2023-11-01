<x-blog-layout
    :categories="$categories"
    :title_page="$page_title"
>

    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-3 md:[&amp;> *:first-child]:col-span-2">
        @forelse($articles as $article)
            <x-blog.article-index
                :title="$article->title"
                :description="$article->description"
                :category_name="$article->category_name"
                :image_url="asset('storage/article/'.$article->id.'/'.$article->first_image_url)"
                :created_at="$article->created_at_formatted"
                :tags="$article->tags"
            />
        @empty
            {{ __('No entries found') }}
        @endforelse
    </section>
    <div class="ml-auto px-10 py-4">
        {{ $articles->links() }}
    </div>
</x-blog-layout>


