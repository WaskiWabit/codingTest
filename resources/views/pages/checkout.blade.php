@extends('layouts.master')
@section('title', 'Checkout')
@section('content')
    <h1 class="jumbotron-heading">Checkout</h1>
    <p class="lead text-muted">Please confirm your purchase.</p>
    <div><hr></div>
    <form method="POST" action="{{ route('pages.checkout.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="container">
                @foreach ($products as $product)
                <div class="row">
                    <div class="card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img src="{{ $product->img_url }}" width="150" height="113" alt="{{ $product->name }}" />
                            </div>
                            <div class="card-body">
                                <p><strong>Name:</strong> {{ $product->name }} (Model: {{ $product->model }})</p>
                                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>&nbsp;</div>

                @endforeach
            </div>
        </div>
        <div><hr></div>
        <div class="container">
            <p><strong>SubTotal:</strong> ${{ number_format($subTotal, 2) }}</p>

            @foreach ($discountAmounts as $discount)
                <p><strong>Discount:</strong> {{ $discount->name }}/{{ ucfirst($discount->code) }} (<i>{{ $discount->description }}</i>)</p>
            @endforeach
            <p><strong>Grand Total:</strong> ${{ number_format($grandTotal, 2) }}</p>
        </div>
        <div><hr></div>
        <p>
            <a href="{{ route('pages.productOffers') }}" class="btn btn-secondary my-2">Back</a>
            <input type="submit" class="btn btn-primary my-2" value="Confirm Purchase">
        </p>
    </form>
@stop
