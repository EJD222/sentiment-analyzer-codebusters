<style>
    .positive-word {
        color: yellow !important;
        font-weight: bold !important;
    }

    .negative-word {
        color: red !important;
        font-weight: bold !important;
    }
</style>
<div>
    <textarea wire:model="text" placeholder="Enter text to analyze" rows="6" cols="50"></textarea>
    <button wire:click="analyze" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Analyze</button>

    @if ($result)
        <div class="mt-4">
            <h1 class="font-semibold text-lg">Analysis Result:</h1>
            <p>{!! nl2br(e($result)) !!}</p>

            @if ($highlightedText)
                <div class="mt-2">
                    <h4 class="font-semibold text-lg" style='color: yellow'>Highlighted Text:</h4>
                    <p>{!! session('highlighted_text') !!}</p>
                </div>
            @endif
        </div>
    @endif
</div>