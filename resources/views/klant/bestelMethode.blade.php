<x-app-layout>
    <section class="flex flex-col items-center h-screen space-y-8 mt-12">
        <div class="text-center">
            <h1 class="text-4xl font-bold">Pizza punten?</h1>
            <p class="text-lg mt-2">Wil jij genieten van een lekkere gratis pizza? Maak dan nu een account aan.</p>
            <a href="{{ route('register') }}" class="mt-4 inline-block bg-[#B2BF84] text-white font-bold py-2 px-4 rounded hover:bg-blue-600">
                Maak een account aan
            </a>
        </div>
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-6">Bestel methode</h1>
            <div class="flex space-x-8">
                <form action="{{route('bestellen')}}" method="post">
                    @csrf
                    @method('POST')
                    <input type="hidden"  name="bezorgKosten" value="0.00">
                <button type="submit"  class="bg-white rounded-lg shadow-lg p-6 w-64 transform transition-transform hover:scale-105" >
                    <h2 class="text-2xl font-bold mb-4">Afhalen</h2>
                    <img src="images/restaurantIcon.png" alt="Restaurant Icon" class="w-16 h-16 mx-auto">
                </button>

                </form>
                <form action="{{route('bestellen')}}" method="post">
                    @csrf
                    @method('POST')
                <input type="hidden" name="bezorgKosten" value="2.50">
                <button type="submit" class="bg-slate-900 rounded-lg shadow-lg p-6 w-64 transform transition-transform hover:scale-105" >
                    <h2 class="text-2xl text-white font-bold mb-4">Bezorgen</h2>
                    <img src="images/fast-deliveryIcon.png" alt="Car Icon" class="w-16 h-16 mx-auto">
                </button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
