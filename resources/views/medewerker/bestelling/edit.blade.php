<x-app-layout>
    <div class="h-screen">
        <div class="bg-[#BFB3A4] p-8 rounded-md mx-auto shadow-lg mt-12 mb-12 w-2/4">
            <!-- Bestelling Header -->
            <h2 class="text-center font-semibold text-lg tracking-wider text-gray-800 mb-6">BESTELLING {{ $bestelling->id }}</h2>

            <!-- Pizza Items -->
            <div class="space-y-4">
                @foreach ($pizzaAfmetingen as $pizzaAfmeting)
                <div class="flex justify-between bg-[#c5b8aa] px-4 py-2 rounded-md">
                    <p class="w-8 text-gray-800 font-semibold">{{ $pizzaAfmeting->aantal }}x</p>
                    <p class="text-gray-800">{{ $pizzaAfmeting->pizza_naam }}</p>
                    <p class="w-20 text-gray-800">{{ $pizzaAfmeting->grootte }}</p>
                </div>
                @endforeach
            </div>

            <form method="POST" action="{{ route('bestelling.update', $bestelling->id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="klant_id" value="{{ $bestelling->klant_id }}">
                <div class="mt-6">
                    <h3 class="font-semibold text-gray-800 mb-2">STATUS:</h3>
                    <div class="bg-gray-100 px-3 py-2 rounded-md">
                        <select name="status" class="bg-gray-100 px-3 py-1 rounded-md w-full">
                            @foreach (App\Enums\BestelStatus::toArray() as $status)
                            <option value="{{ $status }}" {{$bestelling->status }}>
                                {{ $status }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Save Button -->
                    <button type="submit" class="w-full mt-4 bg-green-500 text-white py-2 rounded-md hover:bg-green-600">OPSLAAN</button>
            </form>
        </div>
    </div>
</x-app-layout>