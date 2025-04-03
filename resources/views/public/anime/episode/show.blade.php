<x-layouts title="Nonton Anime {{ $anime['title'] }}">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{ route('public.home.index') }}"
            icon="home"
        />
        <flux:breadcrumbs.item href="{{ route('public.animes.index') }}">
            Nonton Anime
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item
            href="{{ route('public.animes.show', ['anime' => $anime['id']]) }}"
        >
            {{ $anime['title'] }}
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            {{ $episode['title'] }}
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="flex flex-col gap-2">
        <iframe
            allowfullscreen
            src="{{ $episode['default_stream_url'] }}"
            class="aspect-video w-full rounded-xl object-cover"
        ></iframe>
        <flux:dropdown
            position="bottom"
            align="end"
        >
            <flux:button icon="server-stack">
                Ganti Server
            </flux:button>

            <flux:menu>
                @foreach ($episode['servers'] as $quality => $servers)
                    <flux:menu.group heading="{{ $quality }}">
                        @forelse ($servers as $server)
                            <flux:menu.item
                                href="{{ route('public.animes.episodes.show', ['anime' => $anime['id'], 'episode' => $episode['episode_id'], 'server' => $server['id']]) }}"
                            >
                                {{ $server['name'] }}
                            </flux:menu.item>
                        @empty
                            <flux:menu.item disabled>
                                Tidak tersedia
                            </flux:menu.item>
                        @endforelse
                    </flux:menu.group>
                @endforeach
            </flux:menu>
        </flux:dropdown>
    </div>

    <x-modules.anime.episodes
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
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-5">
            @foreach ($anime['recommendations'] as $recommendation)
                <x-cards.anime :anime="$recommendation" />
            @endforeach
        </div>
    </div>
</x-layouts>
