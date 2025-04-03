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
                    <x-cards.placeholder
                        wire:loading
                        wire:target="search"
                    />
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
                    <x-cards.manga :manga="$manga" />
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
