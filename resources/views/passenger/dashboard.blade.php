<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Search for Driver') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="GET" action="{{ route('search.driver') }}" class="space-y-6">
                    <div>
                        <x-input-label for="start_point" :value="__('Start_point')" />
                        <x-text-input id="start_point" name="start_point" type="text" class="mt-1 block w-full" required autofocus autocomplete="start_point" />
                        <x-input-error class="mt-2" :messages="$errors->get('start_point')" />
                    </div>
                    <div>
                        <x-input-label for="destination" :value="__('Destination')" />
                        <x-text-input id="destination" name="destination" type="text" class="mt-1 block w-full" required autofocus autocomplete="destination" />
                        <x-input-error class="mt-2" :messages="$errors->get('destination')" />
                    </div>
                    <div>
                        <x-input-label for="depart_time" :value="__('Depart_time')" />
                        <x-text-input id="depart_time" name="depart_time" type="datetime-local" class="mt-1 block w-full" required autofocus autocomplete="depart_time" />
                        <x-input-error class="mt-2" :messages="$errors->get('depart_time')" />
                    </div>
                    <div class="flex items-center justify-end">
                        <x-primary-button>{{ __('Search') }}</x-primary-button>
                    </div>
                </form>
                @if($drivers->isNotEmpty())
                    <div class="grid grid-cols-1 gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach($drivers as $driver)
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6">
                                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">{{ $driver->name }}</h2>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">Start Point: {{ $driver->start_point }}</p>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">Destination: {{ $driver->destination }}</p>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">Availability: {{ $driver->availability }}</p>
                                    <form method="POST" action="{{ route('reserve.store', $driver->id) }}">
                                        @csrf
                                        <x-primary-button type="submit">{{ __('Reserve') }}</x-primary-button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="mt-4 text-gray-600 dark:text-gray-400">No drivers available for the selected criteria.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
