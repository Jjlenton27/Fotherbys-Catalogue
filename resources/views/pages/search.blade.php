@extends('layouts.layout')
@section('title', "Search")
@section('content')

    <form method="GET" action="/search" class="searchBarForm">
        <input type="text" name="search" class="wideInput" autofocus>
        <button type="submit">
            Search
        </button>
    </form>

    @if (isset($lots))
        <div class="cardContainer">
            @foreach ($lots as $lot)
            <div class="card">
                <img src="/images/placeholder.png" alt="" class="cardImg">
                <h3>{{$lot->title}}</h3>
                <p>{{$lot->summary}}</p>
                <p>£{{$lot->price}}</p>
                <a href="/lot/{{$lot->id}}" class="cardLink">View Lot</a>

                @if (session('access_level') == 2)
                <a href="/admin/lot/{{ $lot->id }}">| Manage Lot</a>
                @endif
            </div>

            @endforeach
        </div>
    @endif

@endsection
