<div class="relative -mx-6 md:mx-0">
    <div
        class="grayscale-50 flex min-h-[50vh] w-full brightness-50 md:min-h-[75vh]"
        style="background: url('{{ asset('images/cta/home.webp') }}') no-repeat center center; background-size: cover;"
    >
    </div>
    <div
        class="absolute inset-0 bg-gradient-to-b from-white via-transparent to-white dark:from-zinc-800 dark:to-zinc-800">

    </div>
    <div
        class="absolute inset-0 hidden bg-gradient-to-l from-white via-transparent to-white lg:block dark:from-zinc-800 dark:to-zinc-800">

    </div>
    <div
        class="absolute left-1/2 top-1/2 flex w-full -translate-x-1/2 -translate-y-1/2 flex-col items-center justify-center gap-4 px-6 md:w-1/2 lg:px-8">
        <flux:heading
            level="1"
            size="xl"
            class="z-50 text-center text-2xl !font-bold !text-white lg:text-4xl"
        >
            Nonton Anime dan Baca Manga <span class="underline">Tanpa Iklan</span>
            Cuma di Weaboonesia
        </flux:heading>
        <flux:modal.trigger name="search">
            <flux:input
                as="button"
                placeholder="Cari anime atau manga"
                icon="magnifying-glass"
                class="backdrop-blur"
            />
        </flux:modal.trigger>
    </div>
</div>
