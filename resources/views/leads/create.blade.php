<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Lead</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container mx-auto">
        <div class="mt-8">
            <h1 class="text-2xl font-bold mb-4">Add Lead</h1>
            <form action="{{ route('leads.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea name="description" id="description" class="form-textarea mt-1 block w-full"
                        required></textarea>
                </div>
                <div class="mb-4">
                    <label for="published_at" class="block text-gray-700">Published At</label>
                    <input type="datetime-local" name="published_at" id="published_at"
                        class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700">User ID</label>
                    <input type="number" name="user_id" id="user_id" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Lead</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
