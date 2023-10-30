<x-blog-layout
    :categories="$categories"
    title_page="Blog"
>
        @forelse($articles as $article)
        <x-blog.article-index
            :title="$article->title"
            :description="$article->description"
            :category_name="$article->category_name"
            :image_url="asset('storage/article/'.$article->id.'/'.$article->first_image_url)"
            :created_at="$article->created_at_formatted"
        />
        @empty
        @endforelse
</x-blog-layout>


