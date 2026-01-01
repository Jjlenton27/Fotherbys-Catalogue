@extends('layouts.layout')
@section('title', "Auctions")
@section('content')

    <div>
        <h2>Auctions</h2>
        <p>Upcoming and current auctions.</p>
    </div>

    <div class="cardContainer">
        @foreach ($auctions as $auction)
            <div class="card">
                <img src="images/placeholder.png" alt="" class="cardImg">
                <h3>{{$auction->title}}</h3>
                <p>{{$auction->summary}}</p>
                <p>{{$auction->date}}, {{$auction->time}}</p>
                <a href="/catalouge">View Catalouge</a>
            </div>

        @endforeach
    </div>
@endsection
