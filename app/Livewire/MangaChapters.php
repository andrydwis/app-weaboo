<?php

namespace App\Livewire;

use Livewire\Component;

class MangaChapters extends Component
{
    public array $manga;

    public array $chapters;

    public ?string $chapterId = null;

    public array $histories = [];

    public function render()
    {
        return view('livewire.manga-chapters');
    }

    public function reverseSort()
    {
        sleep(0.5);
        $this->chapters = array_reverse($this->chapters);
    }
}
