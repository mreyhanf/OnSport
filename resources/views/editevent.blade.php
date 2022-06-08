@extends('layouts.notabs')

@section('title', ' Edit Event • OnSport')

@section('content')
@foreach($eo as $ed)
<form action="/event/update/{{ $ed->idevent }}" method="post" enctype="multipart/form-data">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Event</div>
                    <div class="card-body">
                        <div class="col-sm-1"></div>
                            <div class="col-sm-12">
                                <input type="hidden" name="idevent" value="{{ $ed->idevent }}">
                                <div class="form-group">
                                    <label for="" class="label-control">Judul Event</label>
                                    <input type="string" name="judulevent" value="{{ $ed->judulevent }}" id="judulevent" class="form-control" placeholder="Masukan Judul Event">
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control">Kategori</label>
                                    <select name="kategori" class="form-control" value="{{ $ed->kategori }}" placeholder="Pilih Kategori" required>
                                        <option value="" disabled >Pilih Kategori</option>
                                        <option @if($ed->kategori == 'Sepak bola/Futsal') {{ 'selected' }} @endif name="kategori" value="Sepak bola/Futsal">Sepak bola/Futsal</option>
                                        <option @if($ed->kategori == 'Basket') {{ 'selected' }} @endif name="kategori" value="Basket">Basket</option>
                                        <option @if($ed->kategori == 'Voli') {{ 'selected' }} @endif name="kategori" value="Voli">Voli</option>
                                        <option @if($ed->kategori == 'Bulutangkis') {{ 'selected' }} @endif name="kategori" value="Bulutangkis">Bulutangkis</option>
                                        <option @if($ed->kategori == 'Bersepeda') {{ 'selected' }} @endif name="kategori" value="Bersepeda">Bersepeda</option>
                                        <option @if($ed->kategori == 'Lain-lain') {{ 'selected' }} @endif name="kategori" value="Lain-lain">Lain-lain</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="label-control">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" value="{{ $ed->tanggal }}" placeholder="Pilih Tanggal" name="tanggal"
                                        style="background-color:white">
                                    </div>
                                    <script>

                                        flatpickr("#tanggal", {});
                                    </script>
                                    <div class="col">
                                        <label for="" class="label-control">Jam</label>
                                        <input type="time" class="form-control" id="jam" value="{{ $ed->jam }}" placeholder="Pilih Jam" name="jam">
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Lokasi</label>
                                    <input type="string" name="lokasi" id="lokasi" class="form-control" value="{{ $ed->lokasi }}" placeholder="Masukan Lokasi">
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control">Kota</label>
                                    <select name="kota" class="form-control" value="{{ $ed->kota }}" placeholder="Pilih Kota" required>
                                        <option value="" disabled >Pilih Kota</option>
                                        <option @if($ed->kota == 'Surabaya') {{ 'selected' }} @endif name="kota" value="Surabaya">Surabaya</option>
                                        <option @if($ed->kota == 'Sidoarjo') {{ 'selected' }} @endif name="kota" value="Sidoarjo">Sidoarjo</option>
                                        <option @if($ed->kota == 'Gresik') {{ 'selected' }} @endif name="kota" value="Gresik">Gresik</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="label-control">Range Umur Bawah</label>
                                        <input type="number" class="form-control" id="rangeub" value="{{ $ed->rangeub }}" placeholder="Masukan Range Umur Bawah" name="rangeub">
                                    </div>
                                    <div class="col">
                                        <label for="" class="label-control">Range Umur Atas</label>
                                        <input type="number" class="form-control" id="rangeua" value="{{ $ed->rangeua }}" placeholder="Masukan Range Umur Atas" name="rangeua">
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control">Level Keahlian</label>
                                    <select name="levelkeahlian" class="form-control" value="{{ $ed->levelkeahlian }}" placeholder="Pilih Level Keahlian" required>
                                        <option value="" disabled >Pilih Level Keahlian</option>
                                        <option @if($ed->levelkeahlian == 'Beginner') {{ 'selected' }} @endif name="levelkeahlian" value="Beginner">Beginner</option>
                                        <option @if($ed->levelkeahlian == 'Intermediate') {{ 'selected' }} @endif name="levelkeahlian" value="Intermediate">Intermediate</option>
                                        <option @if($ed->levelkeahlian == 'Advanced') {{ 'selected' }} @endif name="levelkeahlian" value="Advanced">Advanced</option>
                                        <option @if($ed->levelkeahlian == 'All') {{ 'selected' }} @endif name="levelkeahlian" value="All">All</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control">Kuota Partisipan (Tidak Bisa Diedit Sesudah Event Dipublish)</label>
                                    <input type="number" name="kuotapartisipan" id="kuotapartisipan" class="form-control" value="{{ $ed->kuotapartisipan }}" placeholder="Masukan Kuota Partisipan" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control">Catatan</label>
                                    <textarea name="catatan" class="form-control" value="{{ $ed->catatan }}" placeholder="Opsional" cols="30" rows="8"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="customFile" class="label-control">Gambar</label>
                                    <input type="file" name="gambar" src="{{ $ed->gambar }}" class="form-control" id="customFile" />
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
