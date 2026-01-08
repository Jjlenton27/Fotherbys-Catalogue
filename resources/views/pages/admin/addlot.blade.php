@extends('layouts.layout')
@section('title', "Manage Auction")
@section('content')

    <form method="POST" action="/register">
        <label>Title</label>
        <textarea name="title" required autofocus>
        </textarea>

        <label>Subtitle</label>
        <textarea name="subtitle" required>
        </textarea>

        <label>Summary</label>
        <textarea name="summary" required>
        </textarea>

        {{-- PARSE <P> TAGS IN AND OUT BEFORE SHOWING/STORING--}}
        <label>Description</label>
        <textarea name="description" required>
        </textarea>

        <label>Price</label>
        <input type="textarea"
            name="price"
            required>

        <label>Seller</label>
        <input type="textarea"
            name="seller"
            required>

        @error('error')
                <span">{{ $message }}</span>
        @enderror

        <button type="submit" class="btn btn-primary btn-sm w-full">
            Create
        </button>
    </form>
@endsection
