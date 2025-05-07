<x-app-layout>
    <section class="flex flex-col items-center space-y-8 mt-12">
        <form class="flex flex-col bg-[#8C5B49] w-1/2 mx-auto p-8 gap-3 text-center mt-4 mb-6 rounded-2xl shadow-xl border border-black-300" action="{{ route('FinishBestelling') }}" method="post">
            @csrf
            @method('POST')
            @foreach ($bestellingregels as $bestellingregel )
                <input type="hidden" name="pizzaNaam[]" value="{{ $bestellingregel["naam"] }}">
                <input type="hidden" name="pizzaAfmeting[]" value="{{ $bestellingregel["grootte"] }}">
                <input type="hidden" name="pizzaAantal[]" value="{{ $bestellingregel["aantal"] }}">
                <input type="hidden" name="prijs[]" value="{{ $bestellingregel["prijs"] }}">
            @endforeach
            <input type="hidden" name="bestellingregels" value="{{ json_encode($bestellingregels)}}">
            <input type="hidden" name="totaalPrijs" value="{{ $totaalPrijs }}">
            <input type="hidden" name="bestelMethode" value="{{ $bestelMethode }}">
            
            <h1 class="text-4xl font-bold text-white mb-4">Afrekenen</h1>
            <input type="text" name="naam" placeholder="naam" class="shadow-inner p-2 rounded">
            @if ($bezorgKosten > 0)
                <input type="text" name="adres" placeholder="adres" class="shadow-inner p-2 rounded">
                <input type="text" name="woonplaats" placeholder="woonplaats" class="shadow-inner p-2 rounded">
            @endif
            <input type="text" name="telefoonnummer" placeholder="telefoonnummer" class="shadow-inner p-2 rounded">
            @if (auth()->user())
                <input type="hidden" name="klant_id" value="{{ auth()->user()->id }}">
                <input type="email" name="email" value="{{ auth()->user()->email }}" class="shadow-inner p-2 rounded" readonly>
            @else
                <input type="email" name="email" placeholder="email" class="shadow-inner p-2 rounded">
            @endif
            <button type="submit"
                class=  "flex items-center justify-center text-base font-medium bg-[#B2BF84] py-2 px-4 text-white rounded-full 
                    shadow-md transition ease-in-out duration-200" 
                onmouseover="this.style.backgroundColor='#8c9562'; this.style.boxShadow='0 6px 8px rgba(0, 0, 0, 0.15)';"
                onmouseout="this.style.backgroundColor='#B2BF84'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
                bestelling afronden
            </button>
        </form>
    </section>
</x-app-layout>