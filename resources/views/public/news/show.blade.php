<x-layouts
    title="{{ $news['title'] }}"
    description="{{ str($news['description'])->limit(100) }}"
    image="{{ $news['image'] }}"
>
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{ route('public.home.index') }}"
            icon="home"
        />
        <flux:breadcrumbs.item href="{{ route('public.news.index') }}">
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
        <flux:heading
            size="lg"
            class="!font-bold"
        >
            {{ $news['title'] }}
        </flux:heading>
        <x-cards>
            <article class="prose dark:prose-invert lg:max-w-3/4">
                {!! $news['description'] !!}
            </article>
        </x-cards>
    </div>

    @push('styles')
        <style>
            .prose * {
                margin: 0;
                margin-bottom: 0.5rem;
            }
        </style>
    @endpush
</x-layouts>
