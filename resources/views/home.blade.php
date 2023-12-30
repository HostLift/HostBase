<x-layouts.master>
    <body class="antialiased">
    {{-- content --}}
    <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden bg-white dark:bg-gray-900">
        <main class="grow">
            <!-- Search area -->
            <div
                class="relative flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8 py-8 lg:py-16 bg-indigo-500 dark:bg-transparent dark:bg-gradient-to-b dark:from-indigo-500/70 dark:to-indigo-500/30 overflow-hidden">
                <!-- Glow -->
                <div class="absolute pointer-events-none" aria-hidden="true">
                    <div class="w-64 h-64 rounded-full bg-white bg-opacity-30 dark:bg-opacity-10 blur-3xl"></div>
                </div>
                <!-- Illustration -->
                <div class="absolute pointer-events-none" aria-hidden="true">
                    <svg width="1280" height="361" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="ill2-b">
                                <stop stop-color="#A5B4FC" offset="0%"></stop>
                                <stop stop-color="#818CF8" offset="100%"></stop>
                            </linearGradient>
                            <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="ill2-c">
                                <stop stop-color="#4338CA" offset="0%"></stop>
                                <stop stop-color="#6366F1" stop-opacity="0" offset="100%"></stop>
                            </linearGradient>
                            <path id="ill2-a" d="m64 0 64 128-64-20-64 20z"></path>
                            <path id="ill2-e" d="m40 0 40 80-40-12.5L0 80z"></path>
                        </defs>
                        <g fill="none" fill-rule="evenodd">
                            <g transform="rotate(51 -92.764 293.763)">
                                <mask id="ill2-d" fill="#fff">
                                    <use xlink:href="#ill2-a"></use>
                                </mask>
                                <use fill="url(#ill2-b)" xlink:href="#ill2-a"></use>
                                <path fill="url(#ill2-c)" mask="url(#ill2-d)" d="M64-24h80v152H64z"></path>
                            </g>
                            <g transform="rotate(-51 618.151 -940.113)">
                                <mask id="ill2-f" fill="#fff">
                                    <use xlink:href="#ill2-e"></use>
                                </mask>
                                <use fill="url(#ill2-b)" xlink:href="#ill2-e"></use>
                                <path fill="url(#ill2-c)" mask="url(#ill2-f)" d="M40.333-15.147h50v95h-50z"></path>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="relative w-full max-w-2xl mx-auto text-center">
                    <div class="mb-5">
                        <h1 class="text-2xl md:text-3xl text-white font-bold">👋 What Can We Help You Find?</h1>
                    </div>
                    <div class="relative">
                        <livewire:search-dropdown />
                    </div>
                </div>
            </div>

            <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

                <!-- Sections -->
                <div class="space-y-8">
                    <!-- Sections -->
                    <div class="space-y-8">
                        <!-- Popular Topics -->
                        <div>
                            <!-- Grid -->
                            @if ($popularTopics->isNotEmpty())
                                <div
                                    class="grid sm:grid-cols-2 lg:grid-cols-4 lg:sidebar-expanded:grid-cols-2 xl:sidebar-expanded:grid-cols-4 gap-6">
                                    @foreach ($popularTopics as $topic)
                                        <div class="bg-gray-100 dark:bg-gray-800 rounded-sm text-center p-5 hover:scale-[1.02] transition">
                                            <!-- Icon -->
                                            <div
                                                class="inline-flex w-12 h-12 rounded-full bg-indigo-400 text-gray-100 dark:text-gray-100">
                                                <x-icon class="p-2" style="fill: currentColor"
                                                        name="{{ $topic->icon }}"/>
                                            </div>
                                            <!-- Content -->
                                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-1">
                                                {{ $topic->name }}
                                            </h3>
                                            <div class="text-sm dark:text-gray-400">
                                                {{ $topic->description }}
                                            </div>
                                            <!-- Link -->
                                            <div>
                                                <a href="{{ route('categories.show', ['category' => $topic->slug]) }}"
                                                   class="text-sm font-medium text-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400">
                                                    Explore →
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500 dark:text-gray-400">No popular topics available at the
                                    moment.</p>
                            @endif
                        </div>

                        <!-- Popular Guides -->
                        <div>
                            <div class="mb-5">
                                <h2 class="text-xl text-gray-800 dark:text-gray-100 font-bold">Popular Guides</h2>
                            </div>
                            <!-- Grid -->
                            @if ($popularGuides->isNotEmpty())
                                <div class="grid sm:grid-cols-2 gap-6">
                                    @foreach ($popularGuides as $guide)
                                        <div
                                            class="w-full p-3 rounded-sm text bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:scale-[1.02] transition">
                                            <div class="flex h-full">
                                                <!-- Icon -->
                                                <svg class="w-4 h-4 shrink-0 fill-indigo-500 mt-[3px] mr-3"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm1 12H7V7h2v5zM8 6c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1z"></path>
                                                </svg>
                                                <div class="flex flex-col h-full">
                                                    <!-- Content -->
                                                    <div class="grow mb-2">
                                                        <div
                                                            class="font-semibold text-gray-800 dark:text-gray-100 mb-1">
                                                            {{ $guide->title }}
                                                        </div>
                                                        <div class="text-sm dark:text-gray-400 overflow-hidden max-h-10 text-ellipsis">
                                                            {{ $guide->content }}
                                                        </div>
                                                    </div>
                                                    <!-- Link -->
                                                    <div>
                                                        <a href="{{ route('articles.show', ['category' => $guide->category->slug, 'article' => $guide->slug]) }}"
                                                           class="text-sm font-medium text-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400">
                                                            View →
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500 dark:text-gray-400">No popular guides available at the
                                    moment.</p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </main>
        {{-- /content --}}
    </div>
    </body>
</x-layouts.master>
