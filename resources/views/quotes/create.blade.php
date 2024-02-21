<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quote</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container mx-auto">
        <div class="mt-8">
            <h1 class="text-2xl font-bold mb-4">Add Quote</h1>
            <form action="{{ route('quotes.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="deal_id" class="block text-gray-700">Deal ID</label>
                    <input type="number" name="deal_id" id="deal_id" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="account_id" class="block text-gray-700">Account ID</label>
                    <input type="number" name="account_id" id="account_id" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="contact_id" class="block text-gray-700">Contact ID</label>
                    <input type="number" name="contact_id" id="contact_id" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="quote_date" class="block text-gray-700">Quote Date</label>
                    <input type="datetime-local" name="quote_date" id="quote_date" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="expiry_date" class="block text-gray-700">Expiry Date</label>
                    <input type="datetime-local" name="expiry_date" id="expiry_date" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="total" class="block text-gray-700">Total</label>
                    <input type="number" name="total" id="total" class="form-input mt-1 block w-full" step="0.01" required>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-gray-700">Status</label>
                    <input type="text" name="status" id="status" class="form-input mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Quote</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
