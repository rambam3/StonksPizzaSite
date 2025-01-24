<x-app-layout>
    <div class="h-screen flex items-center justify-center">
        <div class="bg-gray-700 text-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h1 class="text-xl font-bold text-center mb-6">Wijzig Pizza</h1>
            <form action="{{ route('pizzas.update', $pizza) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="block text-sm font-medium mb-1">Pizza naam</label>
                    <input type="text" id="name" name="name" value="{{ $pizza->name }}" class="w-full bg-gray-100 text-gray-800 p-2 rounded" required>
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium mb-1">Prijs</label>
                    <input type="number" id="price" name="price" step="0.01" value="{{ $pizza->price }}" class="w-full bg-gray-100 text-gray-800 p-2 rounded" required>
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium mb-1">Afbeelding</label>
                    <input type="text" id="image" name="image" value="{{ $pizza->image_path }}" class="w-full bg-gray-100 text-gray-800 p-2 rounded" required>
                </div>
                <div>
                    <label for="ingredienten" class="block text-sm font-medium mb-1">Ingredienten</label>
                    <select name="ingredienten[]" id="ingredienten" class="w-full bg-gray-100 text-gray-800 p-2 rounded" multiple required>
                        @foreach ($ingredienten as $ingredient)
                            <option value="{{ $ingredient->id }}" @if ($pizza->ingredienten->contains($ingredient)) selected @endif>{{ $ingredient->naam }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-6 flex justify-between">
                    <a href="{{ route('pizzas.index') }}" class="bg-red-500 text-white px-6 py-2 rounded-lg">Annuleer</a>
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg">Wijzig</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>