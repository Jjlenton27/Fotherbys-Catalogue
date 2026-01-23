@extends('layouts.layout')
@section('title', "Create Lot")
@section('content')

    <form method="POST" action="/admin/lot/create" class="adminForm">
        @csrf
        <label>Title</label>
        <input type="text" name="title" class="wideInput" required autofocus>

        <label>Subtitle</label>
        <input type="text" name="subtitle" class="wideInput">

        <label>Category</label>
        <select name="category">
            <option value="painting">Painting</option>
            <option value="drawing" >Drawing</option>
            <option value="photograph">Photograph</option>
            <option value="sculpture">Sculpture</option>
            <option value="carving">Carving</option>
        </select>

        <label>Summary</label>
        <textarea name="summary">
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
        <input type="textarea" name="seller" class="wideInput" required>

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

        <button type="submit">
            Create
        </button>
    </form>
@endsection
