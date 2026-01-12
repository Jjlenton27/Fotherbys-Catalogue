@extends('layouts.layout')
@section('title', "Search")
@section('content')

    <h2>Contact</h2>
    <p>If you have a problem or require more information, please contact us with the information or form below</p>

    <h3>Contact Details</h3>
    <p>Phone Number: XXXXXXXXXX</p>
    <p>Email: email@email.com</p>

    <div class="placeholderCarousel" style="width: 30%">
        <h1>Map to physical auction location</h1>
    </div>

    <h3>Contact Form</h3>
    <form method="POST" action="/contact/submit" class="adminForm">
        @csrf
        <label>Email</label>
        <input type="text" name="email" class="wideInput" autofocus>

        <label>Message</label>
        <textarea name="message"></textarea>

        <button type="submit">
            Submit
        </button>

        @if(isset($submitted))
            <p>Submitted</p>
        @endif
    </form>
@endsection
