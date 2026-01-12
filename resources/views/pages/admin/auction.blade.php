@extends('layouts.layout')
@section('title', "Manage Auction")
@section('content')

<p>page for managing auctions, allow adding removing lots chanigng title details etc</p>

    <form method="POST" action="/admin/auction/update/{{ $auction->id }}" class="adminForm">
        @csrf
        <label>Title</label>
        <input type="text"
            name="title"
            class="wideInput"
            value="{{ $auction->title }}"
            required
            autofocus>

        <label>Summary</label>
        <input type="text"
            name="summary"
            class="wideInput"
            value="{{ $auction->summary }}"
            required>

        {{-- PARSE <P> TAGS IN AND OUT BEFORE SHOWING/STORING--}}
        <label>Description</label>
        <textarea type="text" name="description" required>
            {{ $auction->description }}
        </textarea>

        <label>Date</label>
        <input type="date"
            name="date"
            value={{ $auction->auction_date }}
            required>

        <label>Time</label>
        <input type="time"
            name="time"
            value={{ $auction->auction_time }}
            required>

        <button type="submit">
            Update
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
    <form method="POST" action="/admin/auction/delete/{{ $auction->id }}">
        @csrf
        <button type="submit" onclick="return confirm('Are you sure?')"> Delete </button>
    </form>
@endsection
