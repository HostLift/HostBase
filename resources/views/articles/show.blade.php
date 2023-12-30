<x-layouts.master>
    <x-slot name="title">{{ $article->title }}</x-slot>

    <!-- Breadcrumbs -->
    <div class="container mx-auto pt-4">
        <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-4">
        <span class="flex items-center">
            <a href="{{ route('categories.show', ['category' => $article->category->slug]) }}"
               class="hover:underline">{{ $article->category->name }}</a>
        </span>
            <span class="flex items-center">
            <svg class="h-4 w-4 mx-2" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                    clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>
            <span class="font-medium dark:text-gray-400">{{ $article->title }}</span>
        </span>
        </nav>
    </div>

    <div class="container mx-auto pt-2 pb-2">
        <x-border/>
    </div>

    <!-- Content -->
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100 pt-4">{{ $article->title }}
{{--            <button onclick="window.print()"--}}
{{--                class="pt-1 flex items-center justify-center text-xs text-gray-300 hover:text-gray-400 dark:opacity-10 sm:text-sm">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"--}}
{{--                     stroke-width="2" class="w-3 h-3 mr-1">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                          d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>--}}
{{--                </svg>--}}
{{--                Print--}}
{{--            </button>--}}
        </h2>

        <div class="text-gray-800 dark:text-gray-200 mb-4">
            {!! tiptap_converter()->asHTML($article->content) !!}
        </div>
    </div>
</x-layouts.master>
