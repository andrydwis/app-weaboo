<div class="flex flex-col gap-4">
    <div class="flex items-center justify-between gap-2">
        <flux:heading
            size="lg"
            class="!font-bold"
        >
            Daftar Chapter
        </flux:heading>
        <flux:button
            icon="arrows-up-down"
            wire:click="reverseSort"
        />
    </div>
    <div
        class="grid max-h-[200px] grid-cols-1 gap-2 overflow-auto lg:max-h-[400px] lg:grid-cols-2">
        @foreach ($chapters as $chapter)
            @if ($chapter['id'] === $chapterId)
                <flux:button
                    variant="primary"
                    icon="book-open"
                    href="{{ route('public.mangas.chapters.show', ['manga' => $manga['id'], 'chapter' => $chapter['id']]) }}"
                >
                    {{ $chapter['title'] }}
                </flux:button>
            @else
                @if (in_array($chapter['id'], $histories))
                    <flux:button
                        variant="primary"
                        icon="check-circle"
                        href="{{ route('public.mangas.chapters.show', ['manga' => $manga['id'], 'chapter' => $chapter['id']]) }}"
                        class="opacity-50"
                    >
                        {{ $chapter['title'] }}
                    </flux:button>
                @else
                    <flux:button
                        icon="book-open"
                        href="{{ route('public.mangas.chapters.show', ['manga' => $manga['id'], 'chapter' => $chapter['id']]) }}"
                    >
                        {{ $chapter['title'] }}
                    </flux:button>
                @endif
            @endif
        @endforeach
    </div>
</div>
