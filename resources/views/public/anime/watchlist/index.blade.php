<x-layouts title="Watchlist Anime">
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
                Watchlist
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="flex flex-col gap-4">
        <flux:heading
            size="lg"
            class="!font-bold"
        >
            Watchlist Anime
        </flux:heading>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-5">
            @forelse ($watchlist as $list)
                @php
                    $anime = $list['data'];
                    $anime['episodes'] = $list['data']['total_episodes'];
                @endphp
                <x-cards.anime :anime="$anime" />
            @empty
                <div class="col-span-full">
                    <x-cards>
                        <div class="flex flex-col items-center gap-2">
                            <flux:heading class="text-center">
                                Belum Ada Anime di Watchlist
                            </flux:heading>
                            <flux:text class="text-center">
                                Tambahkan
                                <flux:link href="{{ route('public.animes.index') }}">
                                    anime
                                </flux:link>
                                ke watchlist untuk menyimpan anime yang
                                ingin ditonton.
                            </flux:text>
                        </div>
                    </x-cards>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts>
