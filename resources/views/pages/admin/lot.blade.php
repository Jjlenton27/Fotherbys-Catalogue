@extends('layouts.layout')
@section('title', "Manage Lot")
@section('content')

<p>page for managing auctions, allow adding removing lots chanigng title details etc</p>
    <form method="POST" action="/admin/lot/update/1">
        @csrf
        <input type="hidden" name="id" value={{ $lot->id }} required hidden>


        <label>Title</label>
        {{-- REPLACE WITH SINGLE LINE --}}
        <textarea name="title" required autofocus>
            {{ $lot->title }}
        </textarea>

        {{-- REPLACE WITH SINGLE LINE --}}
        <label>Subtitle</label>
        <textarea name="subtitle" required>
            {{ $lot->sub_title }}
        </textarea>

        {{-- REPLACE WITH SINGLE LINE --}}
        <label>Summary</label>
        <textarea name="summary">
            {{ $lot->summary }}
        </textarea>

        {{-- PARSE <P> TAGS IN AND OUT BEFORE SHOWING/STORING--}}
        <label>Description</label>
        <textarea name="description" required>
            {{ $lot->description }}
        </textarea>

        <label>Price</label>
        <input type="text"
            name="price"
            value={{ $lot->price }}
            required>

         <label>Auction</label>
        <input type="text"
            name="auction"
            value={{$lot->auction_id}}>

        <label>Seller</label>
        <input type="email"
            name="seller"
            value={{$lot->user->email}}
            required>

        @error('error')
                <span">{{ $message }}</span>
        @enderror

        <button type="submit">
            Create
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

        @if($updated != null)
            <p>Updated</p>
        @endif
@endif

        {{-- REPLACE WITH DELETE --}}
        {{-- <button type="submit">
            Remove
        </button> --}}
    </form>
@endsection
