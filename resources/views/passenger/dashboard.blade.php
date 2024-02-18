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
                        <x-text-input id="start_point" name="start_point" type="text" class="mt-1 block w-full" required autofocus autocomplete="start_point"/>
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
            </div>
            @isset($drivers)
                @if($drivers->isNotEmpty())
                    <div class="grid grid-cols-1 gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach($drivers as $driver)
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6">
                                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">{{ $driver->name }}</h2>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">Start Point: {{ $driver->start_point }}</p>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">Destination: {{ $driver->destination }}</p>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">Availability: {{ $driver->availability }}</p>
                                    <form method="POST" action="{{ route('reserve.store') }}">
                                        @csrf
                                        <input type="hidden" name="passenger_id" value="{{ auth()->user()->passenger->id }}">
                                        <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                        <input type="hidden" name="start_point" value="{{ $startPoint }}">
                                        <input type="hidden" name="destination" value="{{ $destination }}">
                                        <input type="hidden" name="depart_time" value="{{ $depart_time }}">
                                        <x-primary-button type="submit">{{ __('Reserve') }}</x-primary-button>
                                    </form>

                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="mt-4 text-gray-600 dark:text-gray-400">No drivers available for the selected criteria.</p>
                @endif
            @endisset
            <div class="mt-8">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Reservation History</h2>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4 p-6">
                    @isset($reservations)
                        @if($reservations->isNotEmpty())
                            <ul>
                                @foreach($reservations as $reservation)
                                    <li>
                                        <p>Driver: {{ $reservation->driver->name }}</p>
                                        <p>Start Point: {{ $reservation->start_point }}</p>
                                        <p>Destination: {{ $reservation->destination }}</p>
                                        <p>Depart Time: {{ $reservation->depart_time }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-600 dark:text-gray-400">No reservation history available.</p>
                        @endif
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
