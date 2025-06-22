<?php

namespace App\Livewire;

use Parsedown;
use App\Models\Article;
use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class Chat extends Component
{



    public $prompt = '';
    public $messages = [];
    public $games;

    public function mount()
    {
        $this->games = Article::where('is_accepted', true)->get();
    }


    public function run()
    {
        $developerPrompt = "Sei un esperto di videogiochi pronto ad assistere gli utenti con consigli per gli acquisti. Rispondi in modo amichevole e simpatico, con qualche battuta a tema videogiochi. La lista dei giochi è questa: \n $this->games. Se suggerisci un gioco, rimanda l'utente al gioco con il link: http://127.0.0.1:8000/articles/show/{id} sostituendo {id} con l'ID corretto.";

        $this->messages[] = [
            'role' => 'user',
            'content' => $this->prompt
        ];
        $messageDeveloper = [
            'role' => 'developer',
            'content' => $developerPrompt
        ];
        $newMessages = [$messageDeveloper, ...$this->messages];
        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => $newMessages,
            'max_tokens' => 300
        ]);

        $parsedown = new Parsedown();
        $parsedContent = $parsedown->text($result->choices[0]->message->content);

        $this->messages[] = [
            'role' => 'assistant',
            'content' => $parsedContent
        ];
        // Reset campo input
        $this->prompt = '';
    }
    public function render()
    {
        return view('livewire.chat');
    }
}
