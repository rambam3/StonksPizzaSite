<x-app-layout>
    <div class="flex items-center justify-center">
        <div class="bg-gray-700 text-white p-8 rounded-lg shadow-lg max-w-md w-full mt-12">
            <h1 class="text-xl font-bold text-center mb-6">Wijzig Ingredient</h1>
            <form action="{{ route('ingredienten.update', $ingredient) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="naam" class="block text-sm font-medium mb-1">Ingredient naam</label>
                    <input type="text" id="naam" name="naam" value="{{ $ingredient->naam }}" class="w-full bg-gray-100 text-gray-800 p-2 rounded" required>
                </div>
                <div>
                    <label for="prijs" class="block text-sm font-medium mb-1">prijs</label>
                    <input type="number" id="prijs" name="prijs" step="0.01" value="{{ $ingredient->prijs }}" class="w-full bg-gray-100 text-gray-800 p-2 rounded" required>
                </div>
                <div class="mt-6 flex justify-between">
                    <a href="{{ route('ingredienten.index') }}" class="bg-red-500 text-white px-6 py-2 rounded-lg">Annuleer</a>
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg">Wijzig</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
