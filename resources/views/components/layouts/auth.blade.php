@props(['title' => null, 'description' => null, 'keywords' => null, 'image' => null])
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
                Weaboonesia - Nonton Anime dan Baca Manga Gratis, Komunitas Wibu, dan
                Berita Terbaru
                Seputar Anime
            </title>

            <meta
                name="title"
                content="Weaboonesia - Nonton Anime dan Baca Manga Gratis, Komunitas Wibu, dan Berita Terbaru Seputar Anime"
            />
        @else
            <title>
                Weaboonesia - {{ $title }}
            </title>
            <meta
                name="title"
                content="Weaboonesia - {{ $title }}"
            />
        @endif
        <link
            rel="canonical"
            href="{{ url()?->current() }}"
        />
        @if (!$description)
            <meta
                name="description"
                content="Weaboonesia, tempat nonton anime dan baca manga gratis tanpa iklan, bergabung dengan komunitas pecinta anime, dan update berita terkini. Cari anime favoritmu di sini!"
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
                content="weaboonesia, wibu, weaboo, anime, manga, nonton anime, komunitas wibu, anime gratis, anime terbaru, manga gratis, manga terbaru, manga indonesia,berita anime, weaboo, anime indonesia, streaming anime, forum wibu, anime terbaik"
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
        <meta
            name="revisit-after"
            content="1"
        >

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
                content="Weaboonesia - Nonton Anime dan Baca Manga Gratis, Komunitas Wibu, dan Berita Terbaru Seputar Anime"
            />
        @else
            <meta
                property="og:title"
                content="Weaboonesia - {{ $title }}"
            />
        @endif
        @if (!$description)
            <meta
                property="og:description"
                content="Weaboonesia, tempat nonton anime dan baca manga gratis tanpa iklan, bergabung dengan komunitas pecinta anime, dan update berita terkini. Cari anime favoritmu di sini!"
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
                content="Weaboonesia - Nonton Anime dan Baca Manga Gratis dan Tanpa Iklan"
            />
        @else
            <meta
                property="twitter:title"
                content="Weaboonesia - {{ $title }}"
            />
        @endif
        @if (!$description)
            <meta
                property="twitter:description"
                content="Weaboonesia, tempat nonton anime dan baca manga gratis tanpa iklan, bergabung dengan komunitas pecinta anime, dan update berita terkini. Cari anime favoritmu di sini!"
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

        <head>
            <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
            <link
                rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/pace-js@1.2.4/themes/white/pace-theme-minimal.css"
            >
        </head>
        @stack('styles')
    </head>

    <body class="selection:bg-accent/50 min-h-screen bg-white dark:bg-zinc-800">
        <flux:main
            container
            class="flex min-h-screen flex-col"
        >
            <div
                class="m-auto flex w-80 max-w-80 flex-col items-center justify-center gap-8">
                {{ $slot }}
            </div>
        </flux:main>

        @fluxScripts
        @stack('scripts')
    </body>

</html>
