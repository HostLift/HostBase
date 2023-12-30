<header class="sticky top-0 bg-white dark:bg-[#182235] border-b border-slate-200 dark:border-slate-700 z-30">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 -mb-px">

            <!-- Header: Left side -->
            <div class="flex">
                <p class="text-gray-900 dark:text-gray-100 font-bold">
                    {{ config('app.name') }}
                </p>
            </div>

            <!-- Header: Right side -->
            <div class="flex items-center space-x-3">

                <!-- Dark mode toggle -->
                <div>
                    <x-ui.light-dark-switch/>
                </div>

                <!-- Divider -->
                <hr class="w-px h-6 bg-slate-200 dark:bg-slate-700 border-none"/>

                <!-- User button -->
                <div class="relative inline-flex">
                    <div class="sm:block">
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
                                        /><span class="items-center flex"/>
                                    @endif
                                    <span
                                        class="text-gray-900 text-sm font-semibold ml-4 dark:text-white/70 hover:text-gray-700 dark:hover:text-gray-300"
                                    >{{ Auth::user()->name }}</span
                                    >
                                    <svg
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
                                        href="{{ config('app.url') . '/admin/profile' }}"
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
