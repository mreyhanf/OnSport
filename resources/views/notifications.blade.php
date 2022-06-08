@extends('layouts.tabs')

@section('title', 'Home • OnSport')

@section('stylehighlighttab_notifications', 'background-color: #d6d6d6')
@section('activenav_notifications', 'active')
@section('stylecolortext_home', 'white')
@section('stylecolortext_myevents', 'white')
@section('stylecolortext_browse', 'white')
@section('stylecolortext_notifications', 'black')
@section('stylecolortext_profile', 'white')

@section('content')

<div class="container">

    @if ($notifications->isEmpty()) <!-- ($events->isEmpty()) -->
    <div style="padding: 15px;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translateX(-50%) translateY(-50%);
    -webkit-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);">
        <span style="font-size: 20px; color: rgb(88, 88, 88)">No notifications yet</span>
    </div>
@endif

@if ($notifications->isNotEmpty())
@foreach ($notifications as $notif)
    @php
        $notif_counter = 1;
    @endphp
    @if ($notif->jenis == 1)
        <div class="card" style="width: 100%; margin-bottom: 15px">
            <div class="card-body">
                <h4>Penghapusan event untuk <strong>"{{$judulevent[$notif_counter]}}"</strong><h4>
            <p>
                {{'@' . $notif->usernamepg}} menghapus event "{{$judulevent[$notif_counter]}}" yang Anda ikuti sebelumnya.
            </p>
            </div>
        </div>
    @endif
    @if ($notif->jenis == 2)
        <div class="card" style="width: 100%; margin-bottom: 15px">
            <div class="card-body">
                <h4>Pengeluaran dari event <strong>"{{$judulevent[$notif_counter]}}"</strong><h4>
            <p>
                {{'@' . $notif->usernamepg}} mengeluarkan Anda dari event "{{$judulevent[$notif_counter]}}".
            </p>
            </div>
        </div>
    @endif
    @if ($notif->jenis == 3)
        <div class="card" style="width: 100%; margin-bottom: 15px">
            <div class="card-body">
                <h4>Penerimaan permintaan bergabung untuk event <strong>"{{$judulevent[$notif_counter]}}"</strong><h4>
            <p>
                {{'@' . $notif->usernamepg}} menerima Anda sebagai partisipan untuk event "{{$judulevent[$notif_counter]}}".
            </p>
            </div>
        </div>
    @endif
    @if ($notif->jenis == 4)
        <div class="card" style="width: 100%; margin-bottom: 15px">
            <div class="card-body">
                <h4>Penolakan permintaan bergabung untuk event <strong>"{{$judulevent[$notif_counter]}}"</strong><h4>
            <p>
                {{'@' . $notif->usernamepg}} menolak Anda sebagai partisipan untuk event "{{$judulevent[$notif_counter]}}".
            </p>
            </div>
        </div>
    @endif
    @if ($notif->jenis == 5)
        <div class="card" style="width: 100%; margin-bottom: 15px">
            <div class="card-body">
                <h4>Permintaan bergabung untuk event <strong>"{{$judulevent[$notif_counter]}}"</strong><h4>
            <p>
                {{'@' . $notif->usernamepg}} meminta bergabung pada event "{{$judulevent[$notif_counter]}}" yang Anda buat.
            </p>
            </div>
        </div>
    @endif
    @if ($notif->jenis == 6)
        <div class="card" style="width: 100%; margin-bottom: 15px">
            <div class="card-body">
                <h4>Perubahan detail untuk event <strong>"{{$judulevent[$notif_counter]}}"</strong><h4>
            <p>
                {{'@' . $notif->usernamepg}} mengubah detail untuk event "{{$judulevent[$notif_counter]}}".
            </p>
            </div>
        </div>
    @endif
    @if ($notif->jenis == 7)
    <div class="card" style="width: 100%; margin-bottom: 15px">
        <div class="card-body">
            <h4>Pembatalan partisipasi untuk event <strong>"{{$judulevent[$notif_counter]}}"</strong><h4>
        <p>
            {{'@' . $notif->usernamepg}} membatalkan partisipasinya pada event "{{$judulevent[$notif_counter]}}" yang Anda buat.
        </p>
        </div>
    </div>
@endif
    @php
         $notif_counter ++;
    @endphp
@endforeach
@endif
</div>

@endsection
