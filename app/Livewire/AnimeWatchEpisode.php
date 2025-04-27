<?php

namespace App\Livewire;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Component;

class AnimeWatchEpisode extends Component
{
    public array $anime = [];

    public array $episode = [];

    public string $streamUrl;

    public ?string $prevEpisode = null;

    public ?string $nextEpisode = null;

    public string $cachedQuality = '';

    public string $cachedServerName = '';

    public function render(): View
    {
        return view('livewire.anime-watch-episode');
    }

    public function mount(): void
    {
        if (Auth::check()) {
            $this->cachedQuality = Cache::get('quality-'.Auth::id(), '');
            $this->cachedServerName = Cache::get('server-name-'.Auth::id(), '');
        }

        if ($this->cachedQuality && $this->cachedServerName) {
            try {
                $serverId = collect($this->episode['servers'][$this->cachedQuality])
                    ->where('name', $this->cachedServerName)
                    ->pluck('id')
                    ->first();
                $this->fetchStreamUrl($this->cachedQuality, $this->cachedServerName, $serverId);
            } catch (Exception $e) {
                $this->streamUrl = $this->episode['default_stream_url'];
            }
        } else {
            $this->streamUrl = $this->episode['default_stream_url'];
        }

        $episodes = $this->anime['episodes'];
        $index = array_search($this->episode['episode_id'], array_column($episodes, 'id'));

        $this->nextEpisode = $index > 0 ? $episodes[$index - 1]['id'] : null;
        $this->prevEpisode = $index < count($episodes) - 1 ? $episodes[$index + 1]['id'] : null;
    }

    public function fetchStreamUrl(string $quality, string $serverName, string $serverId): void
    {
        if (Auth::check()) {
            $this->cacheServer($quality, $serverName);
        }

        try {
            $server = Http::get(config('services.weaboo.api_url').'/'.config('services.weaboo.anime_provider').'/anime/'.$this->anime['id'].'/servers/'.$serverId)->json();

            $this->streamUrl = $server['url'];
        } catch (Exception $e) {
            Log::error($e->getMessage());
            $this->streamUrl = $this->episode['default_stream_url'];
        }
    }

    public function cacheServer(string $quality, string $serverName): void
    {
        Cache::forget('quality-'.Auth::id());
        Cache::forget('server-name-'.Auth::id());

        $this->cachedQuality = Cache::remember('quality-'.Auth::id(), 3600, function () use ($quality) {
            return $quality;
        });
        $this->cachedServerName = Cache::remember('server-name-'.Auth::id(), 3600, function () use ($serverName) {
            return $serverName;
        });
    }
}
