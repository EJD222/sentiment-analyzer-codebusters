<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SentimentAnalyzer extends Component
{
    public $text = '';
    public $result = null;

    public function analyze()
    {
        if ($this->text) {
            $this->result = 'Analysis for: ' . $this->text;
        }
    }

    public function render()
    {
        return view('livewire.sentiment-analyzer');
    }
}




