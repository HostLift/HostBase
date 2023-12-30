<div x-data="{ dropdownOpen: false }" class="relative">
    {{ $trigger }}

    <div x-show="dropdownOpen" @click="dropdownOpen = false" x-transition:enter="ease-out duration-200" x-transition:enter-start="-translate-y-2" x-transition:enter-end="translate-y-0" class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2 "></div>

    <div x-show="dropdownOpen" x-transition:enter="ease-out duration-200" x-transition:enter-start="-translate-y-2" x-transition:enter-end="translate-y-0" class="absolute right-0 mt-2 w-48 bg-white dark:text-white/70 dark:bg-gray-900 dark:shadow-xl rounded-md overflow-hidden shadow-xl z-10">
        {{ $content }}
    </div>
</div>
