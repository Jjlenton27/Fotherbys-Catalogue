@extends('layouts.layout')
@section('title', "Lot")
@section('content')
    <div class="lotPage">
        <div class="lotTitle">
            <h1>{{ $lot->title }}</h1>
            <h3>{{ $lot->sub_title }}</h3>
        </div>
        <div class="lotImg">
            {{-- change img to carousel --}}
            <img src="/images/placeholder.png" alt="">
        </div>
        <div class="lotPrice">
            <h3>Estimated Value:</h3>
            <p>£{{ $lot->price }}</p>
        </div>
        <div class="lotDesc">
            <h3>Description:</h3>
            <?php echo($lot->description); ?>
        </div>

    </div>
@endsection
