<x-layouts title="Bookmark Manga">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{ route('public.home.index') }}"
            icon="home"
        />
        <flux:breadcrumbs.item href="{{ route('public.mangas.index') }}">
            <span class="line-clamp-1 whitespace-nowrap">
                Baca Manga
            </span>
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            <span class="line-clamp-1">
                Bookmark Manga
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="flex flex-col gap-4">
        <flux:heading
            size="lg"
            class="!font-bold"
        >
            Bookmark Manga
        </flux:heading>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            @forelse ($bookmarks as $bookmark)
                @php
                    $manga = $bookmark['data'];
                    $manga['main_genre'] = $bookmark['data']['genres'][0] ?? null;
                @endphp
                <x-cards.manga :manga="$manga" />
            @empty
                <div class="col-span-full">
                    <x-cards>
                        <div class="flex flex-col items-center gap-2">
                            <flux:heading class="text-center">
                                Belum Ada Manga di Bookmark
                            </flux:heading>
                            <flux:text class="text-center">
                                Tambahkan
                                <flux:link href="{{ route('public.mangas.index') }}">
                                    manga
                                </flux:link>
                                ke bookmark untuk menyimpan manga yang
                                ingin dibaca.
                            </flux:text>
                        </div>
                    </x-cards>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts>
