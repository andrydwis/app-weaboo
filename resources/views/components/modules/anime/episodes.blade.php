@props(['anime', 'episodes', 'episodeId' => null, 'histories' => []])
<div class="flex flex-col gap-4">
    <flux:heading
        size="lg"
        class="!font-bold"
    >
        Daftar Episode
    </flux:heading>
    <div class="grid max-h-[400px] grid-cols-2 gap-2 overflow-auto lg:grid-cols-5">
        @foreach ($episodes as $episode)
            @if ($episode['id'] === $episodeId)
                <flux:button
                    variant="primary"
                    icon="play-circle"
                    href="{{ route('public.animes.episodes.show', ['anime' => $anime['id'], 'episode' => $episode['id']]) }}"
                >
                    {{ $episode['title'] }}
                </flux:button>
            @else
                @if (in_array($episode['id'], $histories))
                    <flux:button
                        variant="primary"
                        icon="check-circle"
                        href="{{ route('public.animes.episodes.show', ['anime' => $anime['id'], 'episode' => $episode['id']]) }}"
                        class="opacity-50"
                    >
                        {{ $episode['title'] }}
                    </flux:button>
                @else
                    <flux:button
                        icon="play-circle"
                        href="{{ route('public.animes.episodes.show', ['anime' => $anime['id'], 'episode' => $episode['id']]) }}"
                    >
                        {{ $episode['title'] }}
                    </flux:button>
                @endif
            @endif
        @endforeach
    </div>
</div>
