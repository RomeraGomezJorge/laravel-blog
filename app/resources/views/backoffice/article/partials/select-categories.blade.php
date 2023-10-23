@props([
    'placeholder',
    'selected_cateory_id' => '' ,
    'required',
])

<x-form.label :hasErrors="$errors->get('category_id')">
    {{__('Category')}}
</x-form.label>

<x-form.select
    id="category_id"
    name="category_id"
    type="text"
    class="mr-2 mb-2"
    placeholder="{{ $placeholder }}"
    :required="$required"
    :hasErrors="$errors->get('category_id')"

>
    @forelse($categories as $category)
        <option
            @selected( $selected_cateory_id == $category->id )
            value="{{$category->id}}"
        >
            {{$category->name}}
        </option>
    @empty
        <option disabled>{{__('No entries found')}}</option>
    @endforelse
</x-form.select>
<x-form.error :messages="$errors->get('category_id')"/>
