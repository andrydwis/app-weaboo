<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class AnimeEpisodes extends Component
{
    public array $anime;

    public array $episodes;

    public ?string $episodeId = null;

    public array $histories = [];

    public function render(): View
    {
        return view('livewire.anime-episodes');
    }

    public function reverseSort()
    {
        sleep(0.5);
        $this->episodes = array_reverse($this->episodes);
    }
}
