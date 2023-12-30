<header
    x-data="{ open: false }"
    class="bg-white border-b border-gray-200/80 dark:bg-gray-900/40 dark:border-gray-200/[15%]"
>
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <a
                href="{{ route('dashboard') }}"
                class="flex items-center shrink-0"
            >
                <p class="text-gray-900 dark:text-gray-100">
                    {{ config('app.name') }}
                </p>
            </a>

            <!-- Navigation -->
            <div
                :class="{ 'absolute left-0' : open, 'relative' : !open }"
                class="flex flex-col justify-start w-full sm:relative sm:flex-row sm:justify-between"
                x-cloak
            >
                @php $navLinks = ['Dashboard' => '/dashboard']; @endphp

                    <!-- Navigation Links (Desktop) -->
                <nav
                    :class="{'flex flex-col bg-white dark:bg-gray-900 relative z-50 w-full h-auto px-4 py-5 left-0 mt-16': open, 'hidden': ! open}"
                    class="items-center space-y-3 sm:space-x-3 sm:space-y-0 sm:mt-0 sm:bg-transparent sm:p-0 sm:relative sm:flex sm:-my-px sm:ml-8"
                    x-cloak
                >
                    @foreach($navLinks as $title => $route)
                        <x-ui.nav-link href="{{ $route }}"
                        >{{ $title }}</x-ui.nav-link
                        >
                    @endforeach
                </nav>

                <div class="flex items-center">
                    <div
                        class="hidden w-[38px] h-[38px] overflow-hidden rounded-full sm:block"
                        x-cloak
                    >
                        <x-ui.light-dark-switch></x-ui.light-dark-switch>
                    </div>

                    <!-- User Dropdown (Desktop) -->
                    <div class="hidden sm:block">
                        <x-ui.dropdown>
                            <!-- Dropdown Trigger -->
                            <x-slot name="trigger">
                                <button
                                    @click="dropdownOpen = ! dropdownOpen"
                                    class="inline-flex items-center justify-between w-full sm:px-3.5 sm:py-2 py-2.5 px-4 text-sm font-medium text-gray-500 transition duration-0 bg-white border-transparent sm:border hover:bg-slate-200/50 dark:bg-transparent dark:hover:bg-gray-800/70 rounded-md p-1.5"
                                >
                                    @if(config('magickit.profile_photos'))
                                        <img
                                            alt="{{ Auth::user()->name }}'s Avatar"
                                            src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim( Auth::user()->email ) ) ) }}?d=mp&r=g"
                                            class="h-8 w-8 bg-gray-50 dark:bg-transparent align-middle rounded-full overflow-clip"
                                        /><span class="items-center flex" />
                                    @endif
                                    <span
                                        class="text-gray-900 text-sm font-semibold ml-4 dark:text-white/70 hover:text-gray-700 dark:hover:text-gray-300"
                                    >{{ Auth::user()->name }}</span
                                    ><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewbox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true"
                                        class="h-5 w-5 text-gray-400 ml-2"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd"
                                            fill="currentColor"
                                        ></path>
                                    </svg>
                                </button>
                            </x-slot>

                            <!-- Dropdown Content -->
                            <x-slot name="content">
                                <div
                                    class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 dark:border-gray-200/10 text-neutral-700 dark:text-white/70 dark:bg-gray-900 dark:shadow-xl"
                                >
                                    <div
                                        class="text-slate-950 text-sm py-1.5 px-2 bg-white dark:text-white/70 dark:bg-gray-900 dark:shadow-xl"
                                    >
                                        <div class="flex flex-col">
                                            <p class="font-medium">
                                                {{ Auth::user()->name }}
                                            </p>
                                            <p
                                                class="text-slate-500 text-xs mt-1"
                                            >
                                                {{ Auth::user()->email }}
                                            </p>
                                        </div>
                                    </div>
                                    <div
                                        class="h-px my-1 -mx-1 bg-neutral-200 dark:bg-gray-200/10"
                                    ></div>
                                    <a
                                        href="{{  route('settings.edit') }}"
                                        class="relative flex cursor-default select-none hover:bg-neutral-100 dark:hover:bg-gray-800 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="w-4 h-4 mr-2"
                                        >
                                            <path
                                                d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"
                                            ></path>
                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="3"
                                            ></circle>
                                        </svg>
                                        <span>Settings</span>
                                    </a>
                                    <form
                                        method="POST"
                                        action="{{ route('logout') }}"
                                    >
                                        @csrf
                                        <div
                                            class="h-px my-1 -mx-1 bg-neutral-200 dark:bg-gray-200/10"
                                        ></div>
                                        <a
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="relative flex cursor-default select-none hover:bg-neutral-100 dark:hover:bg-gray-800 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="w-4 h-4 mr-2"
                                            >
                                                <path
                                                    d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"
                                                ></path>
                                                <polyline
                                                    points="16 17 21 12 16 7"
                                                ></polyline>
                                                <line
                                                    x1="21"
                                                    x2="9"
                                                    y1="12"
                                                    y2="12"
                                                ></line>
                                            </svg>
                                            <span>Log out</span>
                                        </a>
                                    </form>
                                </div>
                            </x-slot>
                        </x-ui.dropdown>
                    </div>

                    <!-- Mobile Switch and Hamburger -->
                    <div
                        :class="{ 'right-4' : open, 'right-0' : !open }"
                        class="absolute top-0 flex items-center mt-3 space-x-2 sm:right-0 sm:hidden"
                    >
                        <div
                            class="block w-10 h-10 overflow-hidden rounded-md"
                            x-cloak
                        >
                            <x-ui.light-dark-switch></x-ui.light-dark-switch>
                        </div>
                        <button
                            @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400"
                        >
                            <svg
                                class="w-6 h-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    :class="{'hidden': open, 'inline-flex': ! open }"
                                    class="inline-flex"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{'hidden': ! open, 'inline-flex': open }"
                                    class="hidden"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>

                        <!-- User Dropdown (Mobile) -->
                        <x-ui.dropdown>
                            <!-- Dropdown Trigger -->
                            <x-slot name="trigger">
                                <button
                                    @click="dropdownOpen = ! dropdownOpen"
                                    class="relative overflow-hidden items-center cursor-pointer flex text-center bg-white hover:bg-slate-200/50 dark:bg-transparent dark:hover:bg-gray-800/70 rounded-md p-1.5"
                                >
                                    @if(config('magickit.profile_photos'))
                                        <img
                                            alt="{{ Auth::user()->name }}'s Avatar"
                                            src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim( Auth::user()->email ) ) ) }}?d=mp&r=g"
                                            class="h-8 w-8 bg-gray-50 dark:bg-transparent align-middle rounded-full overflow-clip"
                                        /><span class="items-center flex" />
                                    @endif
                                    <span
                                        class="text-gray-900 text-sm font-semibold ml-4 dark:text-white/70 hover:text-gray-700 dark:hover:text-gray-300"
                                    >{{ Auth::user()->name }}</span
                                    ><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewbox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true"
                                        class="h-5 w-5 text-gray-400 ml-2"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd"
                                            fill="currentColor"
                                        ></path>
                                    </svg>
                                </button>
                            </x-slot>

                            <!-- Dropdown Content -->
                            <x-slot name="content">
                                <div
                                    class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 dark:border-gray-200/10 text-neutral-700 dark:text-white/70 dark:bg-gray-900 dark:shadow-xl"
                                >
                                    <div
                                        class="text-slate-950 text-sm py-1.5 px-2 bg-white dark:text-white/70 dark:bg-gray-900 dark:shadow-xl"
                                    >
                                        <div class="flex flex-col">
                                            <p class="font-medium">
                                                {{ Auth::user()->name }}
                                            </p>
                                            <p
                                                class="text-slate-500 text-xs mt-1"
                                            >
                                                {{ Auth::user()->email }}
                                            </p>
                                        </div>
                                    </div>
                                    <div
                                        class="h-px my-1 -mx-1 bg-neutral-200 dark:bg-gray-200/10"
                                    ></div>
                                    <a
                                        href="{{  route('settings.edit') }}"
                                        class="relative flex cursor-default select-none hover:bg-neutral-100 dark:hover:bg-gray-800 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="w-4 h-4 mr-2"
                                        >
                                            <path
                                                d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"
                                            ></path>
                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="3"
                                            ></circle>
                                        </svg>
                                        <span>Settings</span>
                                    </a>
                                    <form
                                        method="POST"
                                        action="{{ route('logout') }}"
                                    >
                                        @csrf
                                        <div
                                            class="h-px my-1 -mx-1 bg-neutral-200 dark:bg-gray-200/10"
                                        ></div>
                                        <a
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="relative flex cursor-default select-none hover:bg-neutral-100 dark:hover:bg-gray-800 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="w-4 h-4 mr-2"
                                            >
                                                <path
                                                    d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"
                                                ></path>
                                                <polyline
                                                    points="16 17 21 12 16 7"
                                                ></polyline>
                                                <line
                                                    x1="21"
                                                    x2="9"
                                                    y1="12"
                                                    y2="12"
                                                ></line>
                                            </svg>
                                            <span>Log out</span>
                                        </a>
                                    </form>
                                </div>
                            </x-slot>
                        </x-ui.dropdown>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
