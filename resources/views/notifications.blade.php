@extends('layouts.tabs')

@section('title', 'Notifications • OnSport')

@section('stylehighlighttab_notifications', 'background-color: #d6d6d6')
@section('activenav_notifications', 'active')
@section('stylecolortext_home', 'white')
@section('stylecolortext_myevents', 'white')
@section('stylecolortext_browse', 'white')
@section('stylecolortext_notifications', 'black')
@section('stylecolortext_profile', 'white')

@section('content')

<div class="container">
    <div class="row ml-1 mb-4">
        <div class="col-xs-5 offset-md-1">

        </div>
        <form action="/notifications/clear" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="usernamepn" value="{{ Auth::user()->username }}">
            <button type="submit" class="btn btn-outline-danger" id="clear-notifications-button">
                <span class="oi oi-trash" title="trash" aria-hidden="true" style="margin-right: 5px"></span> Clear notifications
            </button>
        </form>
    </div>

    <script type="text/javascript">
        $("#clear-notifications-button").on('click', function confirmNotificationsDeletion() {
            return confirm('Anda akan menghapus seluruh notifikasi Anda. Apakah Anda yakin?')
        })
    </script>

    @if ($notifications->isEmpty()) <!-- ($notifications->isEmpty()) -->
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
@if ($notif->jenis == 1)
        <div class="card" style="width: 80%; margin: 0 auto; margin-bottom: 15px">
            <div class="card-body">
                <h4>Penghapusan event untuk <strong>"{{$notif->judulevent}}"</strong><h4>
            <p style="font-size: 15px">
                {{'@' . $notif->usernamepg}} menghapus event "{{$notif->judulevent}}" yang Anda ikuti sebelumnya.
            </p>
            <span class="text-muted" style="font-size: 0.9rem">{{ $notif->created_at }}</span>
            </div>
        </div>
    @endif
@if ($notif->jenis == 2)
        <div class="card" style="width: 80%; margin: 0 auto; margin-bottom: 15px">
            <div class="card-body">
                <h4>Pengeluaran dari event <strong>"{{$notif->judulevent}}"</strong></h4>
            <p style="font-size: 15px">
                {{'@' . $notif->usernamepg}} mengeluarkan Anda dari event "{{$notif->judulevent}}".
            </p>
            <span class="text-muted" style="font-size: 0.9rem">{{ $notif->created_at }}</span>
            </div>
        </div>
    @endif
    @if ($notif->jenis == 3)
        <div class="card" style="width: 80%; margin: 0 auto; margin-bottom: 15px">
            <div class="card-body">
                <h4>Penerimaan permintaan bergabung untuk event <strong>"{{$notif->judulevent}}"</strong></h4>
            <p style="font-size: 15px">
                {{'@' . $notif->usernamepg}} menerima Anda sebagai partisipan untuk event "{{$notif->judulevent}}".
            </p>
            <span class="text-muted" style="font-size: 0.9rem">{{ $notif->created_at }}</span>
            </div>
        </div>
    @endif
    @if ($notif->jenis == 4)
        <div class="card" style="width: 80%; margin: 0 auto; margin-bottom: 15px">
            <div class="card-body">
                <h4>Penolakan permintaan bergabung untuk event <strong>"{{$notif->judulevent}}"</strong></h4>
            <p style="font-size: 15px">
                {{'@' . $notif->usernamepg}} menolak Anda sebagai partisipan untuk event "{{$notif->judulevent}}".
            </p>
            <span class="text-muted" style="font-size: 0.9rem">{{ $notif->created_at }}</span>
            </div>
        </div>
    @endif
    @if ($notif->jenis == 5)
        <div class="card" style="width: 80%; margin: 0 auto; margin-bottom: 15px">
            <div class="card-body">
                <h4>Permintaan bergabung untuk event <strong>"{{$notif->judulevent}}"</strong></h4>
            <p style="font-size: 15px">
                {{'@' . $notif->usernamepg}} meminta bergabung pada event "{{$notif->judulevent}}" yang Anda buat.
            </p>
            <span class="text-muted" style="font-size: 0.9rem">{{ $notif->created_at }}</span>
            </div>
        </div>
    @endif
    @if ($notif->jenis == 6)
        <div class="card" style="width: 80%; margin: 0 auto; margin-bottom: 15px">
            <div class="card-body">
                <h4>Perubahan detail untuk event <strong>"{{$notif->judulevent}}"</strong></h4>
            <p style="font-size: 15px">
                {{'@' . $notif->usernamepg}} mengubah detail untuk event "{{$notif->judulevent}}".
            </p>
            <span class="text-muted" style="font-size: 0.9rem">{{ $notif->created_at }}</span>
            </div>
        </div>
    @endif
    @if ($notif->jenis == 7)
    <div class="card" style="width: 80%; margin: 0 auto; margin-bottom: 15px">
        <div class="card-body">
            <h4>Pembatalan partisipasi untuk event <strong>"{{$notif->judulevent}}"</strong></h4>
        <p style="font-size: 15px">
            {{'@' . $notif->usernamepg}} membatalkan partisipasinya pada event "{{$notif->judulevent}}" yang Anda buat.
        </p>
        <span class="text-muted" style="font-size: 0.9rem">{{ $notif->created_at }}</span>
        </div>
    </div>
@endif
@endforeach
@endif
</div>
@endsection
