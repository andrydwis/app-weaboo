<x-layouts.auth title="Masuk">
    <flux:brand
        href="{{ route('public.home.index') }}"
        name="{{ config('app.name') }}"
    >
        🇯🇵
    </flux:brand>

    <flux:button
        icon="google"
        class="w-full"
        href="{{ route('socialite.redirect', ['driver' => 'google']) }}"
    >
        Masuk dengan Google
    </flux:button>

    <flux:separator text="atau" />

    <x-forms
        action="{{ route('login') }}"
        method="POST"
        class="w-full"
    >
        <div class="flex flex-col gap-4">
            <flux:input
                label="Email"
                type="email"
                name="email"
                placeholder="email@example.com"
                required
                clearable
            />
            <flux:input
                label="Password"
                type="password"
                name="password"
                placeholder="*****"
                required
                viewable
            />
            <flux:button
                variant="primary"
                type="submit"
            >
                Masuk
            </flux:button>
        </div>
    </x-forms>

    <flux:text class="text-center">
        Belum punya akun?
        <flux:link href="{{ route('register') }}">
            Daftar disini
        </flux:link>
    </flux:text>
</x-layouts.auth>
