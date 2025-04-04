<x-layouts title="Baca Manga {{ $manga['title'] }}">
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
                {{ $manga['title'] }}
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <x-cards>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <div class="flex flex-col gap-2">
                <img
                    src="{{ $manga['image'] }}"
                    alt="{{ $manga['title'] }}"
                    class="aspect-[3/4] w-full rounded-xl object-cover"
                >
                <flux:button
                    variant="primary"
                    icon="book-open"
                    href="{{ route('public.mangas.chapters.show', ['manga' => $manga['id'], 'chapter' => end($manga['chapters'])['id']]) }}"
                >
                    Mulai Baca
                </flux:button>
                <livewire:manga-bookmark :manga="$manga" />
            </div>
            <div class="flex flex-col gap-4 md:col-span-3">
                <div class="flex flex-col">
                    <flux:heading
                        size="lg"
                        class="!font-bold"
                    >
                        {{ $manga['title'] }}
                    </flux:heading>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="flex flex-row flex-wrap items-center gap-2">
                        @foreach ($manga['genres'] as $genre)
                            <a
                                href="{{ route('public.mangas.genres.show', ['genre' => $genre['id']]) }}">
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
                            {{ $manga['status'] }}
                        </flux:badge>
                        <flux:badge
                            size="sm"
                            color="violet"
                            icon="numbered-list"
                        >
                            {{ count($manga['chapters']) }} Chapter
                        </flux:badge>
                    </div>
                    <div class="flex flex-row flex-wrap items-center gap-2">
                        <flux:badge
                            size="sm"
                            color="amber"
                            icon="user"
                        >
                            {{ $manga['author'] }}
                        </flux:badge>
                    </div>
                </div>
                <flux:text>
                    {{ $manga['description'] }}
                </flux:text>
            </div>
        </div>
    </x-cards>

    <livewire:manga-chapters
        :manga="$manga"
        :chapters="$manga['chapters']"
        :histories="$histories"
    />

    <div class="flex flex-col gap-4">
        <flux:heading
            size="lg"
            class="!font-bold"
        >
            Rekomendasi Manga Lainnya
        </flux:heading>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-5">
            @foreach ($manga['recommendations'] as $recommendation)
                <x-cards.manga :manga="$recommendation" />
            @endforeach
        </div>
    </div>
</x-layouts>
