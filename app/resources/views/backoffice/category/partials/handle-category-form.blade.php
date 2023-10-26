@props(['method','url_action'])

<form
    method="post"
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
            :value="$category->name ?? old('name')"
            required
            autofocus
            autocomplete="name"
            :hasErrors="$errors->get('name')"
        />

        <x-form.error :messages="$errors->get('name')"/>
    </div>

    <div class="space-y-2">
        <x-form.label
            for="display_order"
            :value="__('Order')"
            :hasErrors="$errors->get('display_order')"
        />

        <x-form.input
            id="display_order"
            name="display_order"
            type="text"
            class="block w-full"
            :value="$category->display_order ?? old('display_order')"
            required
            autocomplete="display_order"
            :hasErrors="$errors->get('display_order')"
        />

        <x-form.error :messages="$errors->get('display_order')"/>
    </div>

    <div class="flex items-center justify-end gap-4">
        <x-buttons.cancel-form :href="route('backoffice.categories.index')"/>
        <x-buttons.save/>
    </div>
</form>
