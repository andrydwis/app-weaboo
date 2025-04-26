<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;

class AnimeSchedule extends Component
{
    public string $activeDay;

    public array $days = [
        'monday' => 'Senin',
        'tuesday' => 'Selasa',
        'wednesday' => 'Rabu',
        'thursday' => 'Kamis',
        'friday' => 'Jumat',
        'saturday' => 'Sabtu',
        'sunday' => 'Minggu',
    ];

    public array $schedules = [];

    public array $animes = [];

    public function render(): View
    {
        return view('livewire.anime-schedule');
    }

    public function mount(): void
    {
        $this->activeDay = str(now()->englishDayOfWeek)->lower();
        $this->schedules = $this->getAnimeSchedule();

        $this->animes = collect($this->schedules)->where('day', $this->activeDay)->first()['animes'];
    }

    public function getAnimeSchedule()
    {
        $response = Cache::remember('schedule', 3600, function () {
            return Http::get(config('services.weaboo.api_url').'/'.config('services.weaboo.anime_provider').'/anime/schedule', [
            ])->json();
        });

        return $response;
    }

    public function updatedActiveDay(): void
    {
        $this->animes = collect($this->schedules)->where('day', $this->activeDay)->first()['animes'];
    }
}
