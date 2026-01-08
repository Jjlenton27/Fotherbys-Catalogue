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
                <img src="/images/placeholder.png" alt="" class="cardImg">
                <h3>{{$auction->title}}</h3>
                <p>{{$auction->summary}}</p>
                <p>{{$auction->auction_date}}, {{$auction->auction_time}}</p>
                <a href="/catalouge/{{ $auction->id }}">View Catalouge</a>

                @if (session('access_level') == 2)
                    <a href="/admin/auction/{{ $auction->id }}">Manage Auction</a>
                @endif

            </div>

        @endforeach
    </div>
@endsection
