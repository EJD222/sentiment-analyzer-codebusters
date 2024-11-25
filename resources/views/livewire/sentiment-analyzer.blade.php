<div>
    <h2>Enter text for sentiment analysis:</h2>
    <textarea wire:model="text" placeholder="Type your text here"></textarea>
    <button wire:click="analyze">Analyze</button>

    @if ($result)
        <div class="result">
            <p>Result: {{ $result }}</p>
        </div>
    @endif
</div>
