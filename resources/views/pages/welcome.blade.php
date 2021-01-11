@extends('layouts.master')
@section('title', 'Welcome')
@section('content')
    <h1 class="jumbotron-heading">Welcome</h1>
    <p class="lead text-muted">Welcome to Company XYZ. We aim to meet your needs. Please checkout the short video below before you continue.</p>
    <div><hr></div>
    <div class="embed-responsive">
        <iframe class="embed-responsive-item" width="600" height="338" src="{{ asset('videos/Welcome.mp4') }}"></iframe>
    </div>
    <div><hr></div>
    <p>
        <a href="{{ route('pages.ageAndPriceRange') }}" class="btn btn-primary my-2">Continue to Age & Price Range</a>
    </p>
    <p><strong>OR</strong></p>
    <p>
        <a href="{{ route('pages.index') }}?utm=fb" class="btn btn-secondary my-2">Start Over (UTM - FB)</a>
        <a href="{{ route('pages.index') }}?utm=youtube" class="btn btn-secondary my-2">Start Over (UTM - YouTube)</a>
    </p>
@stop
