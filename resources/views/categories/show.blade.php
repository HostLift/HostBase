<x-layouts.master>
    <x-slot name="title">Articles</x-slot>

    <!-- Content -->
    <div class="container mx-auto mt-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Articles</h2>

        @if($articles->count() > 0)
            @foreach($articles as $article)
                <a href="{{ route('articles.show', ['category' => $article->category->slug, 'article' => $article->slug]) }}"
                   class="
                    w-full
                    flex flex-col
                    justify-center
                    px-5
                    items-start
                    bg-white
                    dark:bg-[#18233B]
                    border-l-[3px] border-t-gray-200
                    dark:border-t-gray-800
                    border-t-[1px]
                    rounded-md
                    transform
                    dark:text-white
                    hover:scale-[1.01]
                    shadow-md
                    mb-5
                    py-4
                    sm:h-[85px]
                    border-l-indigo-600"
                >
                    <h3 class="font-medium leading-tight sm:leading-normal sm:text-xl">
                        {{ $article->title }}
                    </h3>
                    <p class="
                        text-sm
                        leading-tight
                        sm:leading-[1.2] sm:text-base
                        text-gray-800
                        dark:text-gray-200
                        mt-0.5
                    ">
                        {{ $article->description }}
                    </p>
                </a>
            @endforeach
        @else
            <p>No articles available.</p>
        @endif
    </div>
</x-layouts.master>
