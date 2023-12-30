<div class="relative">
    <label for="action-search" class="sr-only">Search</label>
    <input
        wire:model.debounce.300ms="searchQuery"
        wire:change="search"
        id="action-search"
        name="query"
        class="form-input shadow-sm ring-1 ring-transparent ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 pl-9 py-3 dark:bg-gray-800 dark:border-gray-800 dark:hover:border-gray-900 focus:border-gray-300 dark:focus:border-gray-900 dark:text-white w-full"
        type="search"
        placeholder="Search..."
    />
    <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
        <svg
            class="w-4 h-4 shrink-0 fill-current text-gray-400 dark:text-gray-500 group-hover:text-gray-500 dark:group-hover:text-gray-400 ml-3 mr-2"
            viewBox="0 0 16 16"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"
            ></path>
            <path
                d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"
            ></path>
        </svg>
    </button>

    <div wire:poll.5s wire:poll="search">
        @if ($searchQuery && $articles->count() > 0)
            <div
                class="absolute z-50 mt-2 bg-white border border-gray-300 rounded-md shadow-md w-full max-h-10 overflow-y-auto">
                <ul>
                    @foreach ($articles as $article)
                        <li class="px-4 py-2 hover:bg-gray-100">
                            <a href="{{ route('articles.show', ['category' => $article->category->slug, 'article' => $article->slug]) }}">
                                {{ $article->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
