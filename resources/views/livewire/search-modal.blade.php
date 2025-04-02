<flux:modal
    name="search"
    class="md:min-h-auto h-full min-h-svh w-full !rounded-none md:h-3/4 md:!rounded-lg"
>
    <div class="flex min-h-full flex-col gap-4">
        <flux:heading>
            Cari Anime atau Manga
        </flux:heading>

        <flux:input
            icon="magnifying-glass"
            placeholder="Judul anime atau manga"
            wire:model.live.debounce.500ms="search"
        />

        <div class="flex h-0 flex-grow flex-col gap-2 overflow-auto rounded-lg">
            <div class="grid grid-cols-2 gap-2 md:grid-cols-3">
                @for ($i = 0; $i < 9; $i++)
                    <x-cards
                        wire:loading
                        wire:target="search"
                        class="aspect-[3/4] animate-pulse !bg-zinc-200 !p-2 dark:!bg-zinc-600"
                    >
                        <div class="flex flex-col gap-2">
                            <div class="w-full rounded-lg bg-white p-4 dark:bg-zinc-400">
                            </div>
                            <div class="w-3/4 rounded-lg bg-white p-4 dark:bg-zinc-400">
                            </div>
                        </div>
                    </x-cards>
                @endfor
                @if ($search && !empty($animes))
                    <div
                        wire:loading.remove
                        wire:target="search"
                        class="col-span-2 md:col-span-3"
                    >
                        <flux:heading>
                            Anime
                        </flux:heading>
                    </div>
                @endif
                @foreach ($animes as $anime)
                    <x-cards.anime
                        wire:loading.remove
                        wire:target="search"
                        :anime="$anime"
                    />
                @endforeach
                @if ($search && !empty($mangas))
                    <div
                        wire:loading.remove
                        wire:target="search"
                        class="col-span-2 md:col-span-3"
                    >
                        <flux:heading>
                            Manga
                        </flux:heading>
                    </div>
                @endif
                @foreach ($mangas as $manga)
                    <x-cards
                        wire:loading.remove
                        wire:target="search"
                        class="group aspect-[3/4] h-full overflow-hidden !p-0"
                    >
                        <img
                            src="{{ $manga['image'] }}"
                            alt="{{ $manga['title'] }}"
                            loading="lazy"
                            class="h-full w-full rounded-xl object-cover transition-all group-hover:scale-110 group-hover:brightness-50"
                        >
                        <flux:icon.book-open
                            variant="solid"
                            class="absolute left-1/2 top-1/2 hidden size-10 -translate-x-1/2 -translate-y-1/2 text-white transition-all group-hover:block lg:size-20"
                        />
                        <div
                            class="pointer-events-none absolute bottom-0 w-full bg-white/75 p-2 dark:bg-zinc-900/50">
                            <flux:heading
                                class="dark!text-white :!text-zinc-800 line-clamp-1 !font-bold"
                            >
                                {{ $manga['title'] }}
                            </flux:heading>
                        </div>
                    </x-cards>
                @endforeach

                @if ($search && empty($animes) && empty($mangas))
                    <x-cards
                        wire:loading.remove
                        wire:target="search"
                        class="col-span-2 md:col-span-3"
                    >
                        <flux:heading>
                            Anime atau Manga Tidak Ditemukan
                        </flux:heading>
                        <flux:text>
                            Oops! Anime yang kamu cari tidak ditemukan.
                            Coba cari kata kunci lain.
                        </flux:text>
                    </x-cards>
                @endif
            </div>
        </div>
    </div>
</flux:modal>
