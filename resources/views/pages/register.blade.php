@extends('layouts.layout')
@section('title', "Account")
@section('content')

    <form method="POST" action="/register">
        @csrf
        <label>First Name</label>
        <input type="text"
            name="first_name"
            placeholder="Name"
            required
            autofocus>

        <label>Surname</label>
        <input type="text"
            name="surname"
            placeholder="Surname"
            required>

        <label>Address</label>
        <input type="text"
            name="address"
            placeholder="Address"
            required>

        <label>Town</label>
        <input type="text"
            name="town"
            placeholder="Town"
            required>

        <label>Postcode</label>
        <input type="text"
            name="postcode"
            placeholder="XXXXX"
            required>

        <label>Email</label>
        <input type="email"
            name="email"
            placeholder="mail@example.com"
            required>

        <label>Password</label>
        <input type="password"
            name="password"
            placeholder="•••••••"
            required>

        <label>Confirm Password</label>
        <input type="password"
            name="password_confirmation"
            placeholder="••••••••"
            required>

        @error('name')
            <span>{{ $message }}</span>
        @enderror

        @error('email')
            <span>{{ $message }}</span>
        @enderror

        @error('password')
            <span>{{ $message }}</span>
        @enderror

        @error('error')
                <span">{{ $message }}</span>
        @enderror

        <label>Remember me</label>
        <input type="checkbox"
            name="remember">

        <button type="submit" class="btn btn-primary btn-sm w-full">
            Create
        </button>
    </form>

@endsection
