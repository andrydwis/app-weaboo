<livewire:search-modal />

<flux:header
    :sticky="true"
    class="!z-[15] !hidden border-b border-zinc-200 bg-white md:!flex dark:border-zinc-600 dark:bg-zinc-900"
>
    <flux:sidebar.toggle
        icon="bars-3"
        class="lg:hidden"
    />

    <flux:spacer />

    <div class="flex flex-row items-center gap-2">
        <flux:modal.trigger name="search">
            <flux:button
                icon="magnifying-glass"
                class="lg:hidden"
            />
            <flux:input
                as="button"
                placeholder="Cari anime atau manga"
                icon="magnifying-glass"
                class="hidden lg:flex"
            />
        </flux:modal.trigger>

        <flux:separator vertical />

        @auth
            <flux:dropdown
                position="top"
                align="end"
            >
                <flux:profile avatar:name="{{ auth()?->user()?->name }}" />
                <flux:menu>
                    <flux:menu.item
                        icon="user"
                        href="{{ route('public.profile.edit') }}"
                    >
                        Profil
                    </flux:menu.item>
                    <flux:menu.separator />
                    <x-forms
                        action="{{ route('logout') }}"
                        method="POST"
                    >
                        <flux:menu.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                        >
                            Keluar
                        </flux:menu.item>
                    </x-forms>
                </flux:menu>
            </flux:dropdown>
        @else
            <flux:button
                variant="primary"
                icon="arrow-right-end-on-rectangle"
                href="{{ route('login') }}"
            >
                Masuk
            </flux:button>
        @endauth
    </div>
</flux:header>

<flux:header
    class="min-md:!hidden fixed bottom-0 left-0 !z-[15] w-full border-t border-zinc-200 bg-white dark:border-zinc-600 dark:bg-zinc-900"
>
    <flux:navbar class="w-full justify-between">
        <flux:sidebar.toggle
            icon="bars-3"
            iconVariant="solid"
        />
        <flux:modal.trigger name="search">
            <flux:button
                variant="subtle"
                icon="magnifying-glass"
                iconVariant="solid"
            />
        </flux:modal.trigger>
        <flux:button
            variant="subtle"
            href="{{ route('public.animes.index') }}"
            icon="play-circle"
            iconVariant="solid"
        />
        <flux:button
            variant="subtle"
            href="{{ route('public.mangas.index') }}"
            icon="book-open"
            iconVariant="solid"
        />
        <flux:button
            variant="subtle"
            href="{{ route('public.ai.chat.index') }}"
            icon="sparkles"
            iconVariant="solid"
        />
    </flux:navbar>
</flux:header>
