@extends('layouts.layout')
@section('title', "Manage Auction")
@section('content')

<p>page for managing auctions, allow adding removing lots chanigng title details etc</p>

    <form method="POST" action="/register">
        <label>Title</label>
        <input type="text"
            name="title"
            value={{  }}
            required
            autofocus>

        <label>Summary</label>
        <input type="text"
            name="summary"
            value={{  }}
            required>

        {{-- PARSE <P> TAGS IN AND OUT BEFORE SHOWING/STORING--}}
        <label>Description</label>
        <input type="text"
            name="description"
            value={{  }}
            required>

        <label>Date</label>
        <input type="date"
            name="date"
            value={{  }}
            required>

        <label>Time</label>
        <input type="time"
            name="time"
            value={{  }}
            required>

        @error('error')
                <span">{{ $message }}</span>
        @enderror

        <button type="submit" class="btn btn-primary btn-sm w-full">
            Create
        </button>
    </form>

@endsection
