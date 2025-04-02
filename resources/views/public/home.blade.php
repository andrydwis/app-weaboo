<x-layouts>
    <x-cta />
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        <a href="{{ route('public.animes.index') }}">
            <div
                class="hover:ring-accent group relative overflow-hidden rounded-xl border border-zinc-200 ring-0 hover:ring-2 dark:border-zinc-600 dark:hover:ring-white">
                <img
                    src="{{ asset('images/cta/anime.jpg') }}"
                    alt="anime"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-[4/1] object-cover brightness-50 transition-all group-hover:scale-110"
                >
                <flux:heading
                    class="pointer-events-none absolute left-1/2 top-1/2 flex -translate-x-1/2 -translate-y-1/2 flex-row items-center gap-2 text-center !font-bold text-white lg:text-2xl"
                >
                    <flux:icon.play-circle
                        variant="solid"
                        class="size-6 lg:size-8"
                    />
                    Nonton Anime
                </flux:heading>
            </div>
        </a>
        <a href="">
            <div
                class="hover:ring-accent group relative overflow-hidden rounded-xl border border-zinc-200 ring-0 hover:ring-2 dark:border-zinc-600 dark:hover:ring-white">
                <img
                    src="{{ asset('images/cta/manga.jpg') }}"
                    alt="manga"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-[4/1] object-cover brightness-50 transition-all group-hover:scale-110"
                >
                <flux:heading
                    class="pointer-events-none absolute left-1/2 top-1/2 flex -translate-x-1/2 -translate-y-1/2 flex-row items-center gap-2 text-center !font-bold text-white lg:text-2xl"
                >
                    <flux:icon.book-open
                        variant="solid"
                        class="size-6 lg:size-8"
                    />
                    Baca Manga
                </flux:heading>
            </div>
        </a>
        <a href="">
            <div
                class="hover:ring-accent group relative overflow-hidden rounded-xl border border-zinc-200 ring-0 hover:ring-2 dark:border-zinc-600 dark:hover:ring-white">
                <img
                    src="{{ asset('images/cta/ai.jpg') }}"
                    alt="other"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-[4/1] object-cover object-top brightness-50 transition-all group-hover:scale-110"
                >
                <flux:heading
                    class="pointer-events-none absolute left-1/2 top-1/2 flex -translate-x-1/2 -translate-y-1/2 flex-row items-center gap-2 text-center !font-bold text-white lg:text-2xl"
                >
                    <flux:icon.sparkles
                        variant="solid"
                        class="size-6 lg:size-8"
                    />
                    Waifu AI
                </flux:heading>
            </div>
        </a>
        <a href="">
            <div
                class="hover:ring-accent group relative overflow-hidden rounded-xl border border-zinc-200 ring-0 hover:ring-2 dark:border-zinc-600 dark:hover:ring-white">
                <img
                    src="{{ asset('images/cta/news.jpg') }}"
                    alt="other"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-[4/1] object-cover brightness-50 transition-all group-hover:scale-110"
                >
                <flux:heading
                    class="pointer-events-none absolute left-1/2 top-1/2 flex -translate-x-1/2 -translate-y-1/2 flex-row items-center gap-2 text-center !font-bold text-white lg:text-2xl"
                >
                    <flux:icon.newspaper
                        variant="solid"
                        class="size-6 lg:size-8"
                    />
                    Berita Terbaru
                </flux:heading>
            </div>
        </a>
        <a href="">
            <div
                class="hover:ring-accent group relative overflow-hidden rounded-xl border border-zinc-200 ring-0 hover:ring-2 dark:border-zinc-600 dark:hover:ring-white">
                <img
                    src="{{ asset('images/cta/wibunity.jpg') }}"
                    alt="other"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-[4/1] object-cover brightness-50 transition-all group-hover:scale-110"
                >
                <flux:heading
                    class="pointer-events-none absolute left-1/2 top-1/2 flex -translate-x-1/2 -translate-y-1/2 flex-row items-center gap-2 text-center !font-bold text-white lg:text-2xl"
                >
                    <flux:icon.users
                        variant="solid"
                        class="size-6 lg:size-8"
                    />
                    Wibunity
                </flux:heading>
            </div>
        </a>
        <a href="">
            <div
                class="hover:ring-accent group relative overflow-hidden rounded-xl border border-zinc-200 ring-0 hover:ring-2 dark:border-zinc-600 dark:hover:ring-white">
                <img
                    src="{{ asset('images/cta/other.jpg') }}"
                    alt="other"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-[4/1] object-cover brightness-50 transition-all group-hover:scale-110"
                >
                <flux:heading
                    class="pointer-events-none absolute left-1/2 top-1/2 flex -translate-x-1/2 -translate-y-1/2 flex-row items-center gap-2 text-center !font-bold text-white lg:text-2xl"
                >
                    <flux:icon.ellipsis-horizontal-circle
                        variant="solid"
                        class="size-6 lg:size-8"
                    />
                    Menu Lain
                </flux:heading>
            </div>
        </a>
    </div>
</x-layouts>
