<x-layouts.guest>
    <a href="/" class="flex justify-center items-center">
        <x-ui.application-logo class="w-20 h-20 text-gray-500 fill-current"/>
    </a>
    <br />

    @if (session('status') == 'verification-link-sent')
        <div class="bg-green-50 rounded-md p-4">
            <div class="flex">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-5 w-5 text-green-400"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" fill="currentColor"></path></svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-green-800 text-sm font-medium">Success!</h3>
                    <div class="text-green-700 text-sm mt-2"><p>{{ __('A new verification link has been sent to the email address you provided during registration.') }}</p></div>
                </div>
            </div>
        </div>
        <br />
    @endif

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-ui.button variant="primary" rounded="md" submit="true" class="w-full">
                    {{ __('Resend Verification Email') }}
                </x-ui.button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-ui.button variant="primary" rounded="md" submit="true" class="w-full">
                {{ __('Log Out') }}
            </x-ui.button>
        </form>
    </div>
</x-layouts.guest>
