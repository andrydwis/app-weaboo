<x-layouts title="Waifu AI" :withFooter="false">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{ route('public.home.index') }}"
            icon="home"
        />
        <flux:breadcrumbs.item>
            <span class="line-clamp-1 whitespace-nowrap">
                Waifu AI
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <livewire:waifu-ai />
</x-layouts>
