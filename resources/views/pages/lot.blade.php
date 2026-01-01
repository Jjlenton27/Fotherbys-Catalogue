@extends('layouts.layout')
@section('title', "Lot")
@section('content')
    <div class="lotPage">
        <div class="lotTitle">
            <h1>PLACEHOLDER LOT NAME</h1>
            <h3>Sub title</h3>
        </div>
        <div class="lotImg">
            {{-- change img to carousel --}}
            <img src="images/placeholder.png" alt=""> 
        </div>
        <div class="lotPrice">
            <h3>Estimated Value:</h3>
            <p>£XXXX</p>
        </div>
        <div class="lotDesc">
            <h3>Description:</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In ipsam totam animi, veritatis modi nihil, doloremque temporibus exercitationem, sunt odit incidunt est quaerat. Similique, expedita. Magnam aut at eos quos?</p>
        </div>

    </div>
@endsection