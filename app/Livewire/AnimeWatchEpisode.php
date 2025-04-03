<?php

namespace App\Livewire;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Component;

class AnimeWatchEpisode extends Component
{
    public array $anime = [];

    public array $episode = [];

    public string $streamUrl;

    public function render(): View
    {
        return view('livewire.anime-watch-episode');
    }

    public function mount(): void
    {
        $this->streamUrl = $this->episode['default_stream_url'];
    }

    public function fetchStreamUrl(string $serverId): void
    {
        try {
            $server = Http::get(config('services.weaboo.api_url').'/anime/'.$this->anime['id'].'/servers/'.$serverId)->json();

            $this->streamUrl = $server['url'];
        } catch (Exception $e) {
            Log::error($e->getMessage());
            $this->streamUrl = $this->episode['default_stream_url'];
        }
    }
}
