@extends('layouts.tabs')

@section('title', 'My Events')

@section('stylehighlighttab_myevents', 'background-color: #d6d6d6')
@section('stylecolortext_home', 'white')
@section('stylecolortext_myevents', 'black')
@section('stylecolortext_browse', 'white')
@section('stylecolortext_notifications', 'white')
@section('stylecolortext_profile', 'white')

@section('content')
<p>haloo</p>
<header>
<nav>
    <div class="container">
        <div class="navbar">
            <ul class="navbar-nav justify-content-center mx-auto">
                <li class="nav-item active" style="margin-right: 40px; background-color: #d6d6d6"><a class="nav-link" href="/home" style="color: black">Home</a></li>
                <li class="nav-item"  style="margin-right: 40px; margin-left: 40px; @yield('stylehighlighttab_myevents')"><a class="nav-link" href="/myevents" style="color: @yield('stylecolortext_myevents')">My Events</a></li>
                <li class="nav-item" style="margin-right: 40px; margin-left: 40px; @yield('stylehighlighttab_browse')"><a class="nav-link" href="" style="color: @yield('stylecolortext_browse')">Browse</a></li>
                <li class="nav-item" style="margin-right: 40px; margin-left: 40px; @yield('stylehighlighttab_notifications')"><a class="nav-link" href="" style="color: @yield('stylecolortext_notifications')">Notifications</a></li>
                <li class="nav-item" style="margin-left: 40px; @yield('stylehighlighttab_profile')"><a class="nav-link" href="" style="color: @yield('stylecolortext_profile')">Profile</a></li>
            </ul>
        </div>
    </div>
</nav>
</header>
@endsection
