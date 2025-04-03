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
    </flux:breadcrumbs>

    <div class="flex flex-col gap-4">
        <div class="grid grid-cols-3 gap-4">
            <x-cards class="col-span-2">
                <div>
                    <img
                        src="{{ $anime['image'] }}"
                        alt="{{ $anime['title'] }}"
                        class="aspect-video w-full object-cover"
                    >
                </div>
            </x-cards>
            <x-cards class="col-span-1 grid h-[400px] grid-cols-1 gap-2 overflow-auto">
                @foreach ($anime['episodes'] as $episode)
                    <flux:button icon="play-circle">
                        Episode {{ $episode['title'] }}
                    </flux:button>
                @endforeach
            </x-cards>
        </div>
    </div>
</x-layouts>
