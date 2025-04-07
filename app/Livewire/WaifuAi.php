<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;

class WaifuAi extends Component
{
    public $messages = [];

    public $message = '';

    public function render(): View
    {
        return view('livewire.waifu-ai');
    }

    public function send(): void
    {
        $this->messages[] = [
            'role' => 'user',
            'content' => $this->message,
        ];
        $this->message = '';

        $this->askWaifuAi();

        $this->dispatch('messages-updated');
    }

    public function askWaifuAi(): void
    {
        $response = Http::withHeaders(['API-Key' => config('services.weaboo.api_key')])->post(config('services.weaboo.api_url').'/ai/chat', $this->messages)->json();

        $this->messages[] = [
            'role' => $response['role'],
            'content' => $response['content'],
        ];
    }

    public function resetChat(): void
    {
        $this->messages = [];
    }
}
