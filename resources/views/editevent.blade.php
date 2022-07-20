@extends('layouts.notabs')

@section('title', ' Edit Event • OnSport')

@section('content')
@foreach($eo as $ed)
<form action="/event/update/{{ $ed->idevent }}" method="post" enctype="multipart/form-data">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-outline-dark mt-1" href=" {{ '/event/details/' . $ed->idevent }} " style="margin-bottom: 15px">
                <span class="oi oi-arrow-left" title="arrow left" aria-hidden="true" style="margin-right: 5px"></span> Back
            </a>
            <div class="card">
                <div class="card-header" style="font-weight: 900">Edit Event</div>
                    <div class="card-body">
                        <div class="col-sm-1"></div>
                            <div class="col-sm-12">
                                <input type="hidden" name="idevent" value="{{ $ed->idevent }}">
                                <div class="form-group">
                                    <label for="" class="label-control" style="word-wrap: break-word">Judul Event</label>
                                    <input type="string" name="judulevent" value="{{ $ed->judulevent }}" id="judulevent" class="form-control" placeholder="Masukkan judul event" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control" style="word-wrap: break-word">Kategori</label>
                                    <select name="kategori" class="form-control" value="{{ $ed->kategori }}" placeholder="Pilih kategori" required>
                                        <option value="" disabled >Pilih kategori</option>
                                        <option @if($ed->kategori == 'Sepak bola/Futsal') {{ 'selected' }} @endif name="kategori" value="Sepak bola/Futsal">Sepak bola/Futsal</option>
                                        <option @if($ed->kategori == 'Basket') {{ 'selected' }} @endif name="kategori" value="Basket">Basket</option>
                                        <option @if($ed->kategori == 'Voli') {{ 'selected' }} @endif name="kategori" value="Voli">Voli</option>
                                        <option @if($ed->kategori == 'Bulu tangkis') {{ 'selected' }} @endif name="kategori" value="Bulu tangkis">Bulu tangkis</option>
                                        <option @if($ed->kategori == 'Bersepeda') {{ 'selected' }} @endif name="kategori" value="Bersepeda">Bersepeda</option>
                                        <option @if($ed->kategori == 'Lain-lain') {{ 'selected' }} @endif name="kategori" value="Lain-lain">Lain-lain</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="label-control" style="word-wrap: break-word">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" value="{{ $ed->tanggal }}" placeholder="Pilih tanggal" name="tanggal"
                                        style="background-color:white" required>
                                    </div>
                                    <div class="col">
                                        <label for="" class="label-control" style="word-wrap: break-word">Jam</label>
                                        <input type="time" class="form-control" id="jam" value="{{ $ed->jam }}" placeholder="Pilih jam" name="jam" required>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="" style="word-wrap: break-word">Lokasi <span class="badge badge-info text-wrap">Informasi lokasi yang detail dapat memudahkan partisipan mengikuti event</span></label>
                                    <input type="string" name="lokasi" id="lokasi" class="form-control" value="{{ $ed->lokasi }}" placeholder="Masukan Lokasi" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control" style="word-wrap: break-word">Kota</label>
                                    <select name="kota" class="form-control" value="{{ $ed->kota }}" placeholder="Pilih kota" required>
                                        <option value="" disabled >Pilih kota</option>
                                        <option @if($ed->kota == 'Surabaya') {{ 'selected' }} @endif name="kota" value="Surabaya">Surabaya</option>
                                        <option @if($ed->kota == 'Sidoarjo') {{ 'selected' }} @endif name="kota" value="Sidoarjo">Sidoarjo</option>
                                        <option @if($ed->kota == 'Gresik') {{ 'selected' }} @endif name="kota" value="Gresik">Gresik</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="label-control" style="word-wrap: break-word">Batas Bawah Umur</label>
                                        <input type="number" class="form-control" id="rangeub" value="{{ $ed->rangeub }}" placeholder="Masukkan batas bawah umur" name="rangeub" required>
                                    </div>
                                    <div class="col">
                                        <label for="" class="label-control" style="word-wrap: break-word">Batas Atas Umur</label>
                                        <input type="number" class="form-control" id="rangeua" value="{{ $ed->rangeua }}" placeholder="Masukkan batas atas umur" name="rangeua" required>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control" style="word-wrap: break-word">Level Keahlian</label>
                                    <select name="levelkeahlian" class="form-control" value="{{ $ed->levelkeahlian }}" placeholder="Pilih Level keahlian" required>
                                        <option value="" disabled >Pilih level keahlian</option>
                                        <option @if($ed->levelkeahlian == 'All') {{ 'selected' }} @endif name="levelkeahlian" value="All">All</option>
                                        <option @if($ed->levelkeahlian == 'Beginner') {{ 'selected' }} @endif name="levelkeahlian" value="Beginner">Beginner</option>
                                        <option @if($ed->levelkeahlian == 'Intermediate') {{ 'selected' }} @endif name="levelkeahlian" value="Intermediate">Intermediate</option>
                                        <option @if($ed->levelkeahlian == 'Advanced') {{ 'selected' }} @endif name="levelkeahlian" value="Advanced">Advanced</option>
                                    </select>
                                </div>
                                <div class="">
                                    <label for="" class="label-control" style="word-wrap: break-word">Kuota Partisipan: <strong>{{ $ed->kuotapartisipan }}</strong> </label>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control" style="word-wrap: break-word">Catatan <span class="badge badge-info text-wrap">Opsional</span></label>
                                    <textarea name="catatan" class="form-control" placeholder="Masukkan catatan atau informasi tambahan (opsional)" cols="30" rows="8">{{ $ed->catatan }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="customFile" class="label-control" style="word-wrap: break-word">Gambar</label>
                                    <input type="file" name="gambar" src="{{ $ed->gambar }}" class="form-control" id="customFile">
                                </div>
                                {{csrf_field()}}
                                <input type="submit" value="Simpan" class="btn btn-primary" style="width: 120px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endforeach
@endsection
