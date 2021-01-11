@extends('layouts.master')
@section('title', 'Product Offers')
@section('content')
    <h1 class="jumbotron-heading">Product Offers</h1>
    <p class="lead text-muted">Please select your product offers.</p>
    <div><hr></div>
    <form method="POST" action="{{ route('pages.productOffers.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="container">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col">
                            <div><img src="{{ $product->img_url }}" width="250" height="188" alt="{{ $product->name }}" /></div>
                            <div>
                                <p><strong>Name:</strong> {{ $product->name }}</p>
                                <p><strong>Model:</strong> {{ $product->model }}</p>
                                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                                <p><label><input type="checkbox" name="products[]" value="{{ $product->id }}"> Purchase Now!</label></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            @if ($errors->has('products'))
                <span class="text-danger">{{ $errors->first('products') }}</span>
            @endif
        </div>
        <div><hr></div>
        <p>
            <a href="{{ route('pages.maritalStatus') }}" class="btn btn-secondary my-2">Back</a>
            <input type="submit" class="btn btn-primary my-2" value="Continue to Checkout">
        </p>
    </form>
@stop
