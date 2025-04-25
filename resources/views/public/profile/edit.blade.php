<x-layouts title="Profil">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{ route('public.home.index') }}"
            icon="home"
        />
        <flux:breadcrumbs.item>
            <span class="line-clamp-1 whitespace-nowrap">
                Profil
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    @if (session()->has('success'))
        <flux:callout
            variant="success"
            icon="check-circle"
            heading="{{ session()->get('success') }}"
        />
    @endif

    <x-cards>
        <div class="flex flex-col gap-4">
            <div class="flex flex-row items-start gap-4">
                <flux:avatar
                    size="xl"
                    name="{{ $user?->name }}"
                />

                <div class="flex flex-col gap-2">
                    <div class="flex flex-col">
                        <flux:heading
                            size="lg"
                            class="!font-bold"
                        >
                            {{ $user?->name }}
                        </flux:heading>
                        <flux:text>
                            {{ $user?->email }}
                        </flux:text>
                    </div>
                </div>
            </div>

            <flux:separator />

            <x-forms
                action="{{ route('public.profile.update') }}"
                method="PATCH"
                class="w-full"
            >
                <div class="flex flex-col gap-4">
                    <flux:input
                        label="Nama"
                        type="text"
                        name="name"
                        placeholder="Masukkan nama kamu"
                        value="{{ $user?->name }}"
                        required
                    />
                    <flux:input
                        label="Email"
                        type="email"
                        name="email"
                        placeholder="email@example.com"
                        value="{{ $user?->email }}"
                        required
                        clearable
                    />
                    <flux:input
                        label="Password Baru"
                        type="password"
                        name="password"
                        placeholder="*****"
                        autocomplete="new-password"
                        viewable
                    />
                    <flux:input
                        label="Konfirmasi Password Baru"
                        type="password"
                        name="password_confirmation"
                        placeholder="*****"
                        autocomplete="new-password"
                        viewable
                    />
                    <flux:button
                        variant="primary"
                        type="submit"
                    >
                        Simpan
                    </flux:button>
                </div>
            </x-forms>
        </div>
    </x-cards>

</x-layouts>
