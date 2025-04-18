<x-cards class="relative flex h-full max-h-[80vh] flex-col gap-4">
    <div
        id="chat-container"
        class="z-[3] flex h-full flex-col gap-4 overflow-auto md:pr-2"
    >
        @forelse ($messages as $message)
            @if ($message['role'] == 'user')
                <x-cards class="md:max-w-1/3 ml-auto max-w-full rounded-br-none">
                    <div class="flex flex-col gap-2">
                        <flux:text>
                            {{ $message['content'] }}
                        </flux:text>
                        @if (isset($message['preview']))
                            <flux:button
                                icon="eye"
                                target="_blank"
                                href="{{ $message['preview'] }}"
                            >
                                Lihat Dokumen
                            </flux:button>
                        @endif
                    </div>
                </x-cards>
            @else
                <x-cards class="md:max-w-1/3 max-w-full rounded-bl-none">
                    <flux:text>
                        {!! str()->markdown($message['content']) !!}
                    </flux:text>
                </x-cards>
            @endif
        @empty
            <x-cards class="md:max-w-1/3 flex max-w-full flex-col gap-2 rounded-bl-none">
                <flux:text>
                    Silahkan upload dokumen, kamu bisa merangkum, meringkas, atau
                    menjawab pertanyaan terkait dokumen yang kamu upload.
                </flux:text>
            </x-cards>
        @endforelse
    </div>

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
            placeholder="Tolong rangkum isi dokumen ini..."
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
            accept="image/*,application/pdf"
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
