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
    <div class="row mb-4">
        <div class="col-sm-12 col-md-8 col-lg-10">
            <h3 style="padding: 8px; font-weight: bold;">Active Events</h3>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-2">
            <a href="/createevents" class="btn btn-primary rounded-pill" style="width: 109px; margin-top: 7px; margin-bottom: 5px">
                Create Event
            </a>
        </div>
    </div>

    <div>
        <h4 style="padding: 8px; font-weight: bold;">Created</h4>

    @if ($eventscreated->isEmpty()) <!-- ($events->isEmpty()) -->
    <div class="d-flex justify-content-center">
        <span class="p-4" style="font-size: 20px; color: rgb(88, 88, 88)">No events yet</span>
    </div>
    @endif
    @if ($eventscreated->isNotEmpty()) <!-- ($events->isNotEmpty()) -->
    @php
    $carddeckamount = ceil($eventscreated->count() / 3); // jumlah card-deck atau baris
    $eventscreatedindex = 0;
    $lasteventscreatedindex = $eventscreated->count() - 1;
    for ($i = 1; $i <= $carddeckamount; $i++) {
        echo '<div class="row card-deck mb-4">';
        for ($j = $eventscreatedindex; $j <= $eventscreatedindex + 2 && $j <= $lasteventscreatedindex; $j++) {
            // card deck consisting of 3 cards max
                $gambar = $eventscreated[$j]->gambar == "" ? "events_image/events_placeholder.png" :  $eventscreated[$j]->gambar;
                $judul = strlen($eventscreated[$j]->judulevent) > 21 ? substr($eventscreated[$j]->judulevent, 0, 21) . "..." : $eventscreated[$j]->judulevent;
                echo '<div class="col-sm-12 col-xl-4">
                <div class="card" style="min-height: 324px; max-width: 400px; min-width: 200px">
                    <a href="/event/details/' . $eventscreated[$j]->idevent . '">
                        <img class="card-img-top" src="/' . $gambar . '" alt="" height="178">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title" style="letter-spacing: 0.2px; font-weight: bolder"><a href="/event/details/' . $eventscreated[$j]->idevent . '" style="text-decoration: none; color: rgb(29, 153, 255)">' . $judul . '</a></h5>
                        <div class="row">
                            <div class="col-6">
                                <small>Kategori: ' . $eventscreated[$j]->kategori . '</small>
                            </div>
                            <div class="col-6">
                                <small>Tanggal: ' . date('d-m-Y', strtotime($eventscreated[$j]->tanggal)) . '</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <small>Slot: ' . $jumlahpartisipancreated[$j] . '/' . $eventscreated[$j]->kuotapartisipan . '</small>
                            </div>
                            <div class="col-6">
                                <small>Level: ' . $eventscreated[$j]->levelkeahlian . '</small>
                            </div>
                        </div>
                    </div>
                </div>
                </div>';
        }
        echo '</div>';
        $eventscreatedindex += 3;
    }
    @endphp
    @endif
</div>

<div>
    <h4 style="padding: 8px; font-weight: bold;">Joined</h4>
    @if (count($eventsjoined) == 0)
    <div class="d-flex justify-content-center">
        <span class="p-4" style="font-size: 20px; color: rgb(88, 88, 88)">No events yet</span>
    </div>

    @endif
    @if (count($eventsjoined) > 0)
    @php
    $carddeckamount = ceil(count($eventsjoined) / 3); // jumlah card-deck atau baris
    $eventsjoinedindex = 0;
    $lasteventsjoinedindex = count($eventsjoined) - 1;
    for ($i = 1; $i <= $carddeckamount; $i++) {
        echo '<div class="row card-deck mb-4">';
        for ($j = $eventsjoinedindex; $j <= $eventsjoinedindex + 2 && $j <= $lasteventsjoinedindex; $j++) {
            // card deck consisting of 3 cards max
                $gambar = $eventsjoined[$j]->gambar == "" ? "events_image/events_placeholder.png" :  $eventsjoined[$j]->gambar;
                $judul = strlen($eventsjoined[$j]->judulevent) > 21 ? substr($eventsjoined[$j]->judulevent, 0, 21) . "..." : $eventsjoined[$j]->judulevent;
                echo '<div class="col-sm-12 col-xl-4">
                <div class="card" style="min-height: 324px; max-width: 400px; min-width: 200px">
                    <a href="/event/details/' . $eventsjoined[$j]->idevent . '">
                        <img class="card-img-top" src="/' . $gambar . '" alt="" height="178">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title" style="letter-spacing: 0.2px; font-weight: bolder"><a href="/event/details/' . $eventsjoined[$j]->idevent . '" style="text-decoration: none; color: rgb(29, 153, 255)">' . $judul . '</a></h5>
                        <div class="row">
                            <div class="col-6">
                                <small>Kategori: ' . $eventsjoined[$j]->kategori . '</small>
                            </div>
                            <div class="col-6">
                                <small>Tanggal: ' . date('d-m-Y', strtotime($eventsjoined[$j]->tanggal)) . '</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <small>Slot: ' . $jumlahpartisipanjoined[$j] . '/' . $eventsjoined[$j]->kuotapartisipan . '</small>
                            </div>
                            <div class="col-6">
                                <small>Level: ' . $eventsjoined[$j]->levelkeahlian . '</small>
                            </div>
                        </div>
                    </div>
                </div>
                </div>';
        }
        echo '</div>';
        $eventsjoinedindex += 3;
    }
    @endphp
    @endif
</div>

<hr>

<div>
<h3 style="padding: 8px; font-weight: bold ">Recommendations</h3>
@if ($eventsrec->isEmpty()) <!-- ($events->isEmpty()) -->
<div class="d-flex justify-content-center">
    <span class="p-4" style="font-size: 20px; color: rgb(88, 88, 88)">No events yet</span>
</div>
@endif
@if ($eventsrec->isNotEmpty()) <!-- ($events->isNotEmpty()) -->
@php
$carddeckamount = ceil($eventsrec->count() / 3); // jumlah card-deck atau baris
$eventsrecindex = 0;
$lasteventsrecindex = $eventsrec->count() - 1;
for ($i = 1; $i <= $carddeckamount; $i++) {
    echo '<div class="row card-deck mb-4">';
    for ($j = $eventsrecindex; $j <= $eventsrecindex + 2 && $j <= $lasteventsrecindex; $j++) {
        // card deck consisting of 3 cards max
            $gambar = $eventsrec[$j]->gambar == "" ? "events_image/events_placeholder.png" :  $eventsrec[$j]->gambar;
            $judul = strlen($eventsrec[$j]->judulevent) > 21 ? substr($eventsrec[$j]->judulevent, 0, 21) . "..." : $eventsrec[$j]->judulevent;
            echo '<div class="col-sm-12 col-xl-4">
            <div class="card" style="min-height: 324px; max-width: 400px; min-width: 200px">
                <a href="/event/details/' . $eventsrec[$j]->idevent . '">
                    <img class="card-img-top" src="/' . $gambar . '" alt="" height="178">
                </a>
                <div class="card-body">
                    <h5 class="card-title" style="letter-spacing: 0.2px; font-weight: bolder"><a href="/event/details/' . $eventsrec[$j]->idevent . '" style="text-decoration: none; color: rgb(29, 153, 255)">' . $judul . '</a></h5>
                    <div class="row">
                        <div class="col-6">
                            <small>Kategori: ' . $eventsrec[$j]->kategori . '</small>
                        </div>
                        <div class="col-6">
                            <small>Tanggal: ' . date('d-m-Y', strtotime($eventsrec[$j]->tanggal)) . '</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <small>Slot: ' . $jumlahpartisipanrec[$j] . '/' . $eventsrec[$j]->kuotapartisipan . '</small>
                        </div>
                        <div class="col-6">
                            <small>Level: ' . $eventsrec[$j]->levelkeahlian . '</small>
                        </div>
                    </div>
                </div>
            </div>
            </div>';
    }
    echo '</div>';
    $eventsrecindex += 3;
}
@endphp
@endif
</div>

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

