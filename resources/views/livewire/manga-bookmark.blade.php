<div>
    @if ($isAuthenticated)
        @if ($isAddedToBookmark)
            <flux:button
                variant="danger"
                icon="bookmark-slash"
                wire:click="toggleBookmark"
                class="w-full"
            >
                Hapus dari Bookmark
            </flux:button>
        @else
            <flux:button
                icon="bookmark"
                wire:click="toggleBookmark"
                class="w-full"
            >
                Tambah ke Bookmark
            </flux:button>
        @endif
    @else
        <flux:button
            icon="bookmark"
            href="{{ route('login') }}"
            class="w-full"
        >
            Tambah ke Bookmark
        </flux:button>
    @endif
</div>
