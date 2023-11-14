<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Bookings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if(count($bookings) > 0)
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
                            @foreach($bookings as $booking)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->user->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->user->email }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->user->phone_number }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->event_type }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($booking->event_date)->format('m/d/Y') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($booking->event_time)->format('h:i A') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->event_address }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <form action="{{ route('booking.update', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="bg-gray-700 text-white dark:bg-gray-800 dark:text-gray-200">
                                                <option value="For Review" {{ $booking->status == 'For Review' ? 'selected' : '' }}>For Review</option>
                                                <option value="Rejected" {{ $booking->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                                <option value="For Approval" {{ $booking->status == 'For Approval' ? 'selected' : '' }}>For Approval</option>
                                                <option value="Approved" {{ $booking->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                            </select>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <button type="submit" class="text-blue-600 hover:text-blue-900">Update</button>
                                        </form>
                                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-white">No bookings available.</p>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
