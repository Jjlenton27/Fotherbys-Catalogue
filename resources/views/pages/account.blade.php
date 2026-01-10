@extends('layouts.layout')
@section('title', "Account")
@section('content')

    <p>NOTIFICATION PEREFENCES</p>

    <form method="POST" action="/account/updateprefs">
        @csrf
        <div style=" all:initial; vertical-align: middle; ">
            <input type="checkbox"
                name="emailPref"
                value="email"
                @if($notification_setting == 0 || $notification_setting == 1)
                    checked
                @endif>
            <label for="emailPref">Email</label>

            <input type="checkbox"
                name="phonePref"
                value="phone"
                @if($notification_setting == 0 || $notification_setting == 2)
                    checked
                @endif>
            <label for="phonePref">Phone</label>
        </div>

        <button type="submit"> Update </button>
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

    <form method="POST" action="/logout">
        @csrf
        <button type="submit"> Logout    </button>
    </form>

@endsection
