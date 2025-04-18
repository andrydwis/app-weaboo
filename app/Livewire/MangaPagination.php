<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MangaPagination extends Component
{
    public int $page = 1;

    public array $mangas = [];

    public string $type = 'popular';

    public string $genre = '';

    public function render()
    {
        return view('livewire.manga-pagination');
    }

    public function getMangaPaginationData(): void
    {
        if ($this->type === 'popular') {
            $mangas = Http::get(config('services.weaboo.api_url').'/manga/popular', [
                'page' => $this->page,
            ])->json();
        } elseif ($this->type === 'recent-update') {
            $mangas = Http::get(config('services.weaboo.api_url').'/manga/recent', [
                'page' => $this->page,
            ])->json();
        } elseif ($this->type === 'genre') {
            $mangas = Http::get(config('services.weaboo.api_url').'/manga/genres/'.$this->genre, [
                'page' => $this->page,
            ])->json();
        }

        $this->mangas = $mangas;
    }

    public function nextPage(): void
    {
        $this->page++;
        $this->getMangaPaginationData();
    }

    public function prevPage(): void
    {
        $this->page--;
        $this->getMangaPaginationData();
    }
}
