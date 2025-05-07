<x-app-layout>
    <div class="flex flex-col items-center py-10">
        <div class="w-full max-w-6xl">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Pizza's</h1>
                <a href="{{ route('pizzas.create') }}" class="flex items-center bg-green-500 text-white px-4 py-2 rounded-lg shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Pizza Toevoegen
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($pizzas as $pizza)
                    <div class="bg-[#D6CEC3] p-4 rounded-lg shadow-lg">
                        <div class="w-full h-48 overflow-hidden rounded-lg">
                            <img src="{{ $pizza->image_path }}" alt="{{ $pizza->naam }}" class="w-full h-full object-cover">
                        </div>
                        <div class="mt-4">
                            <h2 class="text-xl font-bold">{{ $pizza->naam }}</h2>
                            <p class="mt-2 text-sm text-gray-700">
                                <span class="font-bold">Ingrediënten:</span>
                                @foreach ($pizza->ingredienten as $ingredient)
                                {{ $ingredient->naam }}@if (!$loop->last), @endif
                                @endforeach 
                            </p>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <form action="{{ route('pizzas.destroy', $pizza) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">
                                    Verwijder
                                </button>
                            </form>
                            <a href="{{ route('pizzas.edit', $pizza) }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg">
                                Wijzig
                            </a>
                        </div>  
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
