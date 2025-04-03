<?php

namespace App\Livewire;

use App\Models\AnimeWatchlist as AnimeWatchlistModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class AnimeWatchlist extends Component
{
    public bool $isAuthenticated = false;

    public bool $isAddedToWatchlist = false;

    public array $anime = [];

    public function render(): View
    {
        return view('livewire.anime-watchlist');
    }

    public function mount(): void
    {
        $this->isAuthenticated = Auth::check();

        if ($this->isAuthenticated) {
            $this->isAddedToWatchlist = AnimeWatchlistModel::where('user_id', Auth::id())
                ->where('anime_id', $this->anime['id'])
                ->exists();
        }
    }

    public function toggleWatchlist(): void
    {
        if ($this->isAddedToWatchlist) {
            $this->isAddedToWatchlist = false;
            // delete from watchlist
            AnimeWatchlistModel::where('user_id', Auth::id())
                ->where('anime_id', $this->anime['id'])
                ->delete();
        } else {
            $this->isAddedToWatchlist = true;
            // add to watchlist
            AnimeWatchlistModel::create([
                'user_id' => Auth::id(),
                'anime_id' => $this->anime['id'],
                'data' => $this->anime,
            ]);
        }
    }
}
