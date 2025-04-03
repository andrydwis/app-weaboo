<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

class AnimePagination extends Component
{
    #[Url]
    public int $page = 1;

    public array $animes = [];

    public array $pagination = [];

    public string $type = 'ongoing';

    public string $genre = '';

    public function render(): View
    {
        return view('livewire.anime-pagination');
    }

    public function getAnimePaginationData(): void
    {
        if ($this->type === 'ongoing') {
            $animes = Http::get(config('services.weaboo.api_url').'/anime/ongoing', [
                'page' => $this->page,
            ])->json();
        } elseif ($this->type === 'genre') {
            $animes = Http::get(config('services.weaboo.api_url').'/anime/genres/'.$this->genre, [
                'page' => $this->page,
            ])->json();
        }

        $this->animes = $animes['animes'];
        $this->pagination = $animes['pagination'];

        $this->dispatch('anime-pagination-loaded');
    }

    public function nextPage(): void
    {
        $this->page++;
        $this->getAnimePaginationData();
    }

    public function prevPage(): void
    {
        $this->page--;
        $this->getAnimePaginationData();
    }
}
