@extends('layouts.layout')
@section('title', "Admin")
@section('content')

<h3>Admin dashboard</h3>

<table class="sellRequestContainer">
    <thead>
        <tr>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contactRequests as $contactRequest)
            <tr class="sellRequestLine">
                <td>{{  $contactRequest->email }}</th>
                <td>{{  $contactRequest->message }}</th>
                <td><a href="/admin/markresponded/{{ $contactRequest->id }}">Mark Responded</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table class="sellRequestContainer">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Subtitle</th>
            <th scope="col">Summary</th>
            <th scope="col">Price</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sellRequests as $sellRequest)
            <tr class="sellRequestLine">
                <td>{{  $sellRequest->title }}</th>
                <td>{{  $sellRequest->sub_title }}</th>
                <td>{{ $sellRequest->summary }}</td>
                <td>£{{ $sellRequest->price }}</td>
                <td>{{ $sellRequest->user->email }}</td>
                <td><a href="/admin/sellrequest/{{ $sellRequest->id }}">View</a> </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
