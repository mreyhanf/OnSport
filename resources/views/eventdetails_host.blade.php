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
            <div class="col-sm-12 col-md-12 col-lg-5">
                <a href="/event/edit/{{$ed->idevent}}" class="btn btn-primary rounded-pill" style="width: 109px; margin-bottom: 5px">
                    Edit event
                </a>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-5">
                <form action="/event/delete" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="idevent" value="{{ $ed->idevent }}">
                    <button type="submit" class="btn btn-danger rounded-pill" id="deleteeventbutton" style="width: 109px">
                        Delete event
                    </button>
                </form>
                <!-- <a href="/event/delete/{{$ed->idevent}}" class="btn btn-danger rounded-pill" id="deleteevent" style="width: 109px">
                    Delete event
                </a>
                -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#deleteeventbutton").on('click', function confirmEventDeletion() {
        return confirm('Anda akan menghapus event ini. Apakah Anda yakin?')
    })
</script>

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
        <a href="/user/{{ $host[0]->username }}" target="_blank" class="mr-3" style="color: white; text-decoration: none">
            <img src="/{{ $gambarhost }}" alt="" width="70px" class="rounded-circle">
        </a>
        <a href="/user/{{ $host[0]->username }}" target="_blank" style="color: black; text-decoration: none">
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
    <div class="col-sm-12 col-md-8">
        <a href="/user/{{ $up->username }}" target="_blank" class="mr-3" style="color: white; text-decoration: none">
            <img src="/{{ $gambarpartisipan }}" alt="" width="70px" class="rounded-circle">
        </a>
        <a href="/user/{{ $up->username }}" target="_blank" style="color: black; text-decoration: none">
            <span style="font-size: 1.3em">
                    {{'@' . $up->username . ' - ' . $up->name }}
            </span>
        </a>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="row" style="padding-top: 3px">
            <div class="col-md-2">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-5 pt-1">

            </div>
            <div class="col-sm-12 col-md-12 col-lg-5 pt-1">
                <form action="/event/removeparticipant" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="idevent" value="{{ $ed->idevent }}">
                    <input type="hidden" name="username" value="{{ $up->username }}">
                    <button type="submit" class="btn btn-danger rounded-pill" style="width: 90px">
                        Remove
                    </button>
                </form>
                <!--
                <a href="/event/{{ $ed->idevent }}/removeparticipant/{{ $up->username }}" class="btn btn-danger rounded-pill" style="width: 90px">Remove</a>
                -->
            </div>
        </div>
    </div>
</div>

@endforeach
@endif

<hr>

<!-- Permintaan Bergabung / Calon Partisipan -->

<h4 style="margin-bottom: 30px">Join Requests: {{count($usercalonpartisipan)}}</h4>
@if (!$ed->statuspenerimaan)
    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="font-size: 1.3em">
        <strong>Kuota partisipan telah penuh!</strong> Anda tidak dapat menerima permintaan bergabung lagi. Anda dapat menghapus partisipan atau menunggu partisipan membatalkan partisipasinya.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->get('erroraccept'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 1.3em">
    <strong>{{ session()->get('erroraccept') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (count($usercalonpartisipan) == 0)
    <div class="d-flex justify-content-center">
        <span class="p-4" style="font-size: 20px; color: rgb(88, 88, 88)">No join requests yet</span>
    </div>
@endif

@if (count($usercalonpartisipan) > 0)
@foreach ($usercalonpartisipan as $ucp)
@php
    $gambarcalonpartisipan = $ucp->gambar == "" ? "users_image/userprofile_placeholder3.png" :  $ucp->gambar;
@endphp
<div class="row mb-4">
    <div class="col-sm-12 col-md-8">
        <a href="/user/{{ $ucp->username }}" target="_blank" class="mr-3" style="color: white; text-decoration: none">
            <img src="/{{ $gambarcalonpartisipan }}" alt="" width="70px" class="rounded-circle">
        </a>
        <a href="/user/{{ $ucp->username }}" target="_blank" style="color: black; text-decoration: none">
            <span style="font-size: 1.3em">
                    {{'@' . $ucp->username . ' - ' . $ucp->name }}
            </span>
        </a>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="row" style="padding-top: 3px">
            <div class="col-md-2">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-5 pt-1">
                @if ($ed->statuspenerimaan)
                    <form action="/event/accjoinreq" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="idevent" value="{{ $ed->idevent }}">
                        <input type="hidden" name="username" value="{{ $ucp->username }}">
                        <button type="submit" class="btn btn-success rounded-pill" style="width: 90px; margin-bottom: 5px">
                            Accept
                        </button>
                    </form>
                    <!--
                    <a href="/event/{{ $ed->idevent }}/accjoinreq/{{ $ucp->username }}" class="btn btn-success rounded-pill" style="width: 90px; margin-bottom: 5px">
                        Accept
                    </a>
                    -->
                @else
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="idevent" value="">
                        <input type="hidden" name="idevent" value="">
                        <button type="submit" class="btn btn-success rounded-pill" style="width: 90px; margin-bottom: 5px" disabled>
                            Accept
                        </button>
                    </form>
                    <!--
                    <a href="" class="btn btn-success rounded-pill" style="width: 90px; margin-bottom: 5px; pointer-events: none; cursor: default; opacity: 0.5">
                        Accept
                    </a>
                    -->
                @endif
            </div>
            <div class="col-sm-12 col-md-12 col-lg-5 pt-1">
                <form action="/event/decjoinreq" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="idevent" value="{{ $ed->idevent }}">
                    <input type="hidden" name="username" value="{{ $ucp->username }}">
                    <button type="submit" class="btn btn-danger rounded-pill" style="width: 90px">
                        Decline
                    </button>
                </form>
                <!--
                <a href="/event/{{ $ed->idevent }}/decjoinreq/{{ $ucp->username }}" class="btn btn-danger rounded-pill" style="width: 90px">
                    Decline
                </a>
                -->
            </div>
        </div>
    </div>
</div>

@endforeach
@endif

@endforeach

</div>
@endsection

