<x-cards class="relative flex h-full max-h-[80vh] flex-col gap-4">
    <img
        src="{{ asset('images/cta/midori.png') }}"
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

    <div class="z-[3] flex flex-col gap-2">
        <flux:textarea
            rows="2"
            resize="none"
            wire:model="message"
            placeholder="Tulis pesan..."
            wire:keydown.enter="send"
            wire:loading.attr="disabled"
            wire:target="send, file"
        />
        <flux:input
            type="file"
            wire:model.live="file"
            wire:loading.attr="disabled"
            wire:target="send, file"
        />
        <div class="flex flex-row items-center justify-end gap-2">
            <flux:button
                icon="arrow-path"
                wire:click="resetChat"
                wire:loading.attr="disabled"
                wire:target="send, file"
            >
                Reset
            </flux:button>
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
        });
    </script>
@endscript
