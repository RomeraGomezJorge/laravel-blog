<section id="password-update">
    @if (session('status') === 'password-updated')
        <x-alerts.success>{{__("Your password has been updated successfully.")}}</x-alerts.success>
    @endif
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form
        method="post"
        action="{{ route('password.update') }}#password-update"
        class="mt-6 space-y-6"

    >
        @csrf
        @method('put')

        <div class="space-y-2">
            <x-form.label
                for="current_password"
                :value="__('Current Password')"
                :hasErrors="$errors->updatePassword->has('current_password')"
            />

            <x-form.input
                id="current_password"
                name="current_password"
                type="password"
                class="block w-full"
                autocomplete="current-password"
                :hasErrors="$errors->updatePassword->has('current_password')"
            />

            <x-form.error :messages="$errors->updatePassword->get('current_password')" />
        </div>

        <div class="space-y-2">
            <x-form.label
                for="password"
                :value="__('New Password')"
                :hasErrors="$errors->updatePassword->has('password')"
            />

            <x-form.input
                id="password"
                name="password"
                type="password"
                class="block w-full"
                autocomplete="new-password"
                :hasErrors="$errors->updatePassword->has('password')"
            />


            <x-form.error :messages="$errors->updatePassword->get('password')" />
        </div>

        <div class="space-y-2">
            <x-form.label
                for="password_confirmation"
                :value="__('Confirm Password')"
                :hasErrors="$errors->updatePassword->has('password_confirmation')"
            />

            <x-form.input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="block w-full"
                autocomplete="new-password"
                :hasErrors="$errors->updatePassword->has('password_confirmation')"
            />

            <x-form.error :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>

        <div class="flex items-center gap-4 justify-start">
            <x-buttons.save/>
       </div>
    </form>
</section>
