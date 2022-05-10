@extends('layouts.tabs')

@section('title', 'My Events')

@section('stylehighlighttab_myevents', 'background-color: #d6d6d6')
@section('activenav_myevents', 'active')
@section('stylecolortext_home', 'white')
@section('stylecolortext_myevents', 'black')
@section('stylecolortext_browse', 'white')
@section('stylecolortext_notifications', 'white')
@section('stylecolortext_profile', 'white')

@section('content')
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
    <a class="navbar-brand">Your Events</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMyEvents" aria-controls="navbarMyEvents" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMyEvents">
        <div class="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item px-2"><a class="nav-link" href="/myevents/created" style="color: black">Created</a></li>
                <li class="nav-item active px-2" style="background-color: rgb(170, 170, 170)"><a class="nav-link" href="#" >Joined</a></li>
                <li class="nav-item px-2"><a class="nav-link" href="/myevents/requested">Requested</a></li>
            </ul>
        </div>
    </div>
    </div>
</nav>
@endsection
