<div class="flex flex-col gap-4">
    <div class="grid grid-cols-2 gap-2 lg:grid-cols-4">
        @foreach ($this->days as $key => $day)
            <flux:button
                variant="{{ $key == $this->activeDay ? 'primary' : 'outline' }}"
                wire:click="$set('activeDay', '{{ $key }}')"
            >
                {{ $day }}
            </flux:button>
        @endforeach
    </div>
    <flux:separator />
    <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
        @for ($i = 0; $i < 8; $i++)
            <x-cards.placeholder
                wire:loading
                wire:target="activeDay"
            />
        @endfor
        @foreach ($animes as $anime)
            <x-cards.anime
                wire:loading.remove
                :anime="$anime"
            />
        @endforeach
    </div>
</div>
