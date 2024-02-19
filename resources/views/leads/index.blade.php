<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-gray-100">

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Leads</h1>
        <div class="flex justify-between mb-4">
            <div>
                <input type="text" class="border border-gray-300 p-2" placeholder="Search leads">
            </div>
            <a href="{{ route('leads.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Lead</a>
        </div>
        <table class="table-auto mx-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leads as $lead)
                    <tr>
                        <td class="px-4 py-2">{{ $lead->title }}</td>
                        <td class="px-4 py-2">
                            {{ $lead->published_at ? 'Published' : 'Not Published' }}
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('leads.show', $lead->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show</a>

                            <form action="{{ route('leads.destroy', $lead->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="showDeleteToast()"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>

                            <script>
                                function showDeleteToast() {
                                    toastr.success('Lead deleted successfully!');
                                }
                            </script>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-4 py-2" colspan="3">No leads found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>
