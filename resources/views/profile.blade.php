@extends('layouts.tabs')

@section('title', 'Profile • OnSport')

@section('stylehighlighttab_profile', 'background-color: #d6d6d6')
@section('activenav_profile', 'active')
@section('stylecolortext_home', 'white')
@section('stylecolortext_myevents', 'white')
@section('stylecolortext_browse', 'white')
@section('stylecolortext_notifications', 'white')
@section('stylecolortext_profile', 'black')

@section('content')
<div class="container">
    {{ Session::get('profilepage_url')}}
        <div class="row mb-4">
            <div class="col-sm-12 col-md-8 col-lg-10">
                <h3>My Profile</h3>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-2">
                <a href="/profile/edit" class="btn btn-primary rounded-pill" style="width: 109px; margin-bottom: 5px">
                    Edit Profile
                </a>
            </div>
        </div>

@php
$gambarprofile = $userinfo->gambar == "" ? "users_image/userprofile_placeholder3.png" : $userinfo->gambar;
@endphp

<div>
    <div>
        <a href="/user/{{ $userinfo->username }}" class="mr-3" style="color: white; text-decoration: none">
            <img src="/{{ $gambarprofile }}" alt="" width=200px height=200px border-radius= 100% class="rounded-circle">
        </a>
        <a href="/user/{{ $userinfo->username }}" style="color: black; text-decoration: none">
            <span style="font-size: 1.3em">
                {{'@' . $userinfo->username }}
            </span>
        </a>
    </div>
</div>

<hr>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="name" style="font-size: 1.3em"><strong >Nama</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="name" style="font-size: 1.3em">
        {{ $userinfo->name }}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="email"><strong style="font-size: 1.3em">Email</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="email" style="font-size: 1.3em">
        {{ $userinfo->email }}
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
        {{ $userinfo->kota }}
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="kategori"><strong style="font-size: 1.3em">Preferensi Olahraga</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="kategori" style="font-size: 1.3em">
        <ul>
            @foreach ($userpreferensiolahraga as $po)
            <li>{{ $po->kategori }} </li>
            @endforeach
        </ul>
    </div>
</div>


<div class="form-group row">
    <div class="col-sm-2">
        <label for="gender"><strong style="font-size: 1.3em">Gender</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="gender" style="font-size: 1.3em">
        {{ $userinfo->gender }}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="tanggallahir"><strong style="font-size: 1.3em">Tanggal Lahir</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="tanggallahir" style="font-size: 1.3em">
        {{ $userinfo->tanggallahir }}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="akunmedsos"><strong style="font-size: 1.3em">Media Sosial</strong></label>
    </div>
    <div class="col-sm-1" style="max-width: 30px">
        :
    </div>
    <div class="col-sm-9" id="akunmedsos" style="font-size: 1.3em">
        {{ $userinfo->akunmedsos}}
    </div>
</div>


</div>
@endsection