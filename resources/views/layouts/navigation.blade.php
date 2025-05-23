<?php 
    $bestelling = App\Models\bestelling::find(session('bestelling_id'));
?>
<nav x-data="{ open: false, dropdownOpen: false }" class="bg-[#8C5B49] border-b-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-24 items-center">
            <!-- Left Side -->
            <div class="flex items-center space-x-4">
                <!-- Logo -->
                <a href="{{ route('home') }}">
                    <img src="/images/pizza.png" alt="Pizza House Logo" class="block h-12 w-auto">
                </a>
            </div>

            <!-- Center -->
            <div class="flex items-center space-x-4 hidden sm:flex">
                @if (!Auth::check() || !Auth::user()->isManager() && !Auth::user()->isMedewerker())
                <!-- Menu Link -->
                @if ($bestelling != null && App\Models\bestelling::Where('id', $bestelling->id)->exists())
                    <a href="{{ route('showStatus', ['bestelling' => $bestelling->id]) }}" class="text-white text-xl font-semibold hover:underline"> 
                        bestelling status
                    </a>
                    @else
                    <a href="{{ route('menu') }}" class="text-white text-xl font-semibold hover:underline"> 
                        Menu
                    </a>
                @endif
                <!-- Over Ons Link -->
                <a href="{{ route('overons') }}" class="text-white text-xl font-semibold hover:underline">
                    Over Ons
                </a>
                <!-- Contact Link -->
                <a href="{{ route('contact') }}" class="text-white text-xl font-semibold hover:underline">
                    Contact
                </a>
                @endif

                @if(Auth::check() && Auth::user()->isMedewerker())
                <a href="{{ route('bestelling.index') }}" class="text-white text-xl font-semibold hover:underline">
                    Bestellingen
                </a>
                <a href="{{ route('ingredienten.index') }}" class="text-white text-xl font-semibold hover:underline">
                    Ingredienten
                </a>
                <a href="{{ route('pizzas.index') }}" class="text-white text-xl font-semibold hover:underline">
                    Pizza's
                </a>
                @endif

                <!-- Manager Links -->
                @if(Auth::check() && Auth::user()->isManager())
                <a href="{{ route('bestelling.index') }}" class="text-white text-xl font-semibold hover:underline">
                    Bestellingen
                </a>
                <a href="{{ route('manager.index') }}" class="text-white text-xl font-semibold hover:underline">
                    Medewerkers
                </a>
                <a href="{{ route('ingredienten.index') }}" class="text-white text-xl font-semibold hover:underline">
                    Ingredienten
                </a>
                <a href="{{ route('pizzas.index') }}" class="text-white text-xl font-semibold hover:underline">
                    Pizza's
                </a>
                @endif
            </div>

            <!-- Right Side -->
            <div class="flex items-center space-x-4">
                @auth
                <!-- Dashboard Link with Dropdown -->
                <div class="relative" @click.away="dropdownOpen = false" @click="dropdownOpen = ! dropdownOpen">
                    <a href="#" class="text-white text-xl font-semibold hover:underline hidden sm:flex">
                        Profiel
                    </a>
                    <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20" style="display: none;">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <!-- Login Link -->
                <a href="{{ route('login') }}" class="text-white text-xl font-semibold hover:underline">
                    Login
                </a>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-[#a26b4d] focus:outline-none focus:bg[#a26b4d] transition duration-150 ease-in-out">
                    <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open}" class="inline-flex" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#c79976]">
        <div class="pt-2 pb-3 space-y-1">
            @if (!Auth::check() || !Auth::user()->isManager())
            <a href="{{ route('menu') }}" class="text-white text-xl font-semibold hover:underline">
                Menu
            </a>
            <a href="{{ route('overons') }}" class="text-white text-xl font-semibold hover:underline">
                Over Ons
            </a>
            <a href="{{ route('contact') }}" class="text-white text-xl font-semibold hover:underline">
                Contact
            </a>
            @endif

            @if(Auth::check() && Auth::user()->isMedewerker())
            <a href="{{ route('bestelling.index') }}" class="text-white text-xl font-semibold hover:underline">
                Bestellingen
            </a>
            @endif
            
            @auth
            @if (Auth::check() && Auth::user()->isManager())
            <a href="{{ route('bestelling.index') }}" class="block px-4 py-2 text-white text-lg font-semibold hover:underline">
                {{ __('Bestellingen') }}
            </a>
            <a href="{{ route('manager.index') }}" class="block px-4 py-2 text-white text-lg font-semibold hover:underline">
                {{ __('Medewerkers') }}
            </a>
            <a href="{{ route('ingredienten.index') }}" class="block px-4 py-2 text-white text-lg font-semibold hover:underline">
                {{ __('Ingredienten') }}
            </a>
            
            @endif
            <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2 text-white text-lg font-semibold hover:underline">
                @csrf
                <button type="submit" class="w-full text-left">
                    {{ __('Log uit') }}
                </button>
            </form>
            @endauth
        </div>
    </div>
</nav>