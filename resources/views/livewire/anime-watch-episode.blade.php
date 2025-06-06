<div class="flex flex-col gap-2">
    <div class="relative aspect-video overflow-hidden rounded-xl">
        <iframe
            wire:loading.remove
            wire:target="fetchStreamUrl"
            allowfullscreen
            src="{{ $streamUrl }}"
            class="h-full w-full"
        ></iframe>
        <div
            wire:loading.flex
            wire:target="fetchStreamUrl"
            class="bg-accent/50 absolute inset-0 flex items-center justify-center"
        >
            <flux:icon.loading class="size-10 lg:size-20" />
        </div>
    </div>
    <div
        class="grid grid-cols-2 gap-2 lg:flex lg:flex-row lg:items-center lg:justify-between">
        <flux:button
            :href="$prevEpisode ? route('public.animes.episodes.show', ['anime' => $anime['id'],
                'episode' => $prevEpisode
            ]) : null"
            :icon="$prevEpisode ? 'arrow-left' : 'no-symbol'"
            :disabled="!$prevEpisode"
        >
            Sebelumnya
        </flux:button>
        <flux:button
            :href="$nextEpisode ? route('public.animes.episodes.show', ['anime' => $anime['id'],
                'episode' => $nextEpisode
            ]) : null"
            :icon="$nextEpisode ? 'arrow-right' : 'no-symbol'"
            :disabled="!$nextEpisode"
        >
            Selanjutnya
        </flux:button>
    </div>
    <flux:separator />
    <div class="flex flex-col gap-2 lg:flex-row lg:items-center lg:justify-between">
        <livewire:anime-watchlist :anime="$anime" />

        <div class="flex flex-col gap-2 lg:flex-row lg:items-center">
            <flux:dropdown
                position="bottom"
                align="end"
            >
                <flux:button
                    icon="server-stack"
                    class="w-full"
                >
                    Ganti Server
                </flux:button>

                <flux:menu>
                    @foreach ($episode['servers'] as $quality => $servers)
                        <flux:menu.group heading="{{ $quality }}">
                            @forelse ($servers as $server)
                                <flux:menu.item
                                    wire:click="fetchStreamUrl('{{ $quality }}', '{{ $server['name'] }}', '{{ $server['id'] }}')"
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

            <flux:dropdown
                position="bottom"
                align="end"
            >
                <flux:button
                    icon="arrow-down-tray"
                    class="w-full"
                >
                    Download
                </flux:button>

                <flux:menu>
                    @foreach ($episode['downloads'] as $quality => $servers)
                        <flux:menu.group heading="{{ $quality }}">
                            @forelse ($servers as $server)
                                <flux:menu.item
                                    target="_blank"
                                    href="{{ $server['url'] }}"
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
    </div>
</div>
