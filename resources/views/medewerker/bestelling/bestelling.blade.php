<x-app-layout>
    <div class="container mx-auto flex flex-col items-center justify-center max-w-screen-lg">
        <h1 class="text-center text-2xl font-bold mb-6">Bestellingen</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mx-8 mb-12">
            @foreach ($bestellingen as $bestelling)
            <div class="bg-[#BFB3A4] p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-bold mb-2 text-center">Bestelling {{ $bestelling->id }}</h2>
                <ul class="mb-4 text-center text-white">
                    @foreach ($bestelling->bestelregels as $bestelregel)
                    <li>{{ $bestelregel->aantal }}x {{ $bestelregel->pizza->naam }}</li>
                    @endforeach
                </ul>
                <p class="font-bold text-center">Status: <span class="text-gray-700">{{ $bestelling->status }}</span></p>
                <div class="mt-4 flex justify-between">
                    <button class="bg-red-500 text-red-500 px-4 py-2 rounded border ">Verwijder</button>
                    <form action="{{ route('bestelling.edit', ['bestelling' => $bestelling->id]) }}" method="GET">
                        <button type="submit" class="bg-gray-600 text-gray-500 px-4 py-2 rounded border  ">Wijzig</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>