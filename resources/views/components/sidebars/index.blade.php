<flux:sidebar
    sticky
    stashable
    class="w-full border-zinc-200 bg-zinc-50 lg:border-r dark:border-zinc-600 dark:bg-zinc-900"
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

    <flux:modal.trigger name="search">
        <flux:input
            as="button"
            placeholder="Cari..."
            icon="magnifying-glass"
        />
    </flux:modal.trigger>

    <flux:navlist>
        <flux:navlist.item
            icon="home"
            iconVariant="solid"
            href="{{ route('public.home.index') }}"
        >
            Beranda
        </flux:navlist.item>
        <flux:navlist.group heading="Anime">
            <flux:navlist.item
                icon="play-circle"
                iconVariant="solid"
                href="{{ route('public.animes.index') }}"
            >
                Nonton Anime
            </flux:navlist.item>
            <flux:navlist.item
                icon="eye"
                iconVariant="solid"
                href="#"
            >
                Watchlist
            </flux:navlist.item>
            <flux:navlist.item
                icon="clock"
                iconVariant="solid"
                href="#"
            >
                Riwayat
            </flux:navlist.item>
        </flux:navlist.group>
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
