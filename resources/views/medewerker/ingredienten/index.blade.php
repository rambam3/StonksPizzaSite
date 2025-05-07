<x-app-layout>
    <div class="flex items-center justify-center">
        <div class="bg-gray-700 text-white p-12 rounded-lg shadow-lg w-full max-w-6xl mt-12">
            <h1 class="text-xl font-bold text-center mb-6">Ingredienten</h1>
            <div class="grid grid-cols-4 gap-4">
                @foreach ($ingredienten as $ingredient)
                    <div class="flex items-center justify-between bg-gray-100 text-gray-800 p-3 rounded">
                        <span>{{ $ingredient->naam }}</span>
                        <div class="flex gap-2">
                            <a href="{{ route('ingredienten.edit', $ingredient) }}" class="text-blue-500 font-bold">Wijzing</a>
                            <form action="{{ route('ingredienten.destroy', $ingredient) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-bold">X</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-6 text-center">
                <a href="{{ route('ingredienten.create') }}" class="bg-green-500 text-white px-6 py-2 rounded-lg">Ingredient Toevoegen</a>
            </div>
        </div>
    </div>
</x-app-layout>
