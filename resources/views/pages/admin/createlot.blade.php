@extends('layouts.layout')
@section('title', "Create Lot")
@section('content')

    <form method="POST" action="/admin/lot/create">
        @csrf
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

        <button type="submit" class="btn btn-primary btn-sm w-full">
            Create
        </button>
    </form>
@endsection
