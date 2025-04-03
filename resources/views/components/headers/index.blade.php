<flux:header
    class="sticky top-0 z-[100] border-b border-zinc-200 bg-white dark:border-zinc-600 dark:bg-zinc-900/50 dark:backdrop-blur"
>
    <flux:sidebar.toggle
        icon="bars-2"
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
                placeholder="Cari anime atau manga..."
                icon="magnifying-glass"
                class="hidden lg:flex"
            />
        </flux:modal.trigger>
        <livewire:search-modal />

        <flux:separator vertical />

        @auth
            <flux:dropdown
                position="top"
                align="end"
            >
                <flux:profile avatar:name="{{ auth()?->user()?->name }}" />
                <flux:menu>
                    @role('admin')
                        <flux:menu.item
                            icon="gauge"
                            href=""
                        >
                            Dashboard
                        </flux:menu.item>
                    @endrole
                    <flux:menu.item
                        icon="user"
                        href="/profile"
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
