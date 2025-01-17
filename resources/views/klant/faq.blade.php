<x-app-layout>
<div class="max-w-6xl mx-auto p-6  rounded-md mt-20">
        <h1 class="text-2xl font-bold mb-6">Veelgestelde Vragen</h1>
        <div class="space-y-6" x-data="{ openQuestion: null }">
            <!-- Question 1 -->
            <div class="mt-10"> <!-- Added margin-top class -->
                <button @click="openQuestion = openQuestion === 1 ? null : 1"
                        class="flex items-center justify-between w-full px-4 py-2 bg-[#8C5B49] text-white font-medium rounded-md focus:outline-none">
                    Hoe kan ik mijn pizza bestellen?
                    <span x-text="openQuestion === 1 ? '-' : '+'"></span>
                </button>
                <div x-show="openQuestion === 1" class="mt-2 px-4 py-2 bg-gray-100 rounded-md text-gray-700">
                    Je kunt je pizza eenvoudig online bestellen via onze website. Voeg de gewenste pizza toe aan je winkelmand en volg de stappen om je bestelling te voltooien.
                </div>
            </div>

            <!-- Question 2 -->
            <div class="mt-10"> <!-- Added margin-top class -->
                <button @click="openQuestion = openQuestion === 2 ? null : 2"
                        class="flex items-center justify-between w-full px-4 py-2 bg-[#8C5B49] text-white font-medium rounded-md focus:outline-none">
                    Kan ik ingrediënten aanpassen of toevoegen?
                    <span x-text="openQuestion === 2 ? '-' : '+'"></span>
                </button>
                <div x-show="openQuestion === 2" class="mt-2 px-4 py-2 bg-gray-100 rounded-md text-gray-700">
                    Ja, bij het bestellen kun je extra ingrediënten toevoegen of aanpassen op de productpagina.
                </div>
            </div>

            <!-- Question 3 -->
            <div class="mt-10"> <!-- Added margin-top class -->
                <button @click="openQuestion = openQuestion === 3 ? null : 3"
                        class="flex items-center justify-between w-full px-4 py-2 bg-[#8C5B49] text-white font-medium rounded-md focus:outline-none">
                    Hoe weet ik wanneer mijn bestelling aankomt?
                    <span x-text="openQuestion === 3 ? '-' : '+'"></span>
                </button>
                <div x-show="openQuestion === 3" class="mt-2 px-4 py-2 bg-gray-100 rounded-md text-gray-700">
                    Je ontvangt een bevestiging en een geschatte bezorgtijd zodra je bestelling is geplaatst.
                </div>
            </div>

            <!-- Question 4 -->
            <div class="mt-10"> <!-- Added margin-top class -->
                <button @click="openQuestion = openQuestion === 4 ? null : 4"
                        class="flex items-center justify-between w-full px-4 py-2 bg-[#8C5B49] text-white font-medium rounded-md focus:outline-none">
                    Kan ik mijn bezorger live volgen?
                    <span x-text="openQuestion === 4 ? '-' : '+'"></span>
                </button>
                <div x-show="openQuestion === 4" class="mt-2 px-4 py-2 bg-gray-100 rounded-md text-gray-700">
                    Ja, via de track & trace-link in je bevestigingsmail kun je je bezorger live volgen.
                </div>
            </div>

            <!-- Question 5 -->
            <div class="mt-10"> <!-- Added margin-top class -->
                <button @click="openQuestion = openQuestion === 5 ? null : 5"
                        class="flex items-center justify-between w-full px-4 py-2 bg-[#8C5B49] text-white font-medium rounded-md focus:outline-none">
                    Kan ik mijn accountgegevens of bestellingen beheren?
                    <span x-text="openQuestion === 5 ? '-' : '+'"></span>
                </button>
                <div x-show="openQuestion === 5" class="mt-2 px-4 py-2 bg-gray-100 rounded-md text-gray-700">
                    Ja, log in op je account om je gegevens te beheren en eerdere bestellingen te bekijken.
                </div>
            </div>
        </div>
</div>
</x-app-layout>