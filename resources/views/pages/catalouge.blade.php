@extends('layouts.layout')
@section('title', "Catalouge")
@section('content')

    <div>
        <h1>PLACEHOLDER CATALOUGE NAME</h1>
        <p>PLACE HOLDER DESCRIPTION</p>
    </div>

    {{-- <div class="itemDisplay"> --}}
        {{-- <div class="sidebar">
            <h2>Filters</h2>
            <p>Price</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam voluptate nemo minus, repellat iure dolor neque. Enim sequi maiores labore provident, quidem dicta ad! Commodi aut dolorem quos illum ut!</p>
            <input type="range" id="priceFilter" name="priceFilter" min="0" max="100" value="90" step="1" />
        </div> --}}
        <div class="cardContainer">
            @foreach ($lots as $lot)
                <div class="card">
                    <img src="/images/placeholder.png" alt="" class="cardImg">
                    <h3>{{$lot->title}}</h3>
                    <p>{{$lot->summary}}</p>
                    <p>£{{$lot->price}}</p>
                    <a href="/lot/{{$lot->id}}" class="cardLink">View Lot</a>

                    @if (session('access_level') == 2)
                        <a href="/admin/lot/{{ $lot->id }}">Manage Lot</a>
                    @endif

                </div>

            @endforeach
        </div>

    {{-- </div> --}}
@endsection
