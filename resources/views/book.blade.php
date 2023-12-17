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
                <select id="event_type" class="block mt-1 w-full bg-gray-800 text-white border border-gray-600 p-2 rounded" name="event_type" required autofocus autocomplete="event_type">
                    <option value="" disabled selected>Select an Event Type</option>
                    <option value="Birthday Party">Birthday Party</option>
                    <option value="Wedding Reception">Wedding Reception</option>
                    <option value="Corporate Event">Corporate Event</option>
                    <option value="Baptism Reception">Baptism Reception</option>
                    <option value="Family Reunion">Family Reunion</option>
                    <option value="Engagement Party">Engagement Party</option>
                </select>
            </div>

            @php
                $minDate = now()->addWeek()->format('Y-m-d');
            @endphp

            <div style="margin-top: 20px">
                <x-label for="event_date" value="{{ __('Event Date') }}" />
                <input id="event_date" class="block mt-1 w-full bg-gray-800 text-white border border-gray-600 p-2 rounded" type="date" name="event_date" :value="old('event_date')" min="{{ $minDate }}" required autofocus autocomplete="event_date" />
            </div>

            <div style="margin-top: 20px">
                <x-label for="event_time" value="{{ __('Event Time') }}" />
                <input id="event_time" class="block mt-1 w-full bg-gray-800 text-white border border-gray-600 p-2 rounded" type="time" name="event_time" :value="old('event_time')" required autofocus autocomplete="event_time" />
            </div>

            <div style="margin-top: 20px">
                <x-label for="event_address" value="{{ __('Ideal Event Venue') }}" />
                <input id="event_address" class="block mt-1 w-full bg-gray-800 text-white border border-gray-600 p-2 rounded" type="text" maxlength="255" name="event_address" :value="old('event_address')" required autofocus autocomplete="event_address" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">
                    {{ __('Book Now') }}
                </x-button>
            </div>
        </form>
</div>
</x-app-layout>
