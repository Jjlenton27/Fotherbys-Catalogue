@extends('layouts.layout')
@section('title', "Login")
@section('content')

    <h2>Login</h2>

    {{-- https://laravel.com/learn/getting-started-with-laravel/basic-authentication-loginlogout --}}

    <form method="POST" action="/login">
        @csrf
        <label>Email</label>
        <input type="email"
            name="email"
            placeholder="mail@example.com"
            required
            autofocus>

        <label>Password</label>
        <input type="password"
            name="password"
            placeholder="•••••••"
            required>

        @error('error')
                <span">{{ $message }}</span>
        @enderror

        <label>Remember me</label>
        <input type="checkbox"
            name="remember">

        <button type="submit" class="btn btn-primary btn-sm w-full">
            Sign In
        </button>
    </form>

    <a href="/register">Create Account</a>

@endsection
