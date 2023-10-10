@props([
    'placeholder',
    'selected_tag_id' => '' ,
    'multiple' => false,
    'input_name',
])

<x-form.label>{{__('Tag')}}</x-form.label>
<x-form.select
    id="{{$input_name}}"
    name="{{$input_name}}"
    type="text"
    class="mr-2 mb-2"
    :placeholder="$placeholder"
    :multiple="$multiple"
>
    @forelse($tags as $tag)
        <option
            @selected( $selected_tag_id == $tag->id )
            value="{{$tag->id}}"
        >
            {{$tag->name}}
        </option>
    @empty
        <option disabled>{{__('No entries found')}}</option>
    @endforelse
</x-form.select>
