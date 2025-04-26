<x-layouts title="Jadwal Rilis">
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
                Jadwal Rilis
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="flex flex-col gap-4">
        <flux:heading
            size="lg"
            class="!font-bold"
        >
            Jadwal Rilis
        </flux:heading>

        <livewire:anime-schedule />

       
    </div>
</x-layouts>
