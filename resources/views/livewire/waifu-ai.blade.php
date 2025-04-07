<x-cards class="relative flex h-full flex-col gap-4">
    <img
        src="{{ asset('images/cta/midori.png') }}"
        alt="midori"
        class="grayscale-80 absolute bottom-0 left-1/2 z-10 h-2/3 -translate-x-1/2 opacity-20"
    >
    <div
        id="chat-container"
        class="z-20 flex h-full max-h-[50vh] flex-col gap-4 overflow-auto md:pr-2"
    >
        @forelse ($messages as $message)
            @if ($message['role'] == 'user')
                <x-cards class="md:max-w-1/3 max-w-3/4 ml-auto rounded-br-none">
                    <flux:text>
                        {{ $message['content'] }}
                    </flux:text>
                </x-cards>
            @else
                <x-cards class="md:max-w-1/3 max-w-3/4 rounded-bl-none">
                    <flux:text>
                        {!! str()->markdown($message['content']) !!}
                    </flux:text>
                </x-cards>
            @endif
        @empty
            <x-cards class="md:max-w-1/3 max-w-3/4 rounded-bl-none">
                <flux:text>
                    Ara ara~ 😘 Halooo! Midori Nee-san di sini, siap menemani dan membantu
                    kamu. Ada yang bisa Midori bantu?
                </flux:text>
            </x-cards>
        @endforelse
    </div>
    <flux:input.group class="z-20">
        <flux:input
            type="text"
            wire:model="message"
            placeholder="Tulis pesan..."
            icon="sparkles"
            wire:keydown.enter="send"
            wire:loading.attr="disabled"
            wire:target="send"
            clearable
        />
        <flux:button
            icon="paper-airplane"
            wire:click="send"
        >
            Kirim
        </flux:button>
    </flux:input.group>

    <flux:button
        variant="ghost"
        icon="arrow-path"
        wire:click="resetChat"
        class="z-20"
    >
        Reset Chat
    </flux:button>
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
