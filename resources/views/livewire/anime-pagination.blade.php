<div
    wire:init="getAnimePaginationData"
    class="flex flex-col gap-4"
>
    <div class="flex flex-row items-center justify-between gap-2">
        <flux:heading
            size="lg"
            class="!font-bold"
        >
            @if ($type === 'ongoing')
                Update Anime Terbaru
            @elseif($type === 'genre')
                Genre {{ str()->title($genre) }}
            @endif
        </flux:heading>
        @if (!empty($pagination))
            <div class="hidden flex-row items-center justify-center gap-2 lg:flex">
                <flux:button
                    :disabled="!$pagination['has_prev_page']"
                    icon="chevron-left"
                    wire:click="prevPage"
                >
                    Sebelumnya
                </flux:button>
                <flux:button
                    :disabled="!$pagination['has_next_page']"
                    icon="chevron-right"
                    wire:click="nextPage"
                >
                    Selanjutnya
                </flux:button>
            </div>
        @endif
    </div>
    <div class="grid grid-cols-2 gap-4 lg:grid-cols-5">
        @for ($i = 0; $i < 10; $i++)
            <x-cards.placeholder
                wire:loading
                wire:target="nextPage, prevPage, getAnimePaginationData"
            />
        @endfor
        @foreach ($animes as $anime)
            <x-cards.anime
                wire:loading.remove
                :anime="$anime"
            />
        @endforeach
        @if (!empty($pagination))
            <div
                class="col-span-2 flex flex-row items-center justify-center gap-2 lg:col-span-5 lg:hidden">
                <flux:button
                    :disabled="!$pagination['has_prev_page']"
                    icon="chevron-left"
                    wire:click="prevPage"
                />
                <flux:button
                    :disabled="!$pagination['has_next_page']"
                    icon="chevron-right"
                    wire:click="nextPage"
                />
            </div>
        @endif
    </div>
</div>

@script
    <script>
        $wire.on('anime-pagination-loaded', () => {
            //scroll to top
            window.scrollTo({
                top: 0,
                behavior: 'smooth',
            });
        });
    </script>
@endscript
