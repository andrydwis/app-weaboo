<x-layouts
    title="Document AI"
    :withFooter="false"
>
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{ route('public.home.index') }}"
            icon="home"
        />
        <flux:breadcrumbs.item>
            <span class="line-clamp-1 whitespace-nowrap">
                Document AI
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <livewire:document-ai />
</x-layouts>
