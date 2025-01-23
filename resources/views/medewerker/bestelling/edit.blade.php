<x-app-layout>
    <div>
        <div class="bg-[#BFB3A4] p-8 rounded-md w-96 mx-auto shadow-lg mt-12 mb-12">
            <!-- Bestelling Header -->
            <h2 class="text-center font-semibold text-lg tracking-wider text-gray-800 mb-6">BESTELLING {{ $bestelling->id }}</h2>

            <!-- Pizza Items -->
            <div class="space-y-4">
                @foreach ($pizzaAfmetingen as $pizzaAfmeting)
                <div class="flex items-center space-x-4 bg-[#c5b8aa] px-4 py-2 rounded-md">
                    <span class="w-8 text-center text-gray-800 font-semibold">{{ $pizzaAfmeting->aantal }}x</span>
                    <span class="flex-1 text-gray-800">{{ $pizzaAfmeting->pizza_naam }}</span>
                    <span class="">
                        <form method="POST" action="{{ route('bestelling.update', $pizzaAfmeting->bestelregel_id) }}" class="inline">
                            @csrf
                            @method('PUT')
                            <select name="pizzaAfmetingen[{{ $pizzaAfmeting->bestelregel_id }}]" class="bg-gray-100 px-2 py-1 rounded-md" onchange="this.form.submit()">
                                @foreach ($afmetingen as $afmeting)
                                <option value="{{ $afmeting->id }}" {{ $pizzaAfmeting->afmeting_id == $afmeting->id ? 'selected' : '' }}>
                                    {{ $afmeting->grootte }}
                                </option>
                                @endforeach
                            </select>
                        </form>
                    </span>
                    <form method="POST" action="{{ route('bestelregel.destroy', $pizzaAfmeting->bestelregel_id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </form>
                </div>
                @endforeach
            </div>

            <!-- Add More Items -->
            <button type="button" class="w-full mt-4 bg-gray-500 text-white py-2 rounded-md hover:bg-gray-600">TOEVOEGEN</button>

            <!-- Status Section -->
            <form method="POST" action="{{ route('bestelling.update', $bestelling->id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="klant_id" value="{{ $bestelling->klant_id }}">
                <div class="mt-6">
                    <h3 class="font-semibold text-gray-800 mb-2">STATUS:</h3>
                    <div class="bg-gray-100 px-3 py-2 rounded-md">
                        <select name="status" class="bg-gray-100 px-3 py-1 rounded-md w-full">
                            @foreach (App\Enums\BestelStatus::toArray() as $status)
                            <option value="{{ $status }}" {{ $bestelling->status == $status ? 'selected' : '' }}>
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