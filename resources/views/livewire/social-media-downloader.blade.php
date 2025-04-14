<div class="flex flex-col gap-8">
    <x-cards>
        <div class="flex flex-col gap-2">
            <flux:input
                icon="link"
                placeholder="Masukkan URL"
                wire:model="url"
            />
            <flux:button
                icon="arrow-down-tray"
                wire:click="download"
            >
                Download
            </flux:button>
        </div>
    </x-cards>

    @if ($title)
        <x-cards>
            <div class="grid gap-2 md:grid-cols-2">
                <div class="relative flex flex-col gap-2">
                    <img
                        src="{{ $thumbnail }}"
                        alt="thumbnail"
                        class="grayscale-50 aspect-video w-full rounded-xl object-cover brightness-50"
                    >
                    <flux:badge
                        size="sm"
                        icon="clock"
                        class="absolute right-2 top-2"
                    >
                        {{ $duration }}
                    </flux:badge>
                    <flux:heading class="line-clamp-1 !font-bold">
                        {{ $title }}
                    </flux:heading>
                    @php
                        $bestDownload = collect($formats)
                            ->where('has_audio', true)
                            ->where('has_video', true)
                            ->first();
                    @endphp
                    <flux:button
                        icon="arrow-down-tray"
                        href="{{ $bestDownload['url'] }}"
                        target="_blank"
                    >
                        Download
                    </flux:button>
                </div>
                <div class="flex flex-col gap-2">
                    @foreach ($formats as $format)
                        <a
                            href="{{ $format['url'] }}"
                            target="_blank"
                        >
                            <x-cards class="group">
                                <div class="flex flex-col items-start gap-2 lg:flex-row">
                                    <div class="flex flex-grow flex-col gap-2">
                                        <flux:heading class="group-hover:underline">
                                            {{ $format['resolution'] }}
                                        </flux:heading>
                                        <div
                                            class="flex flex-row flex-wrap items-center gap-2">
                                            <flux:badge size="sm">
                                                {{ $format['ext'] }}
                                            </flux:badge>
                                            @if ($format['has_audio'] == true && $format['has_video'] == false)
                                                <flux:badge size="sm">
                                                    Audio Only
                                                </flux:badge>
                                            @endif
                                            @if ($format['has_audio'] == false && $format['has_video'] == true)
                                                <flux:badge size="sm">
                                                    Video Only
                                                </flux:badge>
                                            @endif
                                            @php
                                                $fileSize =
                                                    $format['file_size'] / (1024 * 1024);
                                                $readAbleFileSize =
                                                    number_format($fileSize, 2) . ' MB';
                                            @endphp
                                            <flux:badge size="sm">
                                                {{ $readAbleFileSize }}
                                            </flux:badge>
                                        </div>
                                    </div>
                                </div>
                            </x-cards>
                        </a>
                    @endforeach
                </div>
            </div>
        </x-cards>
    @endif
</div>
