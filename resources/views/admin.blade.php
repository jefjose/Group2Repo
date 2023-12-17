<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (count($bookings) > 0)
                    <p class="text-white" style="margin-bottom: 10px"><b>Unapproved Bookings</b></p>
                    <table class="w-full border border-gray-300 text-white">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Name</th>
                                <th class="border border-gray-300 px-4 py-2">Email</th>
                                <th class="border border-gray-300 px-4 py-2">Phone Number</th>
                                <th class="border border-gray-300 px-4 py-2">Event Type</th>
                                <th class="border border-gray-300 px-4 py-2">Event Date</th>
                                <th class="border border-gray-300 px-4 py-2">Event Time</th>
                                <th class="border border-gray-300 px-4 py-2">Event Address</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                @if ($booking->status === 'For Review')
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->user->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->user->email }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->user->phone_number }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->event_type }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ \Carbon\Carbon::parse($booking->event_date)->format('m/d/Y') }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ \Carbon\Carbon::parse($booking->event_time)->format('h:i A') }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->event_address }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <form action="{{ route('booking.update', $booking->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to update this appointment?')">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status"
                                                    class="bg-gray-700 text-white dark:bg-gray-800 dark:text-gray-200">
                                                    <option value="For Review"
                                                        {{ $booking->status == 'For Review' ? 'selected' : '' }}>For
                                                        Review
                                                    </option>
                                                    <option value="Approved"
                                                        {{ $booking->status == 'Approved' ? 'selected' : '' }}>Approved
                                                    </option>
                                                    <option value="Rejected"
                                                        {{ $booking->status == 'Rejected' ? 'selected' : '' }}>Rejected
                                                    </option>
                                                </select>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <button type="submit"
                                                class="text-blue-600 hover:text-blue-900">Update</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <p class="text-white" style="margin-bottom: 10px; margin-top:50px"><b>Approved Bookings</b></p>
                    <table class="w-full border border-gray-300 text-white">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Name</th>
                                <th class="border border-gray-300 px-4 py-2">Email</th>
                                <th class="border border-gray-300 px-4 py-2">Phone Number</th>
                                <th class="border border-gray-300 px-4 py-2">Event Type</th>
                                <th class="border border-gray-300 px-4 py-2">Event Date</th>
                                <th class="border border-gray-300 px-4 py-2">Event Time</th>
                                <th class="border border-gray-300 px-4 py-2">Event Address</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                @if ($booking->status === 'Approved')
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->user->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->user->email }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->user->phone_number }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->event_type }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ \Carbon\Carbon::parse($booking->event_date)->format('m/d/Y') }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ \Carbon\Carbon::parse($booking->event_time)->format('h:i A') }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->event_address }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->status }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <form action="{{ route('booking.destroy', $booking->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this appoointment?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            @if ($bookings->where('status', 'Approved')->isEmpty())
                                <tr>
                                    <td colspan="9" class="border border-gray-300 px-4 py-2 text-center">
                                        <b>NO CURRENT APPROVED BOOKINGS</b>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <p class="text-white" style="margin-bottom: 10px; margin-top:50px"><b>Rejected Bookings</b></p>
                    <table class="w-full border border-gray-300 text-white">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Name</th>
                                <th class="border border-gray-300 px-4 py-2">Email</th>
                                <th class="border border-gray-300 px-4 py-2">Phone Number</th>
                                <th class="border border-gray-300 px-4 py-2">Event Type</th>
                                <th class="border border-gray-300 px-4 py-2">Event Date</th>
                                <th class="border border-gray-300 px-4 py-2">Event Time</th>
                                <th class="border border-gray-300 px-4 py-2">Event Address</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                @if ($booking->status === 'Rejected')
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->user->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->user->email }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->user->phone_number }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->event_type }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ \Carbon\Carbon::parse($booking->event_date)->format('m/d/Y') }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ \Carbon\Carbon::parse($booking->event_time)->format('h:i A') }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->event_address }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->status }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <form action="{{ route('booking.destroy', $booking->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this appoointment?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            @if ($bookings->where('status', 'Rejected')->isEmpty())
                                <tr>
                                    <td colspan="9" class="border border-gray-300 px-4 py-2 text-center">
                                        <b>NO CURRENT REJECTED BOOKINGS</b>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                @else
                    <p class="text-white text-center"><b>NO CURRENT BOOKINGS</b></p>
                @endif

            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    @php
                        // Retrieve only soft-deleted bookings
                        $deletedBookings = \App\Models\Booking::onlyTrashed()->get();
                    @endphp

                    @if (count($deletedBookings) > 0)
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
                                    <th class="border border-gray-300 px-4 py-2">Event Address</th>
                                    <th class="border border-gray-300 px-4 py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deletedBookings as $booking)
                                    <tr>
                                        <!-- Row content -->
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->user->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->user->email }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ $booking->user->phone_number }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->event_type }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ \Carbon\Carbon::parse($booking->event_date)->format('m/d/Y') }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            {{ \Carbon\Carbon::parse($booking->event_time)->format('h:i A') }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $booking->event_address }}
                                        </td>
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

</x-app-layout>
