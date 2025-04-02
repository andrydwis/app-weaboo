<x-layouts>
    <x-cta />
    <dib class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        <a href="">
            <div
                class="hover:ring-accent group relative overflow-hidden rounded-lg ring-0 hover:ring-2 dark:hover:ring-white">
                <img
                    src="{{ asset('images/cta/anime.jpg') }}"
                    alt="anime"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-video brightness-50 transition-all hover:scale-110"
                >
                <flux:heading
                    size="xl"
                    class="pointer-events-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-center !font-bold text-white"
                >
                    Nonton Anime
                </flux:heading>
            </div>
        </a>
        <a href="">
            <div
                class="hover:ring-accent group relative overflow-hidden rounded-lg ring-0 hover:ring-2 dark:hover:ring-white">
                <img
                    src="{{ asset('images/cta/manga.jpg') }}"
                    alt="manga"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-video brightness-50 transition-all hover:scale-110"
                >
                <flux:heading
                    size="xl"
                    class="pointer-events-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-center !font-bold text-white"
                >
                    Baca Manga
                </flux:heading>
            </div>
        </a>
        <a href="">
            <div
                class="hover:ring-accent group relative overflow-hidden rounded-lg ring-0 hover:ring-2 dark:hover:ring-white">
                <img
                    src="{{ asset('images/cta/other.jpg') }}"
                    alt="other"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-video brightness-50 transition-all hover:scale-110"
                >
                <flux:heading
                    size="xl"
                    class="pointer-events-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-center !font-bold text-white"
                >
                    Menu Lain
                </flux:heading>
            </div>
        </a>
    </dib>
</x-layouts>
