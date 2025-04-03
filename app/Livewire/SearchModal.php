<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

class SearchModal extends Component
{
    #[Url]
    public string $search = '';

    public ?array $animes = [];

    public ?array $mangas = [];

    public function render(): View
    {
        return view('livewire.search-modal');
    }

    public function mount(): void
    {
        if ($this->search) {
            $this->searchAnime();
            $this->searchManga();
        } else {
            $this->animes = [];
            $this->mangas = [];
        }
    }

    public function updatedSearch(): void
    {
        if ($this->search) {
            $this->searchAnime();
            $this->searchManga();
        } else {
            $this->animes = [];
            $this->mangas = [];
        }
    }

    public function searchAnime(): void
    {
        $this->animes = Http::get(config('services.weaboo.api_url').'/anime/search', [
            'query' => $this->search,
        ])->json() ?? [];
    }

    public function searchManga(): void
    {
        $this->mangas = Http::get(config('services.weaboo.api_url').'/manga/search', [
            'query' => $this->search,
        ])->json() ?? [];
    }
}
