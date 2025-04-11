<x-layouts
    title="Nonton Anime {{ $episode['title'] }}"
    description="{{ $anime['description'] }}"
    image="{{ $anime['image'] }}"
>
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
        <flux:breadcrumbs.item
            href="{{ route('public.animes.show', ['anime' => $anime['id']]) }}"
        >
            <span class="line-clamp-1">
                {{ $anime['title'] }}
            </span>
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            <span class="line-clamp-1">
                {{ $episode['title'] }}
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <livewire:anime-watch-episode
        :anime="$anime"
        :episode="$episode"
    />

    <livewire:anime-episodes
        :anime="$anime"
        :episodes="$anime['episodes']"
        :episodeId="$episode['episode_id']"
        :histories="$histories"
    />

    <div class="flex flex-col gap-4">
        <flux:heading
            size="lg"
            class="!font-bold"
        >
            Rekomendasi Anime Lainnya
        </flux:heading>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            @foreach ($anime['recommendations'] as $recommendation)
                <x-cards.anime :anime="$recommendation" />
            @endforeach
        </div>
    </div>
</x-layouts>
