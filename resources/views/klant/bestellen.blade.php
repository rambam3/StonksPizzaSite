<x-app-layout>
<?php
if(isset($_POST["bezorgKosten"])) {
    $bezorgKosten = $_POST["bezorgKosten"];
} else {
    $bezorgKosten = 0;
}

if($bezorgKosten > 0) {
    $bestelMethode = "bezorging";
} else {
    $bestelMethode = "afhalen";
}
?>
<script src="js/bestelling.js"></script>
<div class="py-12">
    <h1 class="text-4xl font-bold ml-8">Bestellen</h1>
    <x-auth-session-status class="mb-4" :status="session('status')" />
</div>

<section class="mb-12 grid grid-cols-1 lg:grid-cols-[3fr_1fr] gap-8 mx-8">
    <!-- Pizzalijst -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($pizzas as $pizza)
        <div class="rounded-lg overflow-hidden transform transition-transform hover:scale-105 flex flex-col" style="box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.4); height: 100%;">
            <img src="{{ asset($pizza->image_path) }}" alt="{{ $pizza->naam }}" style="width: 100%; height: 12rem; object-fit: cover;">
            <div class="flex flex-col justify-between p-4 flex-grow" style="background-image: url('{{ asset('images/menuWoodBackground.jpg') }}'); background-size: cover;">
                <h2 class="text-center text-white text-3xl mb-2 font-semibold">{{ $pizza->naam }}</h2>
                <p class="text-center text-white mb-4">
                    @foreach ($pizza->ingredienten as $ingredient)
                        {{ $ingredient->naam }}@if (!$loop->last), @endif
                    @endforeach
                </p>
                <p class="text-center text-white text-lg mb-4 prijs" data-field-id="{{ $pizza->prijs }}">€ {{ $pizza->prijs }}</p>
                <div class="flex flex-col items-center">
                    <input type="hidden" name="pizza_id" value="{{ $pizza->id }}">
                    <div>
                        <select name="grootte" class="mb-4 p-2 rounded w-32 grootte">
                            @foreach ($pizzaAfmetingen as $pizzaAfmeting)
                                <option value="{{ $pizzaAfmeting->grootte }}">{{ $pizzaAfmeting->grootte }}</option>
                            @endforeach
                        </select>
                        <input type="number" name="aantal" class="mb-4 p-2 rounded w-32" placeholder="Aantal" id="aantal-{{ $pizza->id }}">
                    </div>
                    <button type="button"
                            class="flex items-center justify-center text-base font-medium"
                            style="background-color: #B2BF84; padding: 0.5rem 1rem; color: white; border-radius: 9999px; 
                                   box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.2s ease-in-out;"
                            onmouseover="this.style.backgroundColor='#8c9562'; this.style.boxShadow='0 6px 8px rgba(0, 0, 0, 0.15)';"
                            onmouseout="this.style.backgroundColor='#B2BF84'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';"
                            onclick="toevoegenBestelling({{ $pizza->id }}, '{{ $pizza->naam }}', this)">
                        toevoegen
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Bestellinglijst -->
    <form action="{{route('afrekenen')}}" method="get" class="flex flex-col bg-[#8C5B49] p-4 h-min border-2 border-black rounded-lg shadow-lg">
        @csrf
        <h1 class="text-4xl font-bold text-white mb-4">Uw Bestelling</h1>
        <div class="bestelling-lijst"></div>
        <div class="text-white">
            <p class="bezorgkosten-display">Bezorgkosten: € <span class="bezorgkosten-amount" data-cost="{{ $bezorgKosten }}">{{ $bezorgKosten }}</span></p>
            <h2 class="totaal-prijs mt-2">Totaal: € 0.00</h2>
        </div>
        <button type="submit"
                class="mt-4 text-base font-medium"
                style="background-color: #B2BF84; padding: 0.5rem 1rem; color: white; border-radius: 9999px; 
                       box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.2s ease-in-out;"
                onmouseover="this.style.backgroundColor='#8c9562'; this.style.boxShadow='0 6px 8px rgba(0, 0, 0, 0.15)';"
                onmouseout="this.style.backgroundColor='#B2BF84'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
            Afrekenen
        </button>

        <input type="hidden" id="hiddenBestellingregel" name="bestellingregel" value="[]">
        <input type="hidden" id="hiddenBezorgkosten" name="bezorgKosten" value="{{$bezorgKosten}}">
        <input type="hidden" id="hiddenTotaalPrijs" name="totaalPrijs" value="">
        <input type="hidden" id="hiddenBestelMethode" name="bestelMethode" value="{{$bestelMethode}}">
    </form>
</section>
</x-app-layout>
