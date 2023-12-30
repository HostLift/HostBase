<x-layouts.guest>
    <a href="/" class="flex justify-center items-center">
        <x-ui.application-logo class="w-20 h-20 text-gray-500 fill-current"/>
    </a><br />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-ui.input type="text"
                          name="name"
                          id="name"
                          value="{{ old('name') }}"
                          label="Name"
                          required
                          autofocus
            />
            <x-ui.input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-3">
            <x-ui.input type="email"
                          name="email"
                          id="email"
                          value="{{ old('email') }}"
                          label="Email address"
                          required/>
            <x-ui.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- T&C & PP's Checkbox --}}
        @if( config('magickit.terms_and_privacy') )
        <div class="mt-3 items-start flex relative">
            <div class="h-6 items-center flex"><label>
                    <input required type="checkbox" class="form-checkbox text-indigo-600 dark:text-indigo-300 rounded" name="remember">
                </label></div>
            <div class="text-sm ml-3">
                <a class="text-gray-600 dark:text-gray-300">I accept the <a href="a" class="font-medium text-gray-600 dark:text-gray-300">Terms</a>&nbsp;<span class="text-gray-600 dark:text-gray-300">and</span> <a class="font-medium text-gray-600 dark:text-gray-300" href="b">Privacy Policy</a></a> <span class="text-gray-600 dark:text-gray-300"><span class="bottom-[1.56rem] left-[8.51rem] absolute right-[23.55rem] top-0 overflow-hidden"></span></span>
            </div>
        </div>
        @endif



        <div class="flex flex-col items-end mt-4">
            <x-ui.button type="primary" rounded="md" submit="true" class="w-full">
                {{ __('Register') }}
            </x-ui.button>

            <a class="mt-4 text-sm text-gray-600 underline hover:text-gray-900 dark:hover:text-gray-400" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</x-layouts.guest>
