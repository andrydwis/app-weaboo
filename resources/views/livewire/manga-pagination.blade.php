<div
    wire:init="getMangaPaginationData"
    class="flex flex-col gap-4"
>
    <div class="flex flex-row items-center justify-between gap-2">
        <flux:heading
            size="lg"
            class="!font-bold"
        >
            @if ($type === 'popular')
                Manga Terpopuler
            @elseif($type === 'recent-update')
                Update Manga Terbaru
            @elseif($type === 'genre')
                Genre {{ str()->title($genre) }}
            @endif
        </flux:heading>
        <div class="hidden flex-row items-center justify-center gap-2 lg:flex">
            <flux:button
                :disabled="$page === 1"
                :icon="$page === 1 ? 'no-symbol' : 'chevron-left'"
                wire:click="prevPage"
            >
                Sebelumnya
            </flux:button>
            <flux:button
                :disabled="$page >= 10"
                :iconTrailing="$page >= 10 ? 'no-symbol' : 'chevron-right'"
                wire:click="nextPage"
            >
                Selanjutnya
            </flux:button>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-4 lg:grid-cols-5">
        @for ($i = 0; $i < 10; $i++)
            <x-cards.placeholder
                wire:loading
                wire:target="nextPage, prevPage, getMangaPaginationData"
            />
        @endfor
        @foreach ($mangas as $manga)
            <x-cards.manga
                wire:loading.remove
                :manga="$manga"
            />
        @endforeach
        <div class="col-span-2 grid grid-cols-2 gap-2 lg:col-span-5 lg:hidden">
            <flux:button
                :disabled="$page === 1"
                :icon="$page === 1 ? 'no-symbol' : 'chevron-left'"
                wire:click="prevPage"
            >
                Sebelumnya
            </flux:button>
            <flux:button
                :disabled="$page >= 10"
                :iconTrailing="$page >= 10 ? 'no-symbol' : 'chevron-right'"
                wire:click="nextPage"
            >
                Selanjutnya
            </flux:button>
        </div>
    </div>
</div>
