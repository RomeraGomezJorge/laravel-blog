@props(['method','url_action'])

<form
    method="post"
    action="{{ $url_action }}"
    class="mt-6 space-y-6 max-w-xl"
    enctype="multipart/form-data"
>
    @csrf
    @method($method)

    <div class="space-y-2">
        <x-form.labeled-input
            :label="__('Title')"
            :hasErrors="$errors->get('title')"
            id="title"
            name="title"
            type="text"
            class="block w-full"
            :value="$article->title ?? old('title')"
            required
            autofocus
        />
        <x-form.error :messages="$errors->get('title')"/>
    </div>

    <div class="space-y-2">
        <x-form.labeled-textarea
            :label="__('Description')"
            :hasErrors="$errors->get('description')"
            :value="$article->description ?? old('description')"
            id="description"
            name="description"
            required
        />
        <x-form.error :messages="$errors->get('description')"/>
    </div>

    <div class="space-y-2">
        <x-form.labeled-select
            :label="__('Category')"
            :hasErrors="$errors->get('category_id')"
            id="category_id"
            name="category_id"
            placeholder="{{ __('Select a category') }}"
            required
        >
            @forelse($categories as $category)
                <option
                    @selected( isset($article)
                        ? $article->category->id == $category->id
                        : old('category_id') == $category->id )
                    value="{{$category->id}}"
                >
                    {{$category->name}}
                </option>
            @empty
                <option disabled>{{__('No entries found')}}</option>
            @endforelse
        </x-form.labeled-select>

        <x-form.error :messages="$errors->get('category_id')"/>
    </div>

    <div class="space-y-2">

        <x-form.labeled-select
            :label="__('Tags')"
            :hasErrors="$errors->get('category_id')"
            id="tags"
            name="tags[]"
            multiple
        >
            @forelse($tags as $tag)
                <option
                    value="{{$tag->id}}"
                    @selected( (isset($article))
                                ? $article->tags->contains($tag->id)
                                : in_array($tag->id, old('tags', [])) )
                >
                    {{$tag->name}}
                </option>
            @empty
                <option disabled>{{__('No entries found')}}</option>
            @endforelse
        </x-form.labeled-select>

        <x-form.error :messages="$errors->get('tags')"/>
    </div>

    <div class="space-y-2 increment">

        <x-form.labeled-input
            :label="__('Upload images')"
            :hasErrors="$errors->get('images')"
            name="images[]"
            type="file"
            class="block w-full cursor-pointer"
        />
        <x-form.error :messages="$errors->get('images')"/>

        <div class="clone hidden">
            <div class="image-container relative w-full">
                <x-form.input
                    :label="__('Upload images')"
                    :hasErrors="$errors->get('images')"
                    name="images[]"
                    type="file"
                    class="block w-full cursor-pointer"
                />
                <button
                    type="button"
                    class="remove-image absolute top-0 right-0 p-2.5 z-20 h-full text-sm font-medium text-white bg-red-700 rounded-r-lg border border-red-700 hover:bg-red-800 focus:ring-1 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                >
                    <x-icons.cancel class="w-4 h-4 remove-image z-0"/>
                </button>
            </div>
        </div>
    </div>

    <x-button
        class="add-more-images"
        variant="outline"
    >
        <x-icons.plus class="w-4 h-4 mr-2 -ml-1"/>
        Add more images
    </x-button>

    <div class="flex items-center justify-end gap-4">
        <x-buttons.cancel-form :href="route('articles.index')"/>
        <x-buttons.save/>
    </div>
</form>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const addMoreIimagesButton = document.querySelectorAll(".add-more-images");
        const cloneContent = document.querySelector(".clone").innerHTML;
        const incrementContainer = document.querySelector(".increment");

        addMoreIimagesButton.forEach(function (button) {
            button.addEventListener("click", function () {
                incrementContainer.insertAdjacentHTML("afterend", cloneContent);
            });
        });

        document.body.addEventListener("click", function (event) {

            if (event.target.classList.contains("remove-image")) {
                const controlGroup = event.target.closest('.image-container');
                if (controlGroup) {
                    controlGroup.remove();
                }
            }
        });


    });

</script>
