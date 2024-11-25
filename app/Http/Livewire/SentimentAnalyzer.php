<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SentimentAnalyzer extends Component
{
    public $text = '';
    public $result = null;

    public function analyze()
    {
        if (!empty($this->text)) {
            // Call the MeaningCloud API
            $response = Http::asForm()->post('https://api.meaningcloud.com/sentiment-2.1', [
                'key' => env('MEANINGCLOUD_API_KEY'), // API key from your .env file
                'txt' => $this->text,
                'lang' => 'en',
            ]);

            // Handle the response
            if ($response->ok()) {
                $data = $response->json();
                $this->result = $data['score_tag'] ?? 'Unknown'; // Extract sentiment score
            } else {
                $this->result = 'Error: Unable to process the text.';
            }
        } else {
            $this->result = 'Please enter some text.';
        }
    }

    public function render()
    {
        return view('livewire.sentiment-analyzer');
    }
}
