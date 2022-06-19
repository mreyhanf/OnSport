@extends('layouts.notabs')

@section('title', 'User Information • OnSport')

@section('content')
<div class="container">
<h3 class="mb-4">User Information</h3>

<div>
    @php
       $gambaruserinfo = $userinfo->gambar == "" ? "users_image/userprofile_placeholder3.png" :  $userinfo->gambar;
   @endphp

   <div>
       <a class="mr-3" style="color: white; text-decoration: none">
           <img src="/{{ $gambaruserinfo }}" alt="" width=200px height=200px border-radius= 100% class="rounded-circle">
       </a>
       <a style="color: black; text-decoration: none">
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
        {{ date('d F Y', strtotime($userinfo->tanggallahir)) }}
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


@endsection
