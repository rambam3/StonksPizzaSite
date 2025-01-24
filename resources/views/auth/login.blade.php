<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('../css/fontStyle.css') }}">


<x-guest-layout>
    <div class="bg-[#5a4033] opacity-70 p-7 rounded-lg shadow-lg w-96">
        <h1 class="text-7xl text-center text-white font-bold mb-6">Login</h1>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf


            <!-- Gebruikersnaam -->
            <div class="mb-4">
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Gebruikersnaam" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
            </div>

            <!-- Wachtwoord -->
            <div class="mb-4">
                <x-text-input id="password" class="block mt-1 w-full "
                    type="password"
                    name="password"
                    required autocomplete="current-password" placeholder="Wachtwoord" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
            </div>

            <!-- Remember me -->
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-green-500 shadow-sm focus:ring focus:ring-green-300" name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-300">{{ __('Onthoud mij') }}</label>
            </div>

            <div class="flex flex-col items-center justify-center">
                <!-- Login knop -->

                <x-inlog-button>
                    {{ __('Login') }}
                </x-inlog-button>

                <!--Seperator -->
                <h2 class="w-full text-center border-b-2 border-white  mt-2.5 mb-5 leading-[0.1em] "><span class="text-white bg-[#5a4033] px-2.5">OF</span></h2>

                <!-- Register knop -->
                <a href="{{ route('register') }}" class="text-lg font-bold bg-[#B2BF84] py-2 px-7  rounded-md hover:bg-[#8c9562]">
                    {{ __('Registreer') }}
                </a>
                <a href="{{route("home")}}" class="text-sm text-gray-300 hover:text-gray-100 mt-4">
                    doorgaan zonder account
                </a>
            </div>
        </form>
    </div>
    </div>
</x-guest-layout>