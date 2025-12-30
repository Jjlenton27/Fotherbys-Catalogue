@extends('layouts.layout')
@section('title', "Catalouge")
@section('content')
    <h1>PLACEHOLDER CATALOUGE NAME</h1>
    <p>PLACE HOLDER DESCRIPTION</p>

    <div class="itemDisplay">
        <div class="sidebar">
                <h2>Filters</h2>
    <p>Price</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam voluptate nemo minus, repellat iure dolor neque. Enim sequi maiores labore provident, quidem dicta ad! Commodi aut dolorem quos illum ut!</p>
    <input type="range" id="priceFilter" name="priceFilter" min="0" max="100" value="90" step="1" />
        </div>
    
        <div class="cardContainer">
            <?php
                for ($x = 0; $x <= 10; $x++) {
            ?>
                <div class="card">
                    <img src="images/placeholder.png" alt="" class="cardImg">
                    <h3>Lot Card</h3>
                    <p>Lot decription</p>
                    <a href="/lot">View Lot</a>
                </div>
            <?php
                }
            ?>
    
        </div>

    </div>
@endsection