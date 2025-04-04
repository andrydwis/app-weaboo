<?php

namespace App\Livewire;

use App\Models\MangaBookmark as MangaBookmarkModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MangaBookmark extends Component
{
    public bool $isAuthenticated = false;

    public bool $isAddedToBookmark = false;

    public array $manga = [];

    public function render()
    {
        return view('livewire.manga-bookmark');
    }

    public function mount(): void
    {
        $this->isAuthenticated = Auth::check();

        if ($this->isAuthenticated) {
            $this->isAddedToBookmark = MangaBookmarkModel::where('user_id', Auth::id())
                ->where('manga_id', $this->manga['id'])
                ->exists();
        }
    }

    public function toggleBookmark(): void
    {
        if ($this->isAddedToBookmark) {
            $this->isAddedToBookmark = false;
            // delete from bookmark
            MangaBookmarkModel::where('user_id', Auth::id())
                ->where('manga_id', $this->manga['id'])
                ->delete();
        } else {
            $this->isAddedToBookmark = true;
            // add to bookmark
            MangaBookmarkModel::create([
                'user_id' => Auth::id(),
                'manga_id' => $this->manga['id'],
                'data' => $this->manga,
            ]);
        }
    }
}
