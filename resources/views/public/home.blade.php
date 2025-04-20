<x-layouts>
    <x-cta />
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <a href="{{ route('public.animes.index') }}">
            <x-cards class="group relative overflow-hidden !p-0">
                <img
                    src="{{ asset('images/cta/anime.webp') }}"
                    alt="anime"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-[4/1] object-cover brightness-50 transition-all group-hover:scale-110"
                >
                <flux:heading
                    size="lg"
                    class="pointer-events-none absolute left-1/2 top-1/2 flex -translate-x-1/2 -translate-y-1/2 flex-row items-center gap-2 text-center !font-bold text-white"
                >
                    <flux:icon.play-circle
                        variant="solid"
                        class="size-6"
                    />
                    Nonton Anime
                </flux:heading>
            </x-cards>
        </a>
        <a href="{{ route('public.mangas.index') }}">
            <x-cards class="group relative overflow-hidden !p-0">
                <img
                    src="{{ asset('images/cta/manga.webp') }}"
                    alt="manga"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-[4/1] object-cover brightness-50 transition-all group-hover:scale-110"
                >
                <flux:heading
                    size="lg"
                    class="pointer-events-none absolute left-1/2 top-1/2 flex -translate-x-1/2 -translate-y-1/2 flex-row items-center gap-2 text-center !font-bold text-white"
                >
                    <flux:icon.book-open
                        variant="solid"
                        class="size-6"
                    />
                    Baca Manga
                </flux:heading>
            </x-cards>
        </a>
        <a href="{{ route('public.ai.chat.waifu.index') }}">
            <x-cards class="group relative overflow-hidden !p-0">
                <img
                    src="{{ asset('images/cta/ai.webp') }}"
                    alt="other"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-[4/1] object-cover object-top brightness-50 transition-all group-hover:scale-110"
                >
                <flux:heading
                    size="lg"
                    class="pointer-events-none absolute left-1/2 top-1/2 flex -translate-x-1/2 -translate-y-1/2 flex-row items-center gap-2 text-center !font-bold text-white"
                >
                    <flux:icon.sparkles
                        variant="solid"
                        class="size-6"
                    />
                    Waifu AI
                </flux:heading>
            </x-cards>
        </a>
        <a href="{{ route('public.news.index') }}">
            <x-cards class="group relative overflow-hidden !p-0">
                <img
                    src="{{ asset('images/cta/news.webp') }}"
                    alt="other"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-[4/1] object-cover brightness-50 transition-all group-hover:scale-110"
                >
                <flux:heading
                    size="lg"
                    class="pointer-events-none absolute left-1/2 top-1/2 flex -translate-x-1/2 -translate-y-1/2 flex-row items-center gap-2 text-center !font-bold text-white"
                >
                    <flux:icon.newspaper
                        variant="solid"
                        class="size-6"
                    />
                    Berita Terbaru
                </flux:heading>
            </x-cards>
        </a>
        <a
            href="https://www.facebook.com/weaboonesia"
            target="_blank"
        >
            <x-cards class="group relative overflow-hidden !p-0">
                <img
                    src="{{ asset('images/cta/wibunity.webp') }}"
                    alt="other"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-[4/1] object-cover brightness-50 transition-all group-hover:scale-110"
                >
                <flux:heading
                    size="lg"
                    class="pointer-events-none absolute left-1/2 top-1/2 flex -translate-x-1/2 -translate-y-1/2 flex-row items-center gap-2 text-center !font-bold text-white"
                >
                    <flux:icon.users
                        variant="solid"
                        class="size-6"
                    />
                    Weaboonity
                </flux:heading>
            </x-cards>
        </a>
        <a
            href="https://buylink.id/weaboonesia"
            target="_blank"
        >
            <x-cards class="group relative overflow-hidden !p-0">
                <img
                    src="{{ asset('images/cta/support.webp') }}"
                    alt="other"
                    loading="lazy"
                    class="grayscale-50 group-hover:brightness-20 aspect-[4/1] object-cover brightness-50 transition-all group-hover:scale-110"
                >
                <flux:heading
                    size="lg"
                    class="pointer-events-none absolute left-1/2 top-1/2 flex -translate-x-1/2 -translate-y-1/2 flex-row items-center gap-2 text-center !font-bold text-white"
                >
                    <flux:icon.shopping-cart
                        variant="solid"
                        class="size-6"
                    />
                    WeabooStore
                </flux:heading>
            </x-cards>
        </a>
    </div>
</x-layouts>
