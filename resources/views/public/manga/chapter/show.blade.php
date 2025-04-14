<x-layouts
    title="Baca Manga {{ $chapter['title'] }}"
    description="{{ $manga['description'] }}"
    image="{{ $manga['image'] }}"
    :withFooter="false"
>
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{ route('public.home.index') }}"
            icon="home"
        />
        <flux:breadcrumbs.item href="{{ route('public.mangas.index') }}">
            <span class="line-clamp-1 whitespace-nowrap">
                Baca Manga
            </span>
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item
            href="{{ route('public.mangas.show', ['manga' => $manga['id']]) }}"
        >
            <span class="line-clamp-1">
                {{ $manga['title'] }}
            </span>
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            <span class="line-clamp-1">
                {{ $chapter['title'] }}
            </span>
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <x-cards
        class="sm:top-15 sm:!border-1 !border-t-1 !fixed bottom-0 z-10 -mx-6 w-full !rounded-none !border-0 sm:!sticky sm:!mx-0 sm:!rounded-xl dark:!bg-zinc-900"
    >
        <div class="flex w-full flex-row items-center gap-2 lg:grid lg:grid-cols-3">
            <flux:button
                :href="$prevChapter ? route('public.mangas.chapters.show', ['manga' => $manga[
                    'id'], 'chapter' => $prevChapter['id']]) : null"
                :icon="$prevChapter ? 'arrow-left' : 'no-symbol'"
                :disabled="!$prevChapter"
                class="!hidden sm:!flex"
            >
                Sebelumnya
            </flux:button>
            <flux:button
                :href="$prevChapter ? route('public.mangas.chapters.show', ['manga' => $manga[
                        'id'],
                    'chapter' => $prevChapter['id']
                ]) : null"
                :icon="$prevChapter ? 'arrow-left' : 'no-symbol'"
                :disabled="!$prevChapter"
                class="!flex sm:!hidden"
            />
            <flux:select
                onchange="window.location.href = this.value"
                class="flex-grow !w-0 lg:!w-full"
            >
                @foreach ($chapters as $chapterManga)
                    <flux:select.option
                        value="{{ $chapterManga['id'] }}"
                        :selected="$chapterManga['id'] == $chapter['id']"
                        class="text-center"
                    >
                        {{ $chapterManga['title'] }}
                    </flux:select.option>
                @endforeach
            </flux:select>
            <flux:button
                :href="$nextChapter ? route('public.mangas.chapters.show', ['manga' => $manga[
                        'id'],
                    'chapter' => $nextChapter['id']
                ]) : null"
                :icon="$nextChapter ? 'arrow-right' : 'no-symbol'"
                :disabled="!$nextChapter"
                class="!hidden sm:!flex"
            >
                Selanjutnya
            </flux:button>
            <flux:button
                :href="$nextChapter ? route('public.mangas.chapters.show', ['manga' => $manga[
                        'id'],
                    'chapter' => $nextChapter['id']
                ]) : null"
                :icon="$nextChapter ? 'arrow-right' : 'no-symbol'"
                :disabled="!$nextChapter"
                class="!flex sm:!hidden"
            />
        </div>
    </x-cards>

    <div class="-mx-6 flex flex-col sm:mx-0">
        @foreach ($chapter['pages'] as $page)
            <img
                data-src="{{ $page['image'] }}"
                alt="{{ $page['page_number'] }}"
                loading="lazy"
                class="lazy"
            >
        @endforeach
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@19.1.3/dist/lazyload.min.js">
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const lazyLoadInstance = new LazyLoad({
                    elements_selector: ".lazy"
                });
            });
        </script>
    @endpush
</x-layouts>
