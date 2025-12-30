@extends('layouts.layout')
@section('title', "Auctions")
@section('content')


    <div>
        <h2>Auctions</h2>
        <p>Upcoming and current auctions.</p>
    </div>

    <div class="cardContainer">
        <?php
            for ($x = 0; $x <= 10; $x++) {
        ?>
            <div class="card">
                <img src="images/placeholder.png" alt="" class="cardImg">
                <h3>Card</h3>
                <p>Auciton description</p>
                <a href="/catalouge">View Catalouge</a>
            </div>
        <?php
            }
        ?>

    </div>
@endsection