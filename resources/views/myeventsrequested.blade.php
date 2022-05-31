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
                <li class="nav-item px-2 rounded-pill"><a class="nav-link" href="/myevents/created" style="text-align: center">Created</a></li>
                <li class="nav-item px-2 rounded-pill"><a class="nav-link" href="/myevents/joined" style="text-align: center">Joined</a></li>
                <li class="nav-item active px-2 rounded-pill" style="background-color: rgb(170, 170, 170); text-align: center"><a class="nav-link" href="#"><strong>Requested</strong></a></li>
            </ul>
        </div>
    </div>
    </div>
</nav>

<div class="container">

@if (count($events) == 0)
    <div style="padding: 15px;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translateX(-50%) translateY(-50%);
    -webkit-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);">
        <span style="font-size: 20px; color: rgb(88, 88, 88)">No events yet</span>
    </div>

@endif
@if (count($events) > 0)
    @php
    $carddeckamount = ceil(count($events) / 3); // jumlah card-deck atau baris
    $eventsindex = 0;
    $lasteventsindex = count($events) - 1;
    for ($i = 1; $i <= $carddeckamount; $i++) {
        echo '<div class="row card-deck mb-4">';
        for ($j = $eventsindex; $j <= $eventsindex + 2 && $j <= $lasteventsindex; $j++) {
            // card deck consisting of 3 cards max
                $gambar = $events[$j]->gambar == "" ? "events_image/events_placeholder.png" :  $events[$j]->gambar;
                $judul = strlen($events[$j]->judulevent) > 21 ? substr($events[$j]->judulevent, 0, 21) . "..." : $events[$j]->judulevent;
                echo '<div class="col-sm-12 col-xl-4">
                <div class="card" style="min-height: 324px; max-width: 400px; min-width: 200px">
                    <a href="/event/details/' . $events[$j]->idevent . '">
                        <img class="card-img-top" src="/' . $gambar . '" alt="" height="178">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title" style="letter-spacing: 0.2px; font-weight: bolder"><a href="/event/details/' . $events[$j]->idevent . '" style="text-decoration: none; color: rgb(29, 153, 255)">' . $judul . '</a></h5>
                        <div class="row">
                            <div class="col-6">
                                <small>Kategori: ' . $events[$j]->kategori . '</small>
                            </div>
                            <div class="col-6">
                                <small>Tanggal: ' . date('d-m-Y', strtotime($events[$j]->tanggal)) . '</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <small>Slot: ' . $jumlahpartisipan[$j] . '/' . $events[$j]->kuotapartisipan . '</small>
                            </div>
                            <div class="col-6">
                                <small>Level: ' . $events[$j]->levelkeahlian . '</small>
                            </div>
                        </div>
                    </div>
                </div>
                </div>';
        }
        echo '</div>';
        $eventsindex += 3;
    }
    @endphp
@endif

</div>


<script>
    const collection_card_title = document.getElementsByClassName("card-title");
    for (let i = 0; i < collection_card_title.length; i++) {
        collection_card_title[i].addEventListener('mouseover', event => {
            const {target} = event;
            mouseoverChild(target);
        });

        collection_card_title[i].addEventListener('mouseout', event => {
            const {target} = event;
            mouseoutChild(target);
        });

        function mouseoverChild(element){
            element.style.color = 'rgb(0, 89, 206)';
        }

        function mouseoutChild(element){
            element.style.color = 'rgb(29, 153, 255)';
        }
    }
</script>
@endsection
