<x-layouts title="Nonton Anime Genre {{ str()->title($genre) }}">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{ route('public.home.index') }}"
            icon="home"
        />
        <flux:breadcrumbs.item href="{{ route('public.animes.index') }}">
            Nonton Anime
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            Genre {{ str()->title($genre) }}
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <livewire:anime-pagination
        type="genre"
        genre="{{ $genre }}"
    />
</x-layouts>
