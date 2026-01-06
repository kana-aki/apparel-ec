<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Contact Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your address, phone number, and notification settings.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.contact.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                :value="old('phone', auth()->user()->phone)" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="postal_code" :value="__('Postal Code')" />
            <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full"
                :value="old('postal_code', auth()->user()->postal_code)" />
            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
        </div>

        <div>
            <x-input-label for="address1" :value="__('Address Line 1')" />
            <x-text-input id="address1" name="address1" type="text" class="mt-1 block w-full"
                :value="old('address1', auth()->user()->address1)" />
            <x-input-error class="mt-2" :messages="$errors->get('address1')" />
        </div>

        <div>
            <x-input-label for="address2" :value="__('Address Line 2')" />
            <x-text-input id="address2" name="address2" type="text" class="mt-1 block w-full"
                :value="old('address2', auth()->user()->address2)" />
            <x-input-error class="mt-2" :messages="$errors->get('address2')" />
        </div>

        <div class="flex items-center gap-2">
            <input id="notification_enabled" name="notification_enabled" type="checkbox" value="1"
                @checked(old('notification_enabled', auth()->user()->notification_enabled))>
            <label for="notification_enabled" class="text-sm text-gray-700">
                {{ __('Receive email notifications') }}
            </label>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'contact-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
