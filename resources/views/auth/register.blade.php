<x-guest-layout>

    <div class="rounded-lg shadow-lg p-8 w-full max-w-4xl">
        <div class="flex justify-between">
            <button class="w-1/2 px-6 py-3 text-white bg-blue-500 rounded-l-md focus:outline-none"
                    onclick="switchForm('driverForm')">
                <span class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>Driver</span>
                </span>
            </button>
            <button class="w-1/2 px-6 py-3 text-white bg-blue-500 rounded-r-md focus:outline-none"
                    onclick="switchForm('passengerForm')">
                <span class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>Passenger</span>
                </span>
            </button>
        </div>

        <form id="passengerForm" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <h2 class="text-white text-xl  text-center my-5">Your journey as a passenger start here!</h2>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <input type="hidden" name="role" value="passenger">
        <input type="file" name="picture" class="mt-3">

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <form id="driverForm" method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="hidden" >
        @csrf

        <h2 class="text-white text-xl  text-center my-5">Your journey as a driver start here!</h2>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- description -->
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 h-[120px] w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- vehicleType -->
        <div>
            <x-input-label for="vehicleType" :value="__('VehicleType')" />
            <x-text-input id="vehicleType" class="block mt-1 w-full" type="text" name="vehicleType" :value="old('vehicleType')" required autofocus autocomplete="vehicleType" />
            <x-input-error :messages="$errors->get('vehicleType')" class="mt-2" />
        </div>

        <!-- LicensePlate -->
        <div>
            <x-input-label for="licensePlate" :value="__('LicensePlate')" />
            <x-text-input id="licensePlate" class="block mt-1 w-full" type="text" name="licensePlate" :value="old('licensePlate')" required autofocus autocomplete="licensePlate" />
            <x-input-error :messages="$errors->get('licensePlate')" class="mt-2" />
        </div>

        <!-- paymentMethod -->
        <div>
            <x-input-label for="paymentMethod" :value="__('Payment Method')" />

            <div class="my-2 flex justify-around items-center ">
                <label for="paymentMethod_cash" class="flex items-center">
                    <input id="paymentMethod_cash" name="paymentMethod" type="checkbox" value="cash" class="rounded text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                    <span class="ml-2 text-sm text-gray-600">Cash</span>
                </label>

                <label for="paymentMethod_crypto" class="flex items-center">
                    <input id="paymentMethod_crypto" name="paymentMethod" type="checkbox" value="crypto" class="rounded text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                    <span class="ml-2 text-sm text-gray-600">Crypto</span>
                </label>

                <label for="paymentMethod_card" class="flex items-center">
                    <input id="paymentMethod_card" name="paymentMethod" type="checkbox" value="card" class="rounded text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                    <span class="ml-2 text-sm text-gray-600">Card</span>
                </label>
            </div>

            <x-input-error :messages="$errors->get('paymentMethod')" class="mt-2" />
        </div>


        <!-- Start_point -->
        <div>
            <x-input-label for="start_point" :value="__('Start_point')" />
            <x-text-input id="start_point" class="block mt-1 w-full" type="text" name="start_point" :value="old('start_point')" required autofocus autocomplete="start_point" />
            <x-input-error :messages="$errors->get('start_point')" class="mt-2" />
        </div>

        <!-- Destination -->
        <div>
            <x-input-label for="destination" :value="__('Destination')" />
            <x-text-input id="destination" class="block mt-1 w-full" type="text" name="destination" :value="old('destination')" required autofocus autocomplete="destination" />
            <x-input-error :messages="$errors->get('destination')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <input type="hidden" name="role" value="driver">
        <input type="file" name="picture" class="mt-3">

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
        <script>
            function switchForm(formId) {
                const passengerForm = document.getElementById('passengerForm');
                const driverForm = document.getElementById('driverForm');

                if (formId === 'driverForm') {
                    passengerForm.classList.add('hidden');
                    driverForm.classList.remove('hidden');
                } else {
                    passengerForm.classList.remove('hidden');
                    driverForm.classList.add('hidden');
                }
            }
        </script>
</x-guest-layout>

