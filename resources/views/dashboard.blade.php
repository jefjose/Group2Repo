<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                @php
                    // Retrieve only soft-deleted bookings for the authenticated user
                    $authUserId = auth()->user()->id;
                    $userBookings = \App\Models\Booking::where('user_id', $authUserId)->get();
                @endphp
    
                @if (count($userBookings) > 0)
                    <p class="text-white" style="margin-bottom: 10px"><b>Recent Bookings</b></p>
                    <table class="w-full border border-gray-300 text-white">
                        <thead>
                            <tr>
                                <!-- Table header cells -->
                                <th class="border border-gray-300 px-4 py-2">Name</th>
                                <th class="border border-gray-300 px-4 py-2">Email</th>
                                <th class="border border-gray-300 px-4 py-2">Phone Number</th>
                                <th class="border border-gray-300 px-4 py-2">Event Type</th>
                                <th class="border border-gray-300 px-4 py-2">Event Date</th>
                                <th class="border border-gray-300 px-4 py-2">Event Time</th>
                                <th class="border border-gray-300 px-4 py-2">Ideal Event Venue</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userBookings as $booking)
                                <tr>
                                    <!-- Row content -->
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->user->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->user->email }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->user->phone_number }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->event_type }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($booking->event_date)->format('m/d/Y') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($booking->event_time)->format('h:i A') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->event_address }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-white text-center"><b>NO RECENT BOOKINGS</b></p>
                @endif
            </div>
        </div>
    </div>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('book') }}">
            <button style="padding: 10px 20px; background-color: orange; color: #000; border: none; border-radius: 4px; cursor: pointer;">
                <b>Book Now</b>
            </button>
        </a>
    </div>
</body>
</x-app-layout>
