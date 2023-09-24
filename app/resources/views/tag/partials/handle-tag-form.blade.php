@props(['method','url_action'])

<form
    method="{{$method}}"
    action="{{ $url_action }}"
    class="mt-6 space-y-6 max-w-xl"
>
    @csrf
    @method($method)

    <div class="space-y-2">
        <x-form.label
            for="name"
            :value="__('Name')"
            :hasErrors="$errors->get('name')"
        />

        <x-form.input
            id="name"
            name="name"
            type="text"
            class="block w-full"
            :value="old('name')"
            required
            autofocus
            autocomplete="name"
            :hasErrors="$errors->get('name')"
        />

        <x-form.error :messages="$errors->get('name')"/>
    </div>

    <div class="flex items-center justify-end gap-4">
        <x-buttons.cancel-form :href="route('tags.index')"/>
        <x-buttons.save/>
    </div>
</form>
