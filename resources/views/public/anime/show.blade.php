<x-layouts
    title="Nonton Anime {{ $anime['title'] }}"
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
        <flux:breadcrumbs.item>
            <span class="line-clamp-1">
                {{ $anime['title'] }}
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <x-cards>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <div class="flex flex-col gap-2">
                <img
                    src="{{ $anime['image'] }}"
                    alt="{{ $anime['title'] }}"
                    class="aspect-[3/4] w-full rounded-xl object-cover"
                >
                @auth
                    @if ($lastHistory)
                        <flux:button
                            variant="primary"
                            icon="play-circle"
                            href="{{ route('public.animes.episodes.show', ['anime' => $anime['id'], 'episode' => $lastHistory]) }}"
                        >
                            Lanjutkan Nonton
                        </flux:button>
                    @else
                        <flux:button
                            variant="primary"
                            icon="play-circle"
                            href="{{ route('public.animes.episodes.show', ['anime' => $anime['id'], 'episode' => end($anime['episodes'])['id']]) }}"
                        >
                            Mulai Nonton
                        </flux:button>
                    @endif
                @else
                    <flux:button
                        variant="primary"
                        icon="play-circle"
                        href="{{ route('public.animes.episodes.show', ['anime' => $anime['id'], 'episode' => end($anime['episodes'])['id']]) }}"
                    >
                        Mulai Nonton
                    </flux:button>
                @endauth
                <livewire:anime-watchlist :anime="$anime" />
            </div>
            <div class="flex flex-col gap-4 md:col-span-3">
                <div class="flex flex-col">
                    <flux:heading
                        size="lg"
                        class="!font-bold"
                    >
                        {{ $anime['title'] }}
                    </flux:heading>
                    <flux:text>
                        {{ $anime['japanese_title'] }}
                    </flux:text>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="flex flex-row flex-wrap items-center gap-2">
                        @foreach ($anime['genres'] as $genre)
                            <a
                                href="{{ route('public.animes.genres.show', ['genre' => $genre['id']]) }}">
                                <flux:badge size="sm">
                                    {{ $genre['name'] }}
                                </flux:badge>
                            </a>
                        @endforeach
                    </div>
                    <div class="flex flex-row flex-wrap items-center gap-2">
                        <flux:badge
                            size="sm"
                            color="emerald"
                            icon="tag"
                        >
                            {{ $anime['status'] }}
                        </flux:badge>
                        <flux:badge
                            size="sm"
                            color="cyan"
                            icon="calendar"
                        >
                            {{ $anime['release_date'] }}
                        </flux:badge>
                        <flux:badge
                            size="sm"
                            color="violet"
                            icon="numbered-list"
                        >
                            {{ $anime['total_episodes'] }} Episode
                        </flux:badge>
                        <flux:badge
                            size="sm"
                            color="orange"
                            icon="clock"
                        >
                            {{ $anime['duration'] }}
                        </flux:badge>
                    </div>
                    <div class="flex flex-row flex-wrap items-center gap-2">
                        <flux:badge
                            size="sm"
                            color="amber"
                            icon="star"
                        >
                            {{ $anime['score'] ?? 'N/A' }}/10
                        </flux:badge>
                        <flux:badge
                            size="sm"
                            color="blue"
                            icon="home-modern"
                        >
                            {{ $anime['studio'] }}
                        </flux:badge>
                    </div>
                </div>
                <flux:text>
                    {{ $anime['description'] }}
                </flux:text>
            </div>
        </div>
    </x-cards>

    <livewire:anime-episodes
        :anime="$anime"
        :episodes="$anime['episodes']"
        :histories="$histories"
    />

    <div class="flex flex-col gap-4">
        <flux:heading
            size="lg"
            class="!font-bold"
        >
            Rekomendasi Anime Lainnya
        </flux:heading>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-5">
            @foreach ($anime['recommendations'] as $recommendation)
                <x-cards.anime :anime="$recommendation" />
            @endforeach
        </div>
    </div>
</x-layouts>
