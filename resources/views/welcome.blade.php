@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="welcome-container">
    <h1>Welcome to Sentiment Analysis</h1>
    <p>Analyze the sentiment of your text easily and quickly!</p>
    <a href="{{ route('sentiment') }}" class="btn btn-primary">Start Analysis</a>
</div>
@endsection
