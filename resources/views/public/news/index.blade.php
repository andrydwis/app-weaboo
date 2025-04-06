<x-layouts title="Berita Terbaru">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{ route('public.home.index') }}"
            icon="home"
        />
        <flux:breadcrumbs.item>
            <span class="line-clamp-1 whitespace-nowrap">
                Berita Terbaru
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="flex flex-col gap-4">
        <flux:heading>
            Berita Terbaru
        </flux:heading>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-5">
            @foreach ($news as $newsData)
                <a
                    href="{{ route('public.news.show', ['news' => str()->toBase64($newsData['id'])]) }}">
                    <x-cards class="group overflow-hidden !p-0">
                        <div class="relative aspect-video overflow-hidden">
                            <img
                                src="{{ $newsData['image'] }}"
                                alt="{{ $newsData['title'] }}"
                                class="h-full w-full object-cover transition-all group-hover:scale-110 group-hover:brightness-50"
                            >
                            <flux:icon.eye
                                variant="solid"
                                class="absolute left-1/2 top-1/2 hidden size-10 -translate-x-1/2 -translate-y-1/2 text-white transition-all group-hover:block lg:size-20"
                            />
                        </div>
                        <div class="flex flex-col p-4">
                            <flux:heading class="line-clamp-2">
                                {{ $newsData['title'] }}
                            </flux:heading>
                            <flux:text class="line-clamp-2">
                                {{ $newsData['description'] }}
                            </flux:text>
                        </div>
                    </x-cards>
                </a>
            @endforeach
        </div>
    </div>
</x-layouts>
