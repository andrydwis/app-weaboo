<x-layouts
    title="Social Media Downloader"
    :withFooter="false"
>
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{ route('public.home.index') }}"
            icon="home"
        />
        <flux:breadcrumbs.item>
            <span class="line-clamp-1 whitespace-nowrap">
                Social Media Downloader
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <livewire:social-media-downloader />
</x-layouts>
