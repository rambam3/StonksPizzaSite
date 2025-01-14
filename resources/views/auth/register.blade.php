<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('../css/fontStyle.css') }}">
<x-guest-layout>
    <div class="bg-[#5a4033] opacity-70 p-8 rounded-lg shadow-lg shadow-lg w-96">
        <h1 class="text-2xl text-center text-white font-bold mb-6 ">Create account</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Naam -->
            <div class="mb-4">
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Naam" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
            </div>

            <!-- Wachtwoord -->
            <div class="mb-4">
                <x-text-input id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="new-password" placeholder="Wachtwoord" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
            </div>

            <!-- Bevestig wachtwoord -->
            <div class="mb-4">
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    required autocomplete="new-password" placeholder="Bevestig wachtwoord" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
            </div>

            <!-- Al geregristreerd? -->
            <div class="flex items-center justify-between mt-6">
                <a class="underline text-sm text-gray-300 hover:text-gray-200" href="{{ route('login') }}">
                    {{ __('Al geregristeerd??') }}
                </a>


                <!-- Register knop -->
                <x-primary-button>
                    {{ __('Registreer') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    </div>
</x-guest-layout>
