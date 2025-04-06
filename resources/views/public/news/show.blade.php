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
        <flux:breadcrumbs.item>
            <span class="line-clamp-1">
                {{ $news['title'] }}
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="flex flex-col gap-4">

        <div class="flex flex-col">
            <flux:text>
                {{ $news['published_at'] }}
            </flux:text>
            <flux:heading
                size="lg"
                class="!font-bold"
            >
                {{ $news['title'] }}
            </flux:heading>
        </div>
        <x-cards>
            <article class="prose dark:prose-invert prose-img:rounded-xl">
                {!! $news['description'] !!}
            </article>
        </x-cards>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@19.1.3/dist/lazyload.min.js">
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const lazyLoadInstance = new LazyLoad({
                    elements_selector: ".lazyload",
                    callback_error: (img) => {
                        img.src = 'https://cdn.animenewsnetwork.com/' + img
                            .dataset.src;
                    }
                });
            });
        </script>
    @endpush
</x-layouts>
