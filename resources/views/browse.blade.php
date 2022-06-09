@extends('layouts.tabs')

@section('title', 'Browse • OnSport')

@section('stylehighlighttab_browse', 'background-color: #d6d6d6')
@section('activenav_browse', 'active')
@section('stylecolortext_home', 'white')
@section('stylecolortext_myevents', 'white')
@section('stylecolortext_browse', 'black')
@section('stylecolortext_notifications', 'white')
@section('stylecolortext_profile', 'white')

@section('content')
<form action="/browse/filter" method="post">
<div class="container">
    <div>
    <a class="navbar-brand">Filter</a>
    </div>
</div>
<div class="container">
    <div class="row">
    <div class="col-sm-2">
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="kategori[]" id="Sepak bola/Futsal" value="Sepak bola/Futsal">
        <label class="form-check-label" font-size="large" for="Sepakbola/Futsal">Sepak bola/Futsal</label>
    </div>
    </div>
    <div class="col-sm-2">
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="kategori[]" id="Basket" value="Basket">
        <label class="form-check-label" for="Basket">Basket</label>
    </div>
    </div>
    <div class="col-sm-2">
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="kategori[]" id="Voli" value="Voli">
        <label class="form-check-label" for="Voli">Voli</label>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2">
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="kategori[]" id="Bulutangkis" value="Bulutangkis">
        <label class="form-check-label" for="Bulutangkis">Bulutangkis</label>
    </div>
    </div>
    <div class="col-sm-2">
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="kategori[]" id="Bersepeda" value="Bersepeda">
        <label class="form-check-label" for="Bersepeda">Bersepeda</label>
    </div>
    </div>
    <div class="col-sm-2">
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="kategori[]" id="Lain-lain" value="Lain-lain">
        <label class="form-check-label" for="Lain-lain">Lain-lain</label>
    </div>
    </div>
    </div>
</div>
    {{csrf_field()}}
<div class="container">
    <div>
    <input type="submit" value="Terapkan" class="btn btn-primary" style="width: 100px">
    </div>
</div>
</form>
<div class="container">
<hr>

@php
    if (Session::has('events')) {
        $events = Session::get('events');
        $jumlahpartisipan = Session::get('jumlahpartisipan');
    }
@endphp

<div class="container">
    <div class="alert alert-info alert-dismissible fade show" role="alert" style="text-align: center">
        <strong>Hanya event yang aktif (belum sampai jadwal) dan berlokasi di kota Anda yang ditampilkan di halaman ini. Ubah kota di profile Anda untuk melihat event di kota lain.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div>
    @if (empty($events))
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
    @if (!empty($events))
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
