@if(auth()->check())
<x-app-layout>
    <div class="container mx-auto px-4 bg-[#F2EADF]">
        <!-- Welcome Section -->

        <section class="text-center py-12" style="background: url('images/Pizza-Achtergrond-home.jpg') no-repeat center center; background-size: cover;">
            <h1 class="text-4xl font-bold mb-4 text-white">
                <?php
                date_default_timezone_set('Europe/Amsterdam');
                $time = date("H");
                if ($time < 12) {
                    $greeting = "Goedemorgen ";
                } elseif ($time < 17) {
                    $greeting = "Goedenmiddag ";
                } else {
                    $greeting = "Goedenavond ";
                }
                echo $greeting ?> {{ Auth::user()->name }} </h1>
            <p class="text-lg mb-6 text-white">Vers uit de oven, snel bij jou thuis!</p>
            <a href="{{ url('/menu') }}" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition">
                Menu
            </a>
        </section>

        <!-- Popular Pizzas Section -->
        <section class="py-12">
            <h2 class="text-3xl font-bold text-left mb-8">Populair</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($pizzas as $pizza)
                <div class="bg-[#F2EADF] overflow-hidden">
                    <img src="{{ asset($pizza->image_path) }}" alt="{{ $pizza->naam }} Pizza" class="w-full h-48 object-cover">
                    <div class="p-4 text-center" style="background-color: #8b5e3c; color: white;">
                        <h3 class="text-xl font-bold mb-2">{{ $pizza->naam }}</h3>
                    </div>
                    <div class="p-4 text-center">
                        <a href="#" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition inline-block" style="width: auto;">
                            Bestel Nu
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- About Us Section -->
        <section class="bg-[#8C5B49] py-12 text-center">
            <h2 class="text-3xl font-bold mb-4 text-white">Wie Zijn Wij?</h2>
            <p class="text-lg max-w-3xl mx-auto text-white">
                Bij Stonks Pizza draait alles om smaak, kwaliteit en snelheid. Wij maken pizza's met liefde,
                gebruikmakend van de beste ingrediënten en authentieke recepten. Of je nu trek hebt in een
                klassieke Margherita of een gedurfde, unieke creatie – bij ons zit je goed!
            </p>
        </section>
    </div>
</x-app-layout>
@else
<x-app-layout>
    <div class="container mx-auto px-4">
        <!-- Welcome Section -->
        <section class="text-center py-12" style="background: url('images/Pizza-Achtergrond-home.jpg') no-repeat center center; background-size: cover;">
            <h1 class="text-4xl font-bold mb-4 text-white"> <?php
                                                            date_default_timezone_set('Europe/Amsterdam');
                                                            $time = date("H");
                                                            if ($time < 12) {
                                                                $greeting = "Goedemorgen ";
                                                            } elseif ($time < 17) {
                                                                $greeting = "Goedenmiddag ";
                                                            } else {
                                                                $greeting = "Goedenavond ";
                                                            }
                                                            echo $greeting ?></h1>
            <p class="text-lg mb-6 text-white">Vers uit de oven, snel bij jou thuis!</p>
            <a href="{{ url('/menu') }}" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition">
                Menu
            </a>
        </section>

        <!-- Popular Pizzas Section -->
        <section class="py-12">
            <h2 class="text-3xl font-bold text-left mb-8">Populair</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($pizzas as $pizza)
                <div class="bg-[#F2EADF] overflow-hidden">
                    <img src="{{ asset($pizza->image_path) }}" alt="{{ $pizza->naam }} Pizza" class="w-full h-48 object-cover">
                    <div class="p-4 text-center" style="background-color: #8b5e3c; color: white;">
                        <h3 class="text-xl font-bold mb-2">{{ $pizza->naam }}</h3>
                    </div>
                    <div class="p-4 text-center">
                        <a href="#" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition inline-block" style="width: auto;">
                            Bestel Nu
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- About Us Section -->
        <section class="bg-[#8C5B49] py-12 text-center">
            <h2 class="text-3xl font-bold mb-4 text-white">Wie Zijn Wij?</h2>
            <p class="text-lg max-w-3xl mx-auto text-white">
                Bij Stonks Pizza draait alles om smaak, kwaliteit en snelheid. Wij maken pizza's met liefde,
                gebruikmakend van de beste ingrediënten en authentieke recepten. Of je nu trek hebt in een
                klassieke Margherita of een gedurfde, unieke creatie – bij ons zit je goed!
            </p>
        </section>
    </div>
</x-app-layout>
@endif