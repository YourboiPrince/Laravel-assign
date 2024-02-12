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
        <h1 class="text-3xl font-bold mb-4">Posts</h1>
        <div class="flex justify-between mb-4">
            <div>
                <input type="text" class="border border-gray-300 p-2" placeholder="Search posts">
            </div>
            <!-- Add a link to the create route using mustache syntax -->
            <a href="{{ route('posts.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Post</a>
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
                {{-- @if (isset($posts))
                    @foreach ($posts as $post)
                        <tr>
                            <td class="px-4 py-2">{{ $post->title }}</td>
                            <td class="px-4 py-2">
                                @if ($post->completed)
                                    <span class="bg-green-500 text-white font-bold py-1 px-2 rounded">Done</span>
                                @else
                                    <span class="bg-red-500 text-white font-bold py-1 px-2 rounded">Not Done</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('posts.show', $post->id) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show</a>
                                <button
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="px-4 py-2" colspan="3">No posts found</td>
                    </tr>
                @endif  --}}

                <!-- use a forelse loop to iterate through the tasks and display them in a table -->
                @forelse ($posts as $post)
                    <tr>
                        <td class="px-4 py-2">{{ $post->title }}</td>
                        <td class="px-4 py-2">
                            <!--log the task completed value-->
                            @php
                                Log::info($post->completed);
                            @endphp
                            <!--Escaped the php values-->
                            {{-- @if ($post->completed == true)
                                <span class="bg-green-500 text-white font-bold py-1 px-2 rounded">Done</span>
                            @else
                                <span class="bg-red-500 text-white font-bold py-1 px-2 rounded">Not Done</span>
                                
                            @endif --}}
                            <!-- Tenary operator to check if the task is completed or not -->

                            {{ $post->completed ? 'Done' : 'Not Done' }}
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('posts.show', $post->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show</a>


                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="showDeleteToast()"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>

                            <script>
                                function showDeleteToast() {
                                    toastr.success('Post deleted successfully!');
                                }
                            </script>




                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-4 py-2" colspan="3">No posts found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>
