@props(['manga'])
<a
    {{ $attributes }}
    href=""
>
    <x-cards
        wire:loading.remove
        wire:target="search"
        class="group aspect-[3/4] h-full overflow-hidden !p-0"
    >
        <img
            src="{{ $manga['image'] }}"
            alt="{{ $manga['title'] }}"
            loading="lazy"
            class="h-full w-full rounded-xl object-cover transition-all group-hover:scale-110 group-hover:brightness-50"
        >
        <flux:icon.book-open
            variant="solid"
            class="absolute left-1/2 top-1/2 hidden size-10 -translate-x-1/2 -translate-y-1/2 text-white transition-all group-hover:block lg:size-20"
        />
        <div
            class="pointer-events-none absolute bottom-0 w-full bg-white/75 p-2 dark:bg-zinc-900/50">
            <flux:heading class="dark!text-white :!text-zinc-800 line-clamp-1 !font-bold">
                {{ $manga['title'] }}
            </flux:heading>
        </div>
    </x-cards>
</a>
