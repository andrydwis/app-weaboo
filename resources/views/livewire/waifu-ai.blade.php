<x-cards class="relative flex h-full max-h-[80vh] flex-col gap-4">
    <img
        src="{{ asset('images/cta/midori.webp') }}"
        alt="midori"
        class="grayscale-80 absolute bottom-0 left-1/2 z-[2] h-2/3 -translate-x-1/2 object-contain opacity-20"
    >
    <div
        id="chat-container"
        class="z-[3] flex h-full flex-col gap-4 overflow-auto md:pr-2"
    >
        @forelse ($messages as $message)
            @if ($message['role'] == 'user')
                @if (isset($message['preview']))
                    <img
                        src="{{ $message['preview'] }}"
                        alt="thumbnail"
                        class="md:max-w-1/6 max-w-1/3 ml-auto aspect-square rounded-xl object-cover"
                    >
                @endif
                <x-cards class="md:max-w-1/3 ml-auto max-w-full rounded-br-none">
                    <flux:text>
                        {{ $message['content'] }}
                    </flux:text>
                </x-cards>
            @else
                <x-cards class="md:max-w-1/3 max-w-full rounded-bl-none">
                    <flux:text>
                        {!! str()->markdown($message['content']) !!}
                    </flux:text>
                    @if ($message['sources'])
                        <flux:separator class="my-2" />
                        <div class="flex flex-row flex-wrap gap-2">
                            @foreach ($message['sources'] as $source)
                                <a
                                    target="_blank"
                                    href="{{ $source['link'] }}"
                                >
                                    <flux:badge
                                        variant="pill"
                                        size="sm"
                                    >
                                        {{ $source['title'] }}
                                    </flux:badge>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </x-cards>
            @endif
        @empty
            <x-cards class="md:max-w-1/3 max-w-full rounded-bl-none">
                <flux:text>
                    Halooo! Midori Nee-san di sini, siap menemani dan membantu
                    kamu.
                </flux:text>
            </x-cards>
        @endforelse
    </div>

    @if ($this?->originalFileName)
        <div class="z-[3] flex flex-row">
            <flux:badge
                variant="pill"
                size="sm"
            >
                {{ str($this?->originalFileName)->limit(20) }}
            </flux:badge>
        </div>
    @endif
    <div class="relative z-[3] flex flex-col gap-2">
        <flux:icon.loading
            wire:loading
            wire:target="send, file"
            class="absolute right-2 top-2"
        />
        <flux:textarea
            id="input-message"
            rows="2"
            resize="none"
            wire:model="message"
            placeholder="Tulis pesan..."
            wire:keydown.enter="send"
            wire:loading.attr="disabled"
            wire:target="send, file"
        />
        <flux:input
            id="input-file"
            type="file"
            wire:model.live="file"
            wire:loading.attr="disabled"
            wire:target="send, file"
            class="hidden"
            accept="image/*"
        />
        <div class="flex flex-row items-center justify-end gap-2">
            <flux:button
                icon="arrow-path"
                wire:click="resetChat"
                wire:loading.attr="disabled"
                wire:target="send, file"
                wire:confirm="Apakah anda yakin ingin mereset percakapan?"
            />
            <flux:button
                icon="paper-clip"
                onclick="document.getElementById('input-file').click()"
                wire:loading.attr="disabled"
                wire:target="send, file"
            />
            <flux:button
                variant="primary"
                icon="paper-airplane"
                wire:click="send"
                wire:loading.attr="disabled"
                wire:target="send, file"
            >
                Kirim
            </flux:button>
        </div>
    </div>
</x-cards>

@script
    <script>
        $wire.on('messages-updated', () => {
            const chatContainer = document.getElementById('chat-container');
            // Smooth scroll to the bottom of the chat container
            setTimeout(() => {
                chatContainer.scrollTo({
                    top: chatContainer.scrollHeight,
                    behavior: 'smooth'
                });
            }, 100); // Adjust or remove the timeout if not needed

            // Auto focus on the textarea
            document.getElementById('input-message').focus();
        });
    </script>
@endscript
