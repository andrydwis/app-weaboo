<x-layouts title="Baca Manga Genre {{ str()->title($genre) }}">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{ route('public.home.index') }}"
            icon="home"
        />
        <flux:breadcrumbs.item href="{{ route('public.mangas.index') }}">
            <span class="line-clamp-1 whitespace-nowrap">
                Baca Manga
            </span>
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            <span class="line-clamp-1">
                Genre {{ str()->title($genre) }}
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <livewire:manga-pagination
        type="genre"
        genre="{{ $genre }}"
    />
</x-layouts>
