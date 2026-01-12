@extends('layouts.layout')
@section('title', "Catalouge")
@section('content')
    <h1>Selling</h1>
    <h3>selling with fotherbys</h3>
    <p>description of selling</p>

    <p>admin and back end need more disccusion with business users</p>
    <p>would require user to be logged in, </p>

    <h3>Selling Form</h3>
    @if (session('user_id'))
        <form method="POST" action="/sell/submit">
            @csrf
            <label>Title</label>
            <input type="text" name="title" required autofocus>

            <label>Subtitle</label>
            <input type="text" name="subtitle">

            <label>Summary</label>
            <textarea name="summary">
            </textarea>

            {{-- PARSE <P> TAGS IN AND OUT BEFORE SHOWING/STORING--}}
            <label>Description</label>
            <textarea name="description" required>
            </textarea>

            <label>Estimated Price</label>
            <input type="text" name="price" required>

            <label>Reserve Price</label>
            <input type="text" name="resprice">

            <label>LEGAL AGREEMENT JARGON</label>

            <button type="submit">
                Submit
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
    @else
        <p>To submit a sell request please log in</p>
    @endif
@endsection
