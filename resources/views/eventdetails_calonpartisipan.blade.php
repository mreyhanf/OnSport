@extends('layouts.notabs')

@section('title', 'Event Details • OnSport')

@section('content')
<div class="container">
<h3>Event Details</h3>

@foreach ($eventdetails as $ed)

<div class="form-group row">
    <div class="col-sm-12 col-md-8">
        <span style="font-size: 1.875em; font-weight: bolder; word-wrap: break-word; white-space: normal">{{ $ed->judulevent }}</span>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="row" style="padding-top: 3px">
            <div class="col-md-2">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">

            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <a href="/event/{{ $ed->idevent }}/canceljoinreq/random" class="btn btn-danger rounded-pill" style="width: 153px">
                    Cancel join request
                </a>
            </div>
        </div>
    </div>
</div>

@php
    $gambarevent = $ed->gambar == "" ? "events_image/events_placeholder.png" :  $ed->gambar;
@endphp

<div>
    <div class="mb-3">
        <img src='/{{ $gambarevent }}' width="70%" alt="">
    </div>
    <div class="mb-2">
        <span style="font-size: 1.3em"><strong>Host:</strong></span>
    </div>

    @php
        $gambarhost = $host[0]->gambar == "" ? "users_image/userprofile_placeholder3.png" :  $host[0]->gambar;
    @endphp

    <div>
        <a href="/user/{{ $host[0]->username }}" class="mr-3" style="color: white; text-decoration: none">
            <img src="/{{ $gambarhost }}" alt="" width="70px" class="rounded-circle">
        </a>
        <a href="/user/{{ $host[0]->username }}" style="color: black; text-decoration: none">
            <span style="font-size: 1.3em">
                    {{'@' . $host[0]->username . ' - ' . $host[0]->name }}
            </span>
        </a>
    </div>
</div>

<hr>

<h4 style="margin-bottom: 30px">Details</h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="kategori" style="font-size: 1.3em"><strong >Kategori</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="kategori" style="font-size: 1.3em">
        {{ $ed->kategori }}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="tanggal"><strong style="font-size: 1.3em">Tanggal</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="tanggal" style="font-size: 1.3em">
        {{ $ed->tanggal }}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="jam"><strong style="font-size: 1.3em">Jam</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="jam" style="font-size: 1.3em">
        {{ date('H:i T', strtotime($ed->jam)) }}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="lokasi"><strong style="font-size: 1.3em">Lokasi</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="lokasi" style="font-size: 1.3em">
        {{ $ed->lokasi }}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="kota"><strong style="font-size: 1.3em">Kota</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="kota" style="font-size: 1.3em">
        {{ $ed->kota }}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="range_usia"><strong style="font-size: 1.3em">Range usia</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="range_usia" style="font-size: 1.3em">
        {{ $ed->rangeub }} - {{ $ed->rangeua }}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="level"><strong style="font-size: 1.3em">Level</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="level" style="font-size: 1.3em">
        {{ $ed->levelkeahlian }}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="kuota"><strong style="font-size: 1.3em">Kuota partisipan</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="kuota" style="font-size: 1.3em">
        {{ $ed->kuotapartisipan }}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="catatan"><strong style="font-size: 1.3em">Catatan</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="catatan" style="font-size: 1.3em">
        {{ $ed->catatan }}
    </div>
</div>

<hr>

<!-- partisipan -->
<h4 style="margin-bottom: 30px">Participants: {{count($userpartisipan)}}</h4>
@if (count($userpartisipan) == 0)
    <div class="d-flex justify-content-center">
        <span class="p-4" style="font-size: 20px; color: rgb(88, 88, 88)">No participants yet</span>
    </div>
@endif

@if (count($userpartisipan) > 0)
@foreach ($userpartisipan as $up)
@php
    $gambarpartisipan = $up->gambar == "" ? "users_image/userprofile_placeholder3.png" :  $up->gambar;
@endphp
<div class="row mb-4">
    <div class="col-sm-12">
        <a href="/user/{{ $up->username }}" class="mr-3" style="color: white; text-decoration: none">
            <img src="/{{ $gambarpartisipan }}" alt="" width="70px" class="rounded-circle">
        </a>
        <a href="/user/{{ $up->username }}" style="color: black; text-decoration: none">
            <span style="font-size: 1.3em">
                    {{'@' . $up->username . ' - ' . $up->name }}
            </span>
        </a>
    </div>
</div>

@endforeach
@endif

@endforeach

</div>
@endsection

