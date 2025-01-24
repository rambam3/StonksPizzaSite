<x-app-layout>
    <div class="container mx-auto p-4 h-screen">
        <h1 class="text-2xl font-bold mb-4 text-center">Edit Medewerker</h1>
        <form action="{{ route('manager.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Naam:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="w-full px-4 py-2 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="w-full px-4 py-2 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="rol" class="block text-gray-700 font-bold mb-2">Functie:</label>
                <select name="rol" id="rol" class="w-full px-4 py-2 rounded-md shadow-sm">
                    <option value="klant" {{ $user->rol == 'klant' ? 'selected' : '' }}>Klant</option>
                    <option value="medewerker" {{ $user->rol == 'medewerker' ? 'selected' : '' }}>Medewerker</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>