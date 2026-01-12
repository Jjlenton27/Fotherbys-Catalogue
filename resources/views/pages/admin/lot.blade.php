@extends('layouts.layout')
@section('title', "Manage Lot")
@section('content')

<p>page for managing auctions, allow adding removing lots chanigng title details etc</p>
    <form method="POST" action="/admin/lot/update/{{ $lot->id }}" enctype="multipart/form-data" class="adminForm">
        @csrf
        <input type="hidden" name="id" value={{ $lot->id }} required hidden>


        <label>Title</label>
        <input type="text"
            name="title"
            class="wideInput"
            value="{{ $lot->title }}"
            required
            autofocus>

        <label>Subtitle</label>
        <input type="text"
            name="subtitle"
            class="wideInput"
            value="{{ $lot->sub_title }}"
            required>

            {{-- paintings, drawings, photographic images, sculptures and carvings --}}


        <label>Category</label>
        <select name="category">
            <option value="painting" @if($lot->category == "painting") selected @endif>Painting</option>
            <option value="drawing" @if($lot->category == "drawing") selected @endif>Drawing</option>
            <option value="photograph" @if($lot->category == "photograph") selected @endif>Photograph</option>
            <option value="sculpture" @if($lot->category == "sculpture") selected @endif>Sculpture</option>
            <option value="carving" @if($lot->category == "carving") selected @endif>Carving</option>
        </select>

        <label>Summary</label>
        <textarea name="summary">
            {{ $lot->summary }}
        </textarea>

        {{-- PARSE <P> TAGS IN AND OUT BEFORE SHOWING/STORING--}}
        <label>Description</label>
        <textarea name="description" required>
            {{ $lot->description }}
        </textarea>

        <label>Image</label>
        <input type="file" name="image">



        <label>Price</label>
        <input type="text"
            name="price"
            value={{ $lot->price }}
            required>

        <label>Auction</label>
        <input type="text"
            name="auction"
            value={{ $lot->auction_id }}>

        <label>Seller</label>
        <input type="email"
            name="seller"
            class="wideInput"
            value="{{ $lot->user->email }}"
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

        @if($updated != null)
            <p>Updated</p>
        @endif

        {{-- REPLACE WITH DELETE --}}
        {{-- <button type="submit">
            Remove
        </button> --}}
    </form>
    <form method="POST" action="/admin/lot/delete/{{ $lot->id }}">
        @csrf
        <button type="submit" onclick="return confirm('Are you sure?')"> Delete </button>
    </form>
@endsection
