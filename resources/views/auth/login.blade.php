<x-layouts.guest>
    <a href="/" class="flex justify-center items-center">
        <x-ui.application-logo class="w-20 h-20 fill-current text-gray-500"/>
    </a>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>
    <form method="POST" action="{{ route('magic-link.send') }}" class="mt-4">
        @csrf

        <div>
            <x-ui.input type="email"
                          name="email"
                          id="email"
                          value="{{ old('email') }}"
                          label="Email address"
                          required
                          autofocus
            />
        </div>

        <div class="mt-6">
            <x-ui.button type="primary" rounded="md" submit="true" class="w-full">
                {{ __('Sign In with Email') }}
            </x-ui.button>
        </div>
    </form>
</x-layouts.guest>
