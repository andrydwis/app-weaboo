<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class DocumentAi extends Component
{
    use WithFileUploads;

    public $messages = [];

    #[Validate('nullable|mimes:jpg,jpeg,png,pdf|max:4096')]
    public $file;

    public string $fileName = '';

    public string $originalFileName = '';

    public $message = '';

    public function render()
    {
        return view('livewire.document-ai');
    }

    public function send(): void
    {
        $this->validate([
            'message' => 'required|string',
        ]);

        if ($this->file) {
            $this->messages[] = [
                'role' => 'user',
                'content' => $this->message,
                'files' => [$this->fileName],
                'preview' => $this->file->temporaryUrl(),
            ];
        } else {
            $this->messages[] = [
                'role' => 'user',
                'content' => $this->message,
            ];
        }

        $this->reset(['message', 'file', 'fileName']);

        $this->ask();

        $this->dispatch('messages-updated');
    }

    public function ask(): void
    {
        $response = Http::withHeaders(['API-Key' => config('services.weaboo.api_key')])->post(config('services.weaboo.api_url').'/ai/chat/document', $this->messages)->json();

        $this->messages[] = [
            'role' => $response['role'],
            'content' => $response['content'],
        ];
    }

    public function resetChat(): void
    {
        $this->messages = [];

        $this->reset(['message', 'file', 'fileName', 'originalFileName']);
    }

    public function updatedFile(): void
    {
        $this->originalFileName = $this->file->getClientOriginalName();

        $response = Http::withHeaders(['API-Key' => config('services.weaboo.api_key')])->attach('file', file_get_contents($this->file->getRealPath()), $this->file->getClientOriginalName())->post(config('services.weaboo.api_url').'/ai/upload')->json();

        $this->fileName = $response['name'];
    }
}
