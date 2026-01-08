@extends('layouts.layout')
@section('title', "Account")
@section('content')

    <p>NOTIFICATION PEREFENCES</p>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit"> Logout </button>
    </form>

@endsection
