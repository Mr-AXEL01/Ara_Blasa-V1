<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('availability') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your availability.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('driver.update.availability') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Display the current availability -->
        @php
            $currentAvailability = auth()->user()->driver->availability;
        @endphp

        <div>
            <x-input-label for="availability" :value="__('Availability')" />

            <div class="flex items-center space-x-4">
                <label for="offline" class="flex items-center">
                    <input id="offline" name="availability" type="radio" value="Offline" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ $currentAvailability === 'Offline' ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Offline</span>
                </label>

                <label for="en_route" class="flex items-center">
                    <input id="en_route" name="availability" type="radio" value="En Route" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ $currentAvailability === 'En Route' ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">En Route</span>
                </label>

                <label for="available" class="flex items-center">
                    <input id="available" name="availability" type="radio" value="Available" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ $currentAvailability === 'Available' ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Available</span>
                </label>
            </div>

            <x-input-error class="mt-2" :messages="$errors->get('availability')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'availability-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Availability updated.') }}</p>
            @endif
        </div>
    </form>
</section>
