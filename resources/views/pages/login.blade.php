@extends('layouts.layout')
@section('title', "Login")
@section('content')

    <h2>Login</h2>

    <form method="POST" action="/login" class="login">
        @csrf
        <label>Email</label>
        <input type="email"
            name="email"
            class = "email"
            placeholder="mail@example.com"
            required
            autofocus>

        <label>Password</label>
        <input type="password"
            name="password"
            placeholder="•••••••"
            required>

        <div style=" all:initial; vertical-align: middle; ">
            <label for = "remember">Remember me</label>
            <input type="checkbox"
                name="remember">
        </div>

        <button type="submit">
            Sign In
        </button>

        @if ($errors->any())
            {{-- Display validation errors --}}
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>

    <div style="text-align:center;">
        <a  ref="/register">Create Account</a>
    </div>

@endsection
