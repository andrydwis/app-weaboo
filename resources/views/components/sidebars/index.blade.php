<flux:sidebar
    sticky
    stashable
    class="w-full border-zinc-200 bg-zinc-50 lg:border-r dark:border-zinc-600 dark:bg-zinc-900"
>
    <flux:brand
        href="{{ route('public.home.index') }}"
        name="{{ config('app.name') }}"
        class="px-2"
    >
        🇯🇵
    </flux:brand>

    <flux:navlist class="gap-2">
        <flux:navlist.item
            icon="home"
            iconVariant="solid"
            href="{{ route('public.home.index') }}"
        >
            Beranda
        </flux:navlist.item>

        <flux:navlist.item
            icon="newspaper"
            iconVariant="solid"
            href="{{ route('public.news.index') }}"
        >
            Berita Terbaru
        </flux:navlist.item>

        <flux:separator />

        <flux:navlist.group heading="AI">
            <flux:navlist.item
                icon="sparkles"
                iconVariant="solid"
                href="{{ route('public.ai.chat.waifu.index') }}"
            >
                Waifu AI
            </flux:navlist.item>
            <flux:navlist.item
                icon="document-text"
                iconVariant="solid"
                href="{{ route('public.ai.chat.document.index') }}"
            >
                Document AI
            </flux:navlist.item>
        </flux:navlist.group>

        <flux:separator />

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
                href="{{ route('public.animes.watchlist.index') }}"
            >
                Watchlist
            </flux:navlist.item>
            <flux:navlist.item
                icon="calendar"
                iconVariant="solid"
                href="{{ route('public.animes.schedule.index') }}"
            >
                Jadwal Rilis
            </flux:navlist.item>
        </flux:navlist.group>

        <flux:navlist.group heading="Manga">
            <flux:navlist.item
                icon="book-open"
                iconVariant="solid"
                href="{{ route('public.mangas.index') }}"
            >
                Baca Manga
            </flux:navlist.item>
            <flux:navlist.item
                icon="bookmark"
                iconVariant="solid"
                href="{{ route('public.mangas.bookmark.index') }}"
            >
                Bookmark
            </flux:navlist.item>
        </flux:navlist.group>

        <flux:navlist.group heading="Menu Lain">
            <flux:navlist.item
                icon="arrow-down-tray"
                iconVariant="solid"
                href="{{ route('public.other.social-media-downloader.index') }}"
            >
                Social Media Downloader
            </flux:navlist.item>
            <flux:navlist.item
                icon="user"
                iconVariant="solid"
                href="{{ route('public.profile.edit') }}"
            >
                Profil
            </flux:navlist.item>
        </flux:navlist.group>

    </flux:navlist>

    <flux:spacer />

    <flux:separator />

    <div class="flex flex-col gap-4">
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

        <flux:sidebar.toggle
            class="w-full lg:hidden"
            icon="x-mark"
        />
    </div>
</flux:sidebar>
