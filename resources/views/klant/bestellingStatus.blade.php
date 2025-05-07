<x-app-layout>
<section>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight mb-4 ">Bestelling Status</h2>
        <div class="flex items-center justify-between mb-4">
            <div class="text-lg text-gray-600">Bestelling Nummer:</div>
            <div class="text-lg font-semibold text-gray-800">{{$bestelling['id']}}</div>
        </div>
        <div class="flex items-center justify-between mb-4">
            <div class="text-lg text-gray-600">Status:</div>
            <div class="text-lg font-semibold text-green-500">{{$bestelling['status']}}</div>
        </div>
        <div class="flex items-center justify-between mb-4">
            <div class="text-lg text-gray-600">Totaal Bedrag:</div>
            <div class="text-lg font-semibold text-gray-800">{{$bestelling['totaalPrijs']}}</div>
        </div>
        <div class="mt-6">
            <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-900">Terug naar Home</a>
        </div>
    </div>
</div>
</section>
</x-app-layout>