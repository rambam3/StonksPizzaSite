<x-app-layout>
<?php
if(isset($_POST["bezorgKosten"]))
{
    $bezorgKosten = $_POST["bezorgKosten"];
}
?>
    <div class="py-12">
        <h1 class="text-4xl font-bold ml-8">Bestellen</h1>
        <x-auth-session-status class="mb-4" :status="session('status')" />
    </div>
    <section class="mb-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8 mx-8">
            @foreach ($pizzas as $pizza)
            <div class="rounded-lg overflow-hidden transform transition-transform hover:scale-105 flex flex-col" style="box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.4); height: 100%;">
                <img src="{{ asset($pizza->image_path) }}" alt="{{ $pizza->naam }}" style="width: 100%; height: 12rem; object-fit: cover;">
                
                <div class="flex flex-col justify-between p-4 flex-grow" style="background-image: url('{{ asset('images/menuWoodBackground.jpg') }}'); background-size: cover; display: flex; flex-direction: column; justify-content: space-between; flex-grow: 1;">
                    <h2 class="text-center text-white text-3xl mb-2 font-semibold">{{ $pizza->naam }}</h2>
                    
                    <p class="text-center text-white mb-4">
                        @foreach ($pizza->ingredienten as $ingredient)
                            {{ $ingredient->naam }}@if (!$loop->last), @endif
                        @endforeach
                    
                    </p>
                    
                    <p class="text-center text-white text-lg mb-4">€ {{ $pizza->prijs }}</p>
                    <form>
                        <select name="grootte" class="mb-4 p-2 rounded w-20">
                            @foreach ($pizzaAfmetingen as $pizzaAfmeting )
                                <option value="{{ $pizzaAfmeting->grootte }}">{{ $pizzaAfmeting->grootte }}</option>
                            @endforeach
                        </select>
                        <button class="flex items-center justify-center text-base font-medium" style="background-color: #B2BF84; padding: 0.5rem 1rem; color: white; border-radius: 9999px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.2s ease-in-out;"
                            onmouseover="this.style.backgroundColor='#8c9562'; this.style.boxShadow='0 6px 8px rgba(0, 0, 0, 0.15)';"
                            onmouseout="this.style.backgroundColor='#B2BF84'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
                            toevoegen
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <section>
        <div class="py-12 flex justify-center">
            <h1 class="text-4xl font-bold ml-8">Bestelling</h1>
            <x-auth-session-status class="mb-4" :status="session('status')" />
        </div>
    </section>
</x-app-layout>