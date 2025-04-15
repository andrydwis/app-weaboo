@props([
    'title' => null,
    'description' => null,
    'keywords' => null,
    'image' => null,
    'withFooter' => true,
])
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        />

        <!-- Favicon -->
        <link
            rel="icon"
            href="{{ asset('favicon.ico') }}"
            type="image/x-icon"
        >
        <!-- High-Resolution Icons for PWA -->
        <link
            rel="apple-touch-icon"
            href="{{ asset('apple-touch-icon.png') }}"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="192x192"
            href="{{ asset('android-chrome-192x192.png') }}"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="512x512"
            href="{{ asset('android-chrome-512x512.png') }}"
        />

        <!-- Smaller Icons for Legacy Browsers -->
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="{{ asset('favicon-16x16.png') }}"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="{{ asset('favicon-32x32.png') }}"
        />

        <!-- Manifest for PWA -->
        <link
            rel="manifest"
            href="{{ asset('manifest.json') }}"
        />

        <!-- Fonts -->
        <link
            rel="preconnect"
            href="https://fonts.bunny.net"
        >
        <link
            href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900&display=swap"
            rel="stylesheet"
        />

        <!-- Primary Meta Tags -->
        @if (!$title)
            <title>
                Weaboo.my.id - Nonton Anime dan Baca Manga Gratis, Komunitas Wibu, dan
                Berita Terbaru
                Seputar Anime
            </title>

            <meta
                name="title"
                content="Weaboo.my.id - Nonton Anime dan Baca Manga Gratis, Komunitas Wibu, dan Berita Terbaru Seputar Anime"
            />
        @else
            <title>
                Weaboo.my.id - {{ $title }}
            </title>
            <meta
                name="title"
                content="Weaboo.my.id - {{ $title }}"
            />
        @endif
        <link
            rel="canonical"
            href="{{ url()?->current() }}"
        />
        @if (!$description)
            <meta
                name="description"
                content="Weaboo.my.id, tempat nonton anime dan baca manga gratis tanpa iklan, bergabung dengan komunitas pecinta anime, dan update berita terkini. Cari anime favoritmu di sini!"
            />
        @else
            <meta
                name="description"
                content="{{ $description }}"
            />
        @endif
        @if (!$keywords)
            <meta
                name="keywords"
                content="anime, manga, nonton anime, komunitas wibu, anime gratis, anime terbaru, manga gratis, manga terbaru, manga indonesia,berita anime, weaboo, anime indonesia, streaming anime, forum wibu, anime terbaik"
            >
        @else
            <meta
                name="keywords"
                content="{{ $keywords }}"
            >
        @endif
        <meta
            name="robots"
            content="index, follow"
        />

        <!-- Open Graph / Facebook -->
        <meta
            property="og:type"
            content="website"
        />
        <meta
            property="og:url"
            content="{{ url()?->current() }}"
        />
        @if (!$title)
            <meta
                property="og:title"
                content="Weaboo.my.id - Nonton Anime dan Baca Manga Gratis, Komunitas Wibu, dan Berita Terbaru Seputar Anime"
            />
        @else
            <meta
                property="og:title"
                content="Weaboo.my.id - {{ $title }}"
            />
        @endif
        @if (!$description)
            <meta
                property="og:description"
                content="Weaboo.my.id, tempat nonton anime dan baca manga gratis tanpa iklan, bergabung dengan komunitas pecinta anime, dan update berita terkini. Cari anime favoritmu di sini!"
            />
        @else
            <meta
                property="og:description"
                content="{{ $description }}"
            />
        @endif
        @if (!$image)
            <meta
                property="og:image"
                content="{{ asset('images/seo/cover.jpg') }}"
            />
        @else
            <meta
                property="og:image"
                content="{{ $image }}"
            />
        @endif

        <!-- Twitter -->
        <meta
            property="twitter:card"
            content="summary_large_image"
        />
        <meta
            property="twitter:url"
            content="{{ url()?->current() }}"
        />
        @if (!$title)
            <meta
                property="twitter:title"
                content="Weaboo.my.id - Nonton Anime dan Baca Manga Gratis dan Tanpa Iklan"
            />
        @else
            <meta
                property="twitter:title"
                content="Weaboo.my.id - {{ $title }}"
            />
        @endif
        @if (!$description)
            <meta
                property="twitter:description"
                content="Weaboo.my.id, tempat nonton anime dan baca manga gratis tanpa iklan, bergabung dengan komunitas pecinta anime, dan update berita terkini. Cari anime favoritmu di sini!"
            />
        @else
            <meta
                property="twitter:description"
                content="{{ $description }}"
            />
        @endif
        @if (!$image)
            <meta
                property="twitter:image"
                content="{{ asset('images/seo/cover.jpg') }}"
            />
        @else
            <meta
                property="twitter:image"
                content="{{ $image }}"
            />
        @endif

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
        @fluxAppearance
        @stack('styles')
    </head>

    <body class="selection:bg-accent/50 min-h-screen bg-white dark:bg-zinc-800">
        <x-sidebars />
        <x-headers />

        <flux:main
            container
            class="relative flex h-full flex-col gap-8"
        >
            {{ $slot }}

            @if ($withFooter)
                <x-footers />
            @endif
        </flux:main>

        @livewireScripts
        @fluxScripts
        @stack('scripts')
    </body>

</html>
