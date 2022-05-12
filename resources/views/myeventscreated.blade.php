@extends('layouts.tabs')

@section('title', 'My Events • OnSport')

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
                <li class="nav-item active px-2" style="background-color: rgb(170, 170, 170)"><a class="nav-link" href="#" style="color: black">Created</a></li>
                <li class="nav-item px-2"><a class="nav-link" href="/myevents/joined" >Joined</a></li>
                <li class="nav-item px-2"><a class="nav-link" href="/myevents/requested">Requested</a></li>
            </ul>
        </div>
    </div>
    </div>
</nav>

<div class="container">
    <div class="row mb-4">
        <div class="col-sm-12 col-lg-4">
            <div class="card">
                <a href="">
                    <img class="card-img-top" src="/events_image/Screenshot.png" alt="" width="348px">
                </a>
                <div class="card-body">
                    <a href=""><h5 class="card-title" style="color: rgb(0, 0, 0)">Judul Event Panjang Max Berapa Ya HAHAHAHHAHAHAHHA</h5></a>
                    <div class="row">
                        <div class="col-6">
                            <small>Kategori: Bulu tangkis</small>
                        </div>
                        <div class="col-6">
                            <small>Tanggal: 26-06-2022</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <small>Slot: 0/3</small>
                        </div>
                        <div class="col-6">
                            <small>Level Keahlian: All</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="card">
                <a href="">
                    <img class="card-img-top" src="/events_image/Screenshot.png" alt="">
                </a>
                <div class="card-body">
                    <a href=""><h5 class="card-title">Judul Event Panjang Max Berapa Ya A</h5></a>
                    <div class="row">
                        <div class="col-6">
                            <small>Kategori: Bulu tangkis</small>
                        </div>
                        <div class="col-6">
                            <small>Tanggal: 26-06-2022</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <small>Slot: 0/3</small>
                        </div>
                        <div class="col-6">
                            <small>Level Keahlian: All</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="card">
                <a href="">
                    <img class="card-img-top" src="/events_image/Screenshot.png" alt="">
                </a>
                <div class="card-body">
                    <a href=""><h5 class="card-title">WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW</h5></a>
                    <div class="row">
                        <div class="col-6">
                            <small>Kategori: Bulu tangkis</small>
                        </div>
                        <div class="col-6">
                            <small>Tanggal: 26-06-2022</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <small>Slot: 0/3</small>
                        </div>
                        <div class="col-6">
                            <small>Level Keahlian: All</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-sm-12 col-lg-4">
            <div class="card">
                <a href="">
                    <img class="card-img-top" src="" alt="">
                </a>
                <div class="card-body">
                    <a href=""><h5 class="card-title">Judul Event Panjang Max Berapa Ya</h5></a>
                    <div class="row">
                        <div class="col-6">
                            <small>Kategori: Bulu tangkis</small>
                        </div>
                        <div class="col-6">
                            <small>Tanggal: 26-06-2022</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <small>Slot: 0/3</small>
                        </div>
                        <div class="col-6">
                            <small>Level Keahlian: All</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="card">
                <a href="">
                    <img class="card-img-top" src="" alt="">
                </a>
                <div class="card-body">
                    <a href=""><h5 class="card-title">Judul Event Panjang Max Berapa Ya</h5></a>
                    <div class="row">
                        <div class="col-6">
                            <small>Kategori: Bulu tangkis</small>
                        </div>
                        <div class="col-6">
                            <small>Tanggal: 26-06-2022</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <small>Slot: 0/3</small>
                        </div>
                        <div class="col-6">
                            <small>Level Keahlian: All</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="card">
                <a href="">
                    <img class="card-img-top" src="" alt="">
                </a>
                <div class="card-body">
                    <a href=""><h5 class="card-title">Judul Event Panjang Max Berapa Ya</h5></a>
                    <div class="row">
                        <div class="col-6">
                            <small>Kategori: Bulu tangkis</small>
                        </div>
                        <div class="col-6">
                            <small>Tanggal: 26-06-2022</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <small>Slot: 0/3</small>
                        </div>
                        <div class="col-6">
                            <small>Level Keahlian: All</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
