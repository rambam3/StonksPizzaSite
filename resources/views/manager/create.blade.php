<x-app-layout>
    <div class="container mx-auto p-4 h-screen">
        <h1 class="text-2xl font-bold mb-4 text-center">Nieuwe Medewerker Toevoegen</h1>
        <form action="{{ route('manager.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Naam:</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Wachtwoord:</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="rol" class="block text-gray-700 font-bold mb-2">Functie:</label>
                <select name="rol" id="rol" class="w-full px-4 py-2 rounded-md shadow-sm" required>
                    <option value="klant">Klant</option>
                    <option value="medewerker">Medewerker</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Toevoegen</button>
            </div>
        </form>
    </div>
</x-app-layout>