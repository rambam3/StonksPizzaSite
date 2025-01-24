<x-app-layout>
    <div class="h-screen flex items-center justify-center">
        <div class="bg-gray-700 text-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h1 class="text-xl font-bold text-center mb-6">Ingredient toevoegen</h1>
            <form action="{{ route('ingredienten.store') }}" method="POST" class="space-y-4">
                @csrf
                @method('POST')
                <div>
                    <label for="naam" class="block text-sm font-medium mb-1">Ingredient Naam</label>
                    <input type="text" id="naam" name="naam" class="w-full bg-gray-100 text-gray-800 p-2 rounded" placeholder="Voeg ingredient naam toe" required>
                </div>
                <div>
                    <label for="prijs" class="block text-sm font-medium mb-1">Prijs</label>
                    <input type="number" id="prijs" name="prijs" step="0.01" class="w-full bg-gray-100 text-gray-800 p-2 rounded" placeholder="Voeg prijs toe" required>
                </div>
                <div class="mt-6 flex justify-between">
                    <a href="{{ route('ingredienten.index') }}" class="bg-red-500 text-white px-6 py-2 rounded-lg">Terug</a>
                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
