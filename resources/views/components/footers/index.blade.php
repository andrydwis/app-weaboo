<footer class="mt-auto">
    <x-cards>
        <div class="flex flex-col gap-2">
            <div class="flex flex-row items-center gap-2">
                <flux:button
                    icon="envelope"
                    href="mailto:admin@weaboo.my.id"
                />
                <flux:button
                    icon="coffee"
                    href="https://trakteer.id/weaboo-my-id"
                />
            </div>
            <flux:text class="lg:w-1/2">
                Weaboo.my.id tidak menyimpan file apa pun di server kami. Kami hanya
                menyediakan tautan ke media yang dihosting oleh layanan pihak ketiga.
            </flux:text>
            <div class="flex flex-row flex-wrap items-center gap-2">
                <a href="{{ route('dmca') }}">
                    <flux:badge
                        as="button"
                        size="sm"
                    >
                        DMCA
                    </flux:badge>
                </a>
                <a href="{{ route('privacy-policy') }}">
                    <flux:badge
                        as="button"
                        size="sm"
                    >
                        Kebijakan Privasi
                    </flux:badge>
                </a>
                <a href="{{ route('terms-of-service') }}">
                    <flux:badge
                        as="button"
                        size="sm"
                    >
                        Syarat dan Ketentuan
                    </flux:badge>
                </a>
            </div>
            <flux:text class="lg:w-1/2">
                © {{ now()->year }} {{ config('app.name') }}
            </flux:text>
        </div>
    </x-cards>
</footer>
