<div>
    @if ($isAuthenticated)
        @if ($isAddedToWatchlist)
            <flux:button
                variant="danger"
                icon="eye-slash"
                wire:click="toggleWatchlist"
                class="w-full"
            >
                Hapus dari Watchlist
            </flux:button>
        @else
            <flux:button
                icon="eye"
                wire:click="toggleWatchlist"
                class="w-full"
            >
                Tambah ke Watchlist
            </flux:button>
        @endif
    @else
        <flux:button
            icon="eye"
            href="{{ route('login') }}"
            class="w-full"
        >
            Tambah ke Watchlist
        </flux:button>
    @endif
</div>
