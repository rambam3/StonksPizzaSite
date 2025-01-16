<x-app-layout>
    <div class="py-12">
        <h1 class="text-4xl font-bold ml-8">Menu</h1>
        <x-auth-session-status class="mb-4" :status="session('status')" />
    </div>
    <section class="mb-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mx-8">
            @foreach ($pizzas as $pizza)
            <div class="bg-white rounded-lg shadow-xl overflow-hidden transform transition-transform hover:scale-105" style="box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.4);">
                <img src="{{ asset($pizza->image_path) }}" alt="{{ $pizza->naam }}" class="w-full h-48 object-cover">
                <div class="bg-[#8C5B49] flex flex-col justify-center p-4">
                    <h2 class="text-center text-white text-3xl mb-2 font-semibold">{{ $pizza->naam }}</h2>
                    <p class="text-center text-white text-lg mb-4">€ {{ $pizza->prijs }}</p>
                    <a href="#" class="flex items-center justify-center text-base font-medium bg-[#B2BF84] py-2 px-4 text-white rounded-md hover:bg-[#8c9562] transition-all duration-200">
                        Bestel nu
                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" class="w-7 h-7 ml-2">
                            <path d="M9 18l6-6-6-6"></path>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
