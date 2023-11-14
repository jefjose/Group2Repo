<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Now') }}
        </h2>
    </x-slot>

    <x-booking-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('booking.store') }}">
            @csrf

            <div>
                <x-label for="event_type" value="{{ __('Event Type') }}" />
                <x-input id="event_type" class="block mt-1 w-full" type="text" name="event_type" :value="old('event_type')" required autofocus autocomplete="event_type" />
            </div>

            <div>
                <x-label for="event_date" value="{{ __('Event Date') }}" />
                <x-input id="event_date" class="block mt-1 w-full" type="date" name="event_date" :value="old('event_date')" required autofocus autocomplete="event_date" />
            </div>

            <div>
                <x-label for="event_time" value="{{ __('Event Time') }}" />
                <x-input id="event_time" class="block mt-1 w-full" type="time" name="event_time" :value="old('event_time')" required autofocus autocomplete="event_time" />
            </div>

            <div>
                <x-label for="event_address" value="{{ __('Event Address') }}" />
                <x-input id="event_address" class="block mt-1 w-full" type="text" name="event_address" :value="old('event_address')" required autofocus autocomplete="event_address" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">
                    {{ __('Book Now') }}
                </x-button>
            </div>
        </form>
    </x-booking-card>
</x-app-layout>
