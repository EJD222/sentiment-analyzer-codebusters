<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SentimentAnalyzer extends Component
{
    public $text;
    public $result;

    public function analyze()
    {
        // Ensure that the text is not empty
        if (empty($this->text)) {
            $this->result = 'Please enter some text for analysis.';
            return;
        }

        $scriptPath = base_path('scripts/sentiment_analysis.py');
        $command = sprintf(
            'python %s %s',
            escapeshellarg($scriptPath),
            escapeshellarg($this->text)
        );

        // Log the command being executed
        \Log::info('Command: ' . $command);

        // Execute the command
        $output = shell_exec($command . ' 2>&1');
        \Log::info('Command Output: ' . $output);

        // Decode the JSON response
        $response = json_decode($output, true);

        // Handle the response
        if (isset($response['sentiment'])) {
            $this->result = sprintf(
                "Sentiment: %s\nPolarity: %s\nSubjectivity: %s",
                ucfirst($response['sentiment']),
                $response['polarity'],
                $response['subjectivity']
            );
        } else {
            $this->result = 'Error analyzing sentiment.';
        }
    }

    public function render()
    {
        return view('livewire.sentiment-analyzer');
    }
}