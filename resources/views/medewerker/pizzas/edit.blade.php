<x-app-layout>
    <div class="flex items-center justify-center mt-12">
        <div class="bg-gray-700 text-white p-8 rounded-lg shadow-lg w-1/2">
            <h1 class="text-xl font-bold text-center mb-6">Pizza bewerken</h1>
            <form action="{{ route('pizzas.update', $pizza->id) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="block text-sm font-medium mb-1">Pizza naam</label>
                    <input type="text" id="name" name="name" 
                           class="w-full bg-gray-100 text-gray-800 p-2 rounded" 
                           placeholder="Voeg pizza naam toe" 
                           value="{{ $pizza->naam }}" required>
                </div>
                <div>
                    <label for="afbeelding" class="block text-sm font-medium mb-1">Afbeelding</label>
                    <input type="file" id="afbeelding" name="afbeelding" 
                           class="w-full bg-gray-100 text-gray-800 p-2 rounded">
                    <p class="text-sm text-gray-300 mt-1">Laat leeg als je de huidige afbeelding wilt behouden.</p>
                </div>
                <div>
                    <label for="ingredienten" class="block text-sm font-medium mb-1">Ingredienten</label>
                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($ingredienten as $ingredient)
                            <div class="flex items-center">
                                <input type="checkbox" id="ingredient_{{ $ingredient->id }}" 
                                       name="ingredienten[]" 
                                       value="{{ $ingredient->id }}" 
                                       class="mr-2"
                                       {{ in_array($ingredient->id, $pizzaIngredienten) ? 'checked' : '' }}>
                                <label for="ingredient_{{ $ingredient->id }}" class="text-gray-100">{{ $ingredient->naam }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-6 flex justify-between">
                    <a href="{{ route('pizzas.index') }}" class="bg-red-500 text-white px-6 py-2 rounded-lg">Terug</a>
                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg">Wijzig</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
