<x-layouts title="Nonton Anime Genre {{ str()->title($genre) }}">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{ route('public.home.index') }}"
            icon="home"
        />
        <flux:breadcrumbs.item href="{{ route('public.animes.index') }}">
            <span class="line-clamp-1 whitespace-nowrap">
                Nonton Anime
            </span>
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            <span class="line-clamp-1">
                Genre {{ str()->title($genre) }}
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <livewire:anime-pagination
        type="genre"
        genre="{{ $genre }}"
    />
</x-layouts>
