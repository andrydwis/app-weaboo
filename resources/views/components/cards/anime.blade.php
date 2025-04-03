@props(['anime'])
<a
    {{ $attributes }}
    href="{{ route('public.animes.show', ['anime' => $anime['id']]) }}"
>
    <x-cards class="aspect[3/4] group relative h-full overflow-hidden !p-0">
        <img
            src="{{ $anime['image'] }}"
            alt="{{ $anime['title'] }}"
            loading="lazy"
            class="h-full w-full rounded-xl object-cover transition-all group-hover:scale-110 group-hover:brightness-50"
        >
        <flux:icon.play-circle
            variant="solid"
            class="absolute left-1/2 top-1/2 hidden size-10 -translate-x-1/2 -translate-y-1/2 text-white transition-all group-hover:block lg:size-20"
        />
        @if ($anime['episodes'])
            <flux:badge
                variant="solid"
                color="sky"
                icon="play-circle"
                class="absolute right-2 top-2"
            >
                {{ $anime['episodes'] }} Eps
            </flux:badge>
        @endif
        <div
            class="pointer-events-none absolute bottom-0 w-full bg-white/75 p-2 dark:bg-zinc-900/50">
            <flux:heading class="dark!text-white :!text-zinc-800 line-clamp-1 !font-bold">
                {{ $anime['title'] }}
            </flux:heading>
        </div>
    </x-cards>
</a>
