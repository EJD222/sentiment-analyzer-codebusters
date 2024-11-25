<div>
    <h2>Enter text for sentiment analysis:</h2>
    <textarea wire:model="text" placeholder="Type your text here"></textarea>
    <button wire:click="analyze">Analyze</button>

    @if ($result)
        <div class="result">
            <h3>Analysis Result:</h3>
            <p>Sentiment: {{ $result }}</p>
        </div>
    @endif
</div>
