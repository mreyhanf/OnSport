@extends('layouts.tabs')

@section('title', 'Home • OnSport')

@section('stylehighlighttab_home', 'background-color: #d6d6d6')
@section('activenav_home', 'active')
@section('stylecolortext_home', 'black')
@section('stylecolortext_myevents', 'white')
@section('stylecolortext_browse', 'white')
@section('stylecolortext_notifications', 'white')
@section('stylecolortext_profile', 'white')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <div class="card">
                <a href="createevents" style="postion:fixed;">
                <button type="button" formaction="createevents" class="btn btn-primary" style="width: 120px">Create Event</button>
            </div>
        </div>
    </div>
</div>
@endsection
