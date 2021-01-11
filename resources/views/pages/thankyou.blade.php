@extends('layouts.master')
@section('title', 'Thank You')
@section('content')
    <h1 class="jumbotron-heading">Thank You</h1>
    <p class="lead text-muted">Your purchase has been confirmed.</p>
    <div><hr></div>
    <p>
        Thank you for your purchase. If this were really functioning, I would store a record of the purchase
        for processing and then dispatch an email to the end user notifying them of their recent purchase.
    </p>
    <div><hr></div>
    @if(!is_null($upsellProduct))
        <div class="container">
            <div class="row">
                <p class="lead text-muted">You also might be interested in this UPSELL product :)</p>
                    <div class="col">
                        <div><img src="{{ $upsellProduct->img_url }}" width="250" height="188" alt="{{ $upsellProduct->name }}" /></div>
                        <div>
                            <p><strong>Name:</strong> {{ $upsellProduct->name }}</p>
                            <p><strong>Model:</strong> {{ $upsellProduct->model }}</p>
                            <p><strong>Price:</strong> ${{ number_format($upsellProduct->price, 2) }}</p>
                        </div>
                    </div>
            </div>
        </div>
        <div><hr></div>
    @endif

    <p><a href="{{ route('pages.index') }}" class="btn btn-secondary my-2">Start Over</a></p>
@stop
