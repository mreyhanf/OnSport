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
        <div class="col-md-8" style="padding-bottom: 15px">
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
        </div>
    </div>
</div>

<div class="container">

    <h3 style="padding: 8px; font-weight: bold;">Active Events</h3>

    @if ($events->isEmpty()) <!-- ($events->isEmpty()) -->
    <div style="padding: 15px;
    position: absolute;
    top: 65%;
    left: 50%;
    -ms-transform: translateX(-50%) translateY(-50%);
    -webkit-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);">
        <span style="font-size: 20px; color: rgb(88, 88, 88)">No events yet</span>
    </div>

@endif
@if ($events->isNotEmpty()) <!-- ($events->isNotEmpty()) -->
    @php
    $carddeckamount = ceil($events->count() / 3); // jumlah card-deck atau baris
    $eventsindex = 0;
    $lasteventsindex = $events->count() - 1;
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

<hr />

<h3 style="padding: 15px; font-weight: bold ">Recommendations</h3>

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
