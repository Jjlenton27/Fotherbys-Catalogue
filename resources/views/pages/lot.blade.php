@extends('layouts.layout')
@section('title', "Lot")
@section('content')
    <div class="lotPage">
        <div class="lotTitle">
            <h1>{{ $info['title'] }}</h1>
            <h3>{{ $info['subtitle'] }}</h3>
        </div>
        <div class="lotImg">
            {{-- change img to carousel --}}
            <img src="images/placeholder.png" alt=""> 
        </div>
        <div class="lotPrice">
            <h3>Estimated Value:</h3>
            <p>£{{ $info['price'] }}</p>
        </div>
        <div class="lotDesc">
            <h3>Description:</h3>
            <p>{{ $info['description'] }}</p>
        </div>

    </div>
@endsection