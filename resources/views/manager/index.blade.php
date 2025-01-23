<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4 text-center">MEDEWERKERS</h1>

        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('manager.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">+ MEDEWERKER TOEVOEGEN</a>
            <div class="relative">
                <input type="text" class="w-64 px-4 py-2 rounded-md shadow-sm" placeholder="zoeken" />
                <span class="absolute inset-y-0 right-0 flex items-center pr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3 px-4 text-left font-bold text-gray-900">NAAM </th>
                        <th class="py-3 px-4 text-left font-bold text-gray-900">FUNCTIE</th>
                        <th class="py-3 px-4 text-left font-bold text-gray-900">ACTIES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="py-3 px-4">{{ $user->name }}</td>
                        <td class="py-3 px-4">{{ $user->rol }}</td>
                        <td class="py-3 px-4">
                            <a href="{{ route('manager.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                            <form action="{{ route('manager.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>