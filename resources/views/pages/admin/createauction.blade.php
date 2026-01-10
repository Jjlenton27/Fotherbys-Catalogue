@extends('layouts.layout')
@section('title', "Manage Auction")
@section('content')
    <form method="POST" action="/admin/auction/create" class="createForm">
        @csrf
        <label>Title</label>
        <input type="text" name="title" class="wideInput" required autofocus>

        <label>Summary</label>
        <input type="text" name="summary" class="wideInput" required>

        {{-- PARSE <P> TAGS IN AND OUT BEFORE SHOWING/STORING--}}
        <label>Description</label>
        <textarea type="text" name="description" required>
        </textarea>

        <label>Date</label>
        <input type="date" name="date" required>

        <label>Time</label>
        <input type="time" name="time" required>

        <button type="submit" class="btn btn-primary btn-sm w-full">
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
        @endif
    </form>
@endsection
