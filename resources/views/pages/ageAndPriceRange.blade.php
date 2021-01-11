@extends('layouts.master')
@section('title', 'Age & Price Range')
@section('content')
    <h1 class="jumbotron-heading">Age & Price Range</h1>
    <p class="lead text-muted">Please provide us with your age, and your price range.</p>
    <div><hr></div>
    <form method="POST" action="{{ route('pages.ageAndPriceRange.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="userAge" class="text-muted">Select your Age</label>
            <select class="form-control" id="userAge" name="userAge">
                <option value="" {{ old('userAge')=='' ? 'selected="selected"' : '' }}>-- Select Age --</option>
                <option value="1" {{ old('userAge')=='1' ? 'selected="selected"' : '' }}>Under 25</option>
                <option value="2" {{ old('userAge')=='2' ? 'selected="selected"' : '' }}>25-50</option>
                <option value="3" {{ old('userAge')=='3+' ? 'selected="selected"' : '' }}>50 or Older</option>
            </select>
            @if ($errors->has('userAge'))
                <span class="text-danger">{{ $errors->first('userAge') }}</span>
            @endif
        </div>
        <div>&nbsp;</div>
        <div class="form-group">
            <label for="userPriceRange" class="text-muted">Select your Price Range</label>
            <select class="form-control" id="userPriceRange" name="userPriceRange">
                <option value="" {{ old('userPriceRange')=='' ? 'selected="selected"' : '' }}>-- Select Price Range --</option>
                <option value="1" {{ old('userPriceRange')=='1' ? 'selected="selected"' : '' }}>Less than 50k</option>
                <option value="2" {{ old('userPriceRange')=='2' ? 'selected="selected"' : '' }}>More than 50k</option>
            </select>
            @if ($errors->has('userPriceRange'))
                <span class="text-danger">{{ $errors->first('userPriceRange') }}</span>
            @endif
        </div>
        <div><hr></div>
        <p>
            <a href="{{ route('pages.index') }}" class="btn btn-secondary my-2">Back</a>
            <input type="submit" class="btn btn-primary my-2" value="Continue to Marital Status">
        </p>
    </form>
@stop
