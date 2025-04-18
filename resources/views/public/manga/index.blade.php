<x-layouts title="Baca Manga">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{ route('public.home.index') }}"
            icon="home"
        />
        <flux:breadcrumbs.item>
            <span class="line-clamp-1 whitespace-nowrap">
                Baca Manga
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <livewire:manga-pagination type="recent-update" />

    <livewire:manga-pagination type="popular" />

    <div class="flex flex-col gap-4">
        <flux:heading
            size="lg"
            class="!font-bold"
        >
            Genre
        </flux:heading>
        <div class="grid grid-cols-2 gap-2 lg:grid-cols-4">
            @foreach ($genres as $genre)
                <flux:button
                    href="{{ route('public.mangas.genres.show', ['genre' => $genre['id']]) }}"
                    class="w-full"
                >
                    {{ $genre['name'] }}
                </flux:button>
            @endforeach
        </div>
    </div>
</x-layouts>
