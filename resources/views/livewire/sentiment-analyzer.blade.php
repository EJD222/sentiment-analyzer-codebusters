<div>
    <h2>Enter text for sentiment analysis:</h2>
    <textarea wire:model.defer="text" placeholder="Type your text here" rows="4" cols="50"></textarea>
    <button wire:click.prevent="analyze">Analyze</button>

    @if ($result)
        <div class="result">
            <p><strong>Result:</strong></p>
            <pre>{{ $result }}</pre>
        </div>
    @endif
</div>
