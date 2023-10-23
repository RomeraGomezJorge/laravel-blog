<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <div class="flex justify-start">
    <x-button
        variant="danger"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        <x-icons.trash class="w-4 h-4 mr-2 -ml-1 text-white"/>
        {{ __('Delete Account') }}
    </x-button>
    </div>

    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable
    >
        <form
            method="post"
            action="{{ route('profile.destroy') }}"
            class="p-6"
        >
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6 space-y-1">
                <x-form.label
                    for="delete-user-password"
                    value="Password"
                    class="sr-only"
                />

                <x-form.input
                    id="delete-user-password"
                    name="password"
                    type="password"
                    class="block w-3/4"
                    placeholder="Password"
                    :hasErrors="$errors->userDeletion->has('password')"
                />
                <x-form.error :messages="$errors->userDeletion->get('password')" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-buttons.cancel
                    x-on:click="$dispatch('close')"
                />

                <x-button
                    variant="danger"
                    class="ml-3"
                >
                    <x-icons.trash class="w-4 h-4 mr-2 -ml-1 text-white"/>
                    {{ __('Delete Account') }}
                </x-button>
            </div>
        </form>
    </x-modal>
</section>
