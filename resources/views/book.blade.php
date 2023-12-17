<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Now') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/style-index.css') }}">

        <x-validation-errors class="mb-4" />
        <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <form method="POST" action="{{ route('booking.store') }}" onsubmit="return confirm('Are you sure you want to submit this appoointment?')">
            @csrf

            <div style="margin-top: 20px">
                <x-label for="event_type" value="{{ __('Event Type') }}" />
                <x-input id="event_type" class="block mt-1 w-full" type="text" name="event_type" :value="old('event_type')" required autofocus autocomplete="event_type" />
            </div>

            @php
                $minDate = now()->addWeek()->format('Y-m-d');
            @endphp

            <div style="margin-top: 20px">
                <x-label for="event_date" value="{{ __('Event Date') }}" />
                <x-input id="event_date" class="block mt-1 w-full" type="date" name="event_date" :value="old('event_date')" min="{{ $minDate }}" required autofocus autocomplete="event_date" />
            </div>

            <div style="margin-top: 20px">
                <x-label for="event_time" value="{{ __('Event Time') }}" />
                <x-input id="event_time" class="block mt-1 w-full" type="time" name="event_time" :value="old('event_time')" required autofocus autocomplete="event_time" />
            </div>

            <div style="margin-top: 20px">
                <x-label for="event_address" value="{{ __('Event Address') }}" />
                <x-input id="event_address" class="block mt-1 w-full" type="text" name="event_address" :value="old('event_address')" required autofocus autocomplete="event_address" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">
                    {{ __('Book Now') }}
                </x-button>
            </div>
        </form>
</div>
</x-app-layout>
