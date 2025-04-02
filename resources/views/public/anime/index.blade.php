<x-layouts title="Anime">
    <div class="flex flex-col gap-4">
        <div class="flex flex-row items-center justify-between gap-2">
            <flux:heading
                size="lg"
                class="!font-bold"
            >
                Update Anime Terbaru
            </flux:heading>
            <flux:link class="!hidden sm:!flex">
                Lihat Semua
            </flux:link>
        </div>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-5">
            @foreach ($animes as $anime)
                <x-cards.anime :anime="$anime" />
            @endforeach
            <flux:link
                href="{{ route('public.animes.index') }}"
                class="col-span-2 text-center sm:hidden lg:col-span-5"
            >
                Lihat Semua
            </flux:link>
        </div>
    </div>

    <div class="flex flex-col gap-4">
        <flux:heading
            size="lg"
            class="!font-bold"
        >
            Genre
        </flux:heading>
        <div class="grid grid-cols-2 gap-2 lg:grid-cols-4">
            @foreach ($genres as $genre)
                <flux:button class="w-full">
                    {{ $genre['name'] }}
                </flux:button>
            @endforeach
        </div>
    </div>
</x-layouts>
