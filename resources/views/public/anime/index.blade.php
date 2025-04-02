<x-layouts title="Anime">
    <div class="flex flex-col gap-4">
        <flux:heading
            size="lg"
            class="!font-bold"
        >
            Genre
        </flux:heading>
        <div class="swiper w-full">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach ($genres as $genre)
                    <div class="swiper-slide">
                        <flux:button class="w-full">
                            {{ $genre['name'] }}
                        </flux:button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-4">
        <flux:heading
            size="lg"
            class="!font-bold"
        >
            Update Anime Terbaru
        </flux:heading>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-5">
            @foreach ($animes as $anime)
                <a href="">
                    <x-cards
                        class="aspect[3/4] hover:ring-accent group relative h-full overflow-hidden !p-0 ring-0 hover:ring-2 dark:hover:ring-white"
                    >
                        <img
                            src="{{ $anime['image'] }}"
                            alt="{{ $anime['title'] }}"
                            loading="lazy"
                            class="h-full w-full rounded-xl transition-all group-hover:scale-110 group-hover:brightness-50"
                        >
                        <flux:icon.play-circle
                            variant="solid"
                            class="absolute left-1/2 top-1/2 z-50 hidden size-10 -translate-x-1/2 -translate-y-1/2 text-white transition-all group-hover:block lg:size-20"
                        />
                        <flux:badge
                            variant="solid"
                            color="sky"
                            icon="play-circle"
                            class="absolute right-2 top-2 z-50"
                        >
                            Eps {{ $anime['episodes'] }}
                        </flux:badge>
                        <div
                            class="absolute bottom-0 left-0 right-0 z-50 bg-white/50 px-4 py-2 backdrop-blur dark:bg-zinc-900/50">
                            <flux:heading
                                class="dark!text-white :!text-zinc-800 line-clamp-1 !font-bold"
                            >
                                {{ $anime['title'] }}
                            </flux:heading>
                        </div>
                    </x-cards>
                </a>
            @endforeach
        </div>
    </div>

    @push('styles')
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
        />
    @endpush
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper(".swiper", {
                spaceBetween: 8,
                grabCursor: true,
                loop: true,
                slidesPerView: 3,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 4,
                    },
                    1024: {
                        slidesPerView: 8,
                    },
                },
            });
        </script>
    @endpush
</x-layouts>
