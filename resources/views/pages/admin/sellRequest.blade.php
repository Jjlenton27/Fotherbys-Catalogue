@extends('layouts.layout')
@section('title', "Admin")
@section('content')

<form method="POST" action="/admin/sellrequest/action" enctype="multipart/form-data", class="adminForm">
        @csrf
        <input type="hidden" name="id" value={{ $sellRequest->id }} required hidden>

        <label>Title</label>
        <input type="text"
            name="title"
            class="wideInput"
            value="{{ $sellRequest->title }}"
            required
            autofocus>

        <label>Subtitle</label>
        <input type="text"
            name="subtitle"
            class="wideInput"
            value="{{ $sellRequest->sub_title }}"
            required>

        {{-- paintings, drawings, photographic images, sculptures and carvings --}}
        <label>Category</label>
        <select name="category">
            <option value="painting" @if($sellRequest->category == "painting") selected @endif>Painting</option>
            <option value="drawing" @if($sellRequest->category == "drawing") selected @endif>Drawing</option>
            <option value="photograph" @if($sellRequest->category == "photograph") selected @endif>Photograph</option>
            <option value="sculpture" @if($sellRequest->category == "sculpture") selected @endif>Sculpture</option>
            <option value="carving" @if($sellRequest->category == "carving") selected @endif>Carving</option>
        </select>

        <label>Summary</label>
        <textarea name="summary">
            {{ $sellRequest->summary }}
        </textarea>

        {{-- PARSE <P> TAGS IN AND OUT BEFORE SHOWING/STORING--}}
        <label>Description</label>
        <textarea name="description" required>
            {{ $sellRequest->description }}
        </textarea>

        <label>Price</label>
        <input type="text"
            name="price"
            value={{ $sellRequest->price }}
            required>

        <label>Auction</label>
        <input type="text"
            name="auction">

        <label>Seller</label>
        <input type="email"
            name="seller"
            class="wideInput"
            value="{{ $sellRequest->user->email }}"
            required>

        <button type="submit" name="verdict" value="approve">
            Approve
        </button>
        <button type="submit" name="verdict" value="deny">
            Deny
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

@endsection
