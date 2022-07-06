<x-guest-layout>
    @section('subtitle', 'Login')
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('E-mail')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <x-button class="btn btn-secondary w-100 color border border-collapse text-decoration-none text-white ">
                    {{ __('Entrar') }}
            </x-button>

            <div class="flex justify-content-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Esqueceu a senha?') }}
                    </a>
                @endif
                
            </div>
            
            <div class="row justify-content-center align-items-center">
            <a class="btn w-50" href="{{ route('register') }}" style="background-color:#9f00e4; color:white">
                        {{ __('Criar uma conta') }}
                    </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
