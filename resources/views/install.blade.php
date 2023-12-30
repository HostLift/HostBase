@if(\App\Models\User::all()->count() < 1)
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HostBase Installation</title>
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.4/tailwind.min.css">--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Define animations here */
        @keyframes loading-animation {
            0% {
                opacity: 0;
                transform: translateX(-100%);
            }
            100% {
                opacity: 1;
                transform: translateX(0%);
            }
        }

        /* Apply animations to elements */
        .card {
            animation: fade-in 1s ease-in-out;
        }

        body {
            background-image: url("https://images.unsplash.com/photo-1557683311-eac922347aa1");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .loading-text span {
            display: inline-block;
            opacity: 0;
            animation: loading-animation 0.5s forwards;
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .guide-text {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
        }

        .github-link {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            font-size: 18px;
            color: #fff;
        }

        .github-logo {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            fill: #fff;
        }
    </style>
    <script>
        // Add a loading state to the button when clicked
        function handleInstallClick() {
            const installButton = document.getElementById('install-button');
            installButton.innerHTML = 'Please Wait';
            installButton.disabled = true;
        }
    </script>
</head>
<body>
<div class="flex flex-col items-center justify-center w-screen h-screen">
    <div class="card flex flex-col items-center w-full max-w-lg p-10 mx-auto mt-8 bg-white border border-gray-100 shadow-xl rounded-xl">
        <div class="guide-text"><a href="https://github.com/hostlift/hostbase/wiki">HostBase Installation Guide</a></div>
        <a href="https://github.com/hostlift/hostbase" class="github-link">
            <svg class="github-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                 stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"></path>
            </svg>
            GitHub
        </a>
        @if(Request::get('complete'))

            @php

                \Illuminate\Support\Facades\Artisan::call('storage:link');

                \Illuminate\Support\Facades\Artisan::call('hostbase:upgrade --force');

                \Illuminate\Support\Facades\Artisan::call('optimize');

                $user = \App\Models\User::create([
                    'name' => 'HostBase Admin',
                    'email' => 'admin@hostbase.tld',
                    'password' => Hash::make('password'),
                ]);

                event(new \Illuminate\Auth\Events\Registered($user));

                $url = URL::temporarySignedRoute(
                    'magic-link.login', now()->addMinutes(60), ['user' => $user->id]
                );

            @endphp

            <h1 class="text-3xl font-semibold text-green-400">Successfully Installed 🎉</h1>
            <p class="mt-5 text-gray-500">Unlock your Knowledge Base by clicking the button below!</p>
            <div class="mt-4 p-6 bg-white shadow-md rounded-lg">
                <div>
                    <span class="text-gray-700 font-bold">Username: </span>
                    <span class="text-gray-600">HostBase Admin</span>
                </div>
                <div class="mt-2">
                    <span class="text-gray-700 font-bold">Email: </span>
                    <span class="text-gray-600">admin@hostbase.tld</span>
                </div>
            </div>
            <a href="{{ $url }}"
               class="flex justify-center w-full px-4 py-2 mt-8 text-lg font-medium text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-wave active:bg-blue-700">
                Continue
            </a>
        @else
            <h1 class="text-3xl font-semibold text-black">Welcome to HostBase</h1>
            <p class="mt-5 text-gray-500">If you're ready to get started, click on the 'Install HostBase' button below.
                In the future, this installation screen will have a few setup options.</p>
            <a id="install-button" href="/install?complete=true" onclick="handleInstallClick()"
               class="flex justify-center w-full px-4 py-2 mt-8 text-lg font-medium text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-wave active:bg-indigo-700">
                Install HostBase
            </a>
        @endif
    </div>
</div>
</body>
</html>
@else

    @php

        abort(404);

    @endphp

@endif

