<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;

class SocialMediaDownloader extends Component
{
    public string $url;

    public string $title;

    public string $thumbnail;

    public string $duration;

    public array $formats = [];

    public function render(): View
    {
        return view('livewire.social-media-downloader');
    }

    public function download(): void
    {
        $response = Http::get(config('services.weaboo.api_url').'/tools/social-media-downloader/download', [
            'platform' => 'youtube',
            'video_url' => $this->url,
        ])->json();

        $this->title = $response['title'];
        $this->thumbnail = $response['thumbnail'];
        $this->duration = Carbon::createFromTimestamp($response['duration'])->format('H:i:s');
        $this->formats = $response['formats'];
    }
}
