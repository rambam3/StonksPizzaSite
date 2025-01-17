<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-8">Contact</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Contact Info -->
            <div class="bg-[#BFB3A4] p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-white mb-4 text-center">STONKS PIZZA</h2>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <i class="fas fa-home mr-2"></i>
                        <p>Kalverstraat 15, 1012 NX Amsterdam</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope mr-2"></i>
                        <p>stonkspizza@gmail.com</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone mr-2"></i>
                        <p>06 7364 857</p>
                    </div>
                </div>
                <h3 class="text-lg font-medium mt-6 mb-2">Openingstijden</h3>
                <ul class="text-gray-700">
                    <li>Maandag: 10:00 - 22:00</li>
                    <li>Dinsdag: 10:00 - 22:00</li>
                    <li>Woensdag: 10:00 - 22:00</li>
                    <li>Donderdag: 10:00 - 23:00</li>
                    <li>Vrijdag: 10:00 - 23:00</li>
                    <li>Zaterdag: 11:00 - 23:00</li>
                    <li>Zondag: 11:00 - 22:00</li>
                </ul>
            </div>

            <!-- Contact Form -->
            <div class="bg-[#BFB3A4] p-6 rounded-lg shadow-md w-full">
                <h2 class="text-xl font-semibold text-white mb-4 text-center">STEL JE VRAAG</h2>
                <p class="text-gray-700 mb-4">
                    Heb je een vraag, opmerking of wil je meer informatie over onze pizza's? Vul het onderstaande formulier in en ons team staat klaar om je zo snel mogelijk te helpen. We horen graag van je!
                </p>
                <form action="/submit-contact" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <input type="text" id="naam" name="naam" placeholder="Naam" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <input type="email" id="email" name="email" placeholder="Email" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <textarea id="bericht" name="bericht" placeholder="Stel je vraag" class="w-full p-2 border rounded"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-[#8C5B49] text-white hover:bg-[#2e190b] px-4 py-2 rounded ">Versturen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>