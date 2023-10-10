@props(['method','url_action'])

<form
    method="post"
    action="{{ $url_action }}"
    class="mt-6 space-y-6 max-w-xl"
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

    <div class="flex items-center justify-end gap-4">
        <x-buttons.cancel-form :href="route('articles.index')"/>
        <x-buttons.save/>
    </div>
</form>
