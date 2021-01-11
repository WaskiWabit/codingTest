@extends('layouts.master')
@section('title', 'Maraital Status')
@section('content')
    <h1 class="jumbotron-heading">Maraital Status</h1>
    <p class="lead text-muted">Please provide us with your marital status.</p>
    <div><hr></div>
    <form method="POST" action="{{ route('pages.maritalStatus.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="userMaritalStatus" class="text-muted">Select your Marital Status</label>
            <select class="form-control" id="userMaritalStatus" name="userMaritalStatus">
                <option value="" {{ old('userMaritalStatus')=='' ? 'selected="selected"' : '' }}>-- Select Marital Status --</option>
                <option value="1" {{ old('userMaritalStatus')=='1' ? 'selected="selected"' : '' }}>Single</option>
                <option value="2" {{ old('userMaritalStatus')=='2' ? 'selected="selected"' : '' }}>Married</option>
            </select>
            @if ($errors->has('userMaritalStatus'))
                <span class="text-danger">{{ $errors->first('userMaritalStatus') }}</span>
            @endif
        </div>
        <div><hr></div>
        <p>
            <a href="{{ route('pages.ageAndPriceRange') }}" class="btn btn-secondary my-2">Back</a>
            <input type="submit" class="btn btn-primary my-2" value="Continue to Product Offers">
        </p>
    </form>
@stop
