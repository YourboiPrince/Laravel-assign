@extends('layouts.app')

@section('content')
    {{-- Use flowbite for the UI --}}
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Contact name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Organization
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- Check if contacts are empty --}}
                @forelse ($contacts as $contact)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{-- Display contact first and last name --}}
                            {{ $contact->full_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $contact->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $contact->phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{-- Display organization name if available --}}
                            {{ optional($contact->organization)->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{-- Display contact image --}}
                            <img src="{{ asset('images/' . $contact->image) }}" alt="{{ $contact->full_name }}"
                                class="w-10 h-10 rounded-full">
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4" colspan="5">
                            No contacts found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Create a link to the create contact page with Blade icon -->
    <a href="{{ route('contacts.create') }}" class="btn btn-primary">
        @svg('ri-contacts-fill') {{-- Replace 'heroicon-s-plus' with the appropriate Blade icon name --}}
        Add Contact
    </a>
@endsection
