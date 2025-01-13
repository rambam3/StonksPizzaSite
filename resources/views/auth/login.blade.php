<x-guest-layout>

    <div class="bg-[#5a4033] opacity-70 p-8 rounded-lg shadow-lg shadow-lg w-96">
        <h1 class="text-2xl text-center text-white font-bold mb-6 ">Login</h1>

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
                <h2><span>OF</span></h2>

                <!-- Register knop -->
                <a href="{{ route('register') }}" class="text-sm text-white bg-[#B2BF84] py-2 px-4 rounded-md hover:bg-[#8c9562]">
                    {{ __('Registreer') }}
                </a>
            </div>
        </form>
    </div>
    </div>
</x-guest-layout>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
<style>
    * {
        font-family: 'Amatic SC', cursive;
    }

    h2 {
        width: 100%;
        text-align: center;
        border-bottom: 2px solid white;
        line-height: 0.1em;
        margin: 10px 0 20px;
    }

    h2 span {
        background: #5a4033;
        padding: 0 10px;
        color: white;
    }