<flux:sidebar
    sticky
    stashable
    class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-600 dark:bg-zinc-900"
>
    <flux:sidebar.toggle
        class="lg:hidden"
        icon="x-mark"
    />

    <flux:brand
        href="{{ route('public.home.index') }}"
        name="{{ config('app.name') }}"
        class="px-2"
    >
        🇯🇵
    </flux:brand>

    <flux:input
        as="button"
        variant="filled"
        placeholder="Search..."
        icon="magnifying-glass"
    />

    <flux:navlist class="gap-2">
        <flux:navlist.item
            icon="home"
            iconVariant="solid"
            href="{{ route('public.home.index') }}"
        >
            Beranda
        </flux:navlist.item>
        <flux:navlist.item
            icon="play-circle"
            iconVariant="solid"
            href="{{ route('public.animes.index') }}"
        >
            Nonton Anime
        </flux:navlist.item>
    </flux:navlist>

    <flux:spacer />

    <flux:radio.group
        x-data
        variant="segmented"
        x-model="$flux.appearance"
    >
        <flux:radio
            value="light"
            icon="sun"
        />
        <flux:radio
            value="dark"
            icon="moon"
        />
        <flux:radio
            value="system"
            icon="computer-desktop"
        />
    </flux:radio.group>
</flux:sidebar>
