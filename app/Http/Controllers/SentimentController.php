<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SentimentController extends Controller
{
    public function analyze(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:1000',
        ]);

        $text = $request->input('text');
        $scriptPath = base_path('scripts/sentiment_analysis.py');
        $command = sprintf(
            'python %s %s',
            escapeshellarg($scriptPath),
            escapeshellarg($text)
        );

        \Log::info('Command: ' . $command);

        $output = shell_exec($command . ' 2>&1');
        \Log::info('Command Output: ' . $output);

        $response = json_decode($output, true);

        if (isset($response['sentiment'])) {
            $formattedResult = sprintf(
                "Sentiment: %s\nPolarity: %s\nSubjectivity: %s",
                ucfirst($response['sentiment']),
                $response['polarity'],
                $response['subjectivity']
            );

            return redirect()->route('sentiment')->with('result', $formattedResult);
        } else {
            \Log::error('Error analyzing sentiment. Command Output: ' . $output);
            return redirect()->route('sentiment')->with('error', 'Error analyzing sentiment.');
        }
    }
}
