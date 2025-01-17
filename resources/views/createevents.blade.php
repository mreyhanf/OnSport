@extends('layouts.notabs')

@section('title', 'Create Events • OnSport')

@section('content')
<form action="/create-event/store" method="post" enctype="multipart/form-data">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-outline-dark mt-1" href="/home" style="margin-bottom: 15px">
                <span class="oi oi-arrow-left" title="arrow left" aria-hidden="true" style="margin-right: 5px"></span> Back
            </a>
            <div class="card">
                <div class="card-header" style="font-weight: 900">Create Event</div>
                    <div class="card-body">
                        <div class="col-sm-1"></div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="" class="label-control" style="word-wrap: break-word">Judul Event</label>
                                    <input type="string" name="judulevent" id="judulevent" class="form-control" placeholder="Masukkan judul event" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control" style="word-wrap: break-word">Kategori</label>
                                    <select name="kategori" class="form-control" required>
                                        <option value="" selected disabled hidden>Pilih kategori</option>
                                        <option name="kategori" value="Sepak bola/Futsal">Sepak bola/Futsal</option>
                                        <option name="kategori" value="Basket">Basket</option>
                                        <option name="kategori" value="Voli">Voli</option>
                                        <option name="kategori" value="Bulu tangkis">Bulu tangkis</option>
                                        <option name="kategori" value="Bersepeda">Bersepeda</option>
                                        <option name="kategori" value="Lain-lain">Lain-lain</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="label-control" style="word-wrap: break-word">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" placeholder="Pilih tanggal" name="tanggal" style="background-color:white" required>
                                    </div>

                                    <div class="col">
                                        <label for="" class="label-control" style="word-wrap: break-word">Jam</label>
                                        <input type="time" class="form-control" id="jam" placeholder="Pilih jam" name="jam" required>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="" style="word-wrap: break-word">Lokasi <span class="badge badge-info text-wrap">Informasi lokasi yang detail dapat memudahkan partisipan mengikuti event</span></label>
                                    <input type="string" name="lokasi" id="lokasi" class="form-control" placeholder="Masukkan lokasi" required maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control" style="word-wrap: break-word">Kota</label>
                                    <select name="kota" class="form-control" placeholder="Pilih kota" required>
                                        <option value="" selected disabled hidden>Pilih kota</option>
                                        <option name="kota" value="Surabaya">Surabaya</option>
                                        <option name="kota" value="Sidoarjo">Sidoarjo</option>
                                        <option name="kota" value="Gresik">Gresik</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="label-control" style="word-wrap: break-word">Batas Bawah Umur</label>
                                        <input type="number" class="form-control" id="rangeub" placeholder="Masukkan batas bawah umur" name="rangeub" required>
                                    </div>
                                    <div class="col">
                                        <label for="" class="label-control" style="word-wrap: break-word">Batas Atas Umur</label>
                                        <input type="number" class="form-control" id="rangeua" placeholder="Masukkan batas atas umur" name="rangeua" required>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control" style="word-wrap: break-word">Level Keahlian</label>
                                    <select name="levelkeahlian" class="form-control" placeholder="Pilih level keahlian" required>
                                        <option value="" selected disabled hidden>Pilih level keahlian</option>
                                        <option name="levelkeahlian" value="All">All</option>
                                        <option name="levelkeahlian" value="Beginner">Beginner</option>
                                        <option name="levelkeahlian" value="Intermediate">Intermediate</option>
                                        <option name="levelkeahlian" value="Advanced">Advanced</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control" style="word-wrap: break-word">Kuota Partisipan <span class="badge badge-warning text-wrap">Tidak dapat diubah setelah event di-publish</span></label>
                                    <input type="number" name="kuotapartisipan" id="kuotapartisipan" class="form-control" placeholder="Masukkan kuota partisipan" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control" style="word-wrap: break-word">Catatan <span class="badge badge-info text-wrap">Opsional</span></label>
                                    <textarea name="catatan" class="form-control" placeholder="Masukkan catatan atau informasi tambahan (opsional)" cols="30" rows="8" maxlength="200"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="customFile" class="label-control" style="word-wrap: break-word">Gambar</label>
                                    <input type="file" name="gambar" class="form-control" id="customFile">
                                </div>
                                {{csrf_field()}}
                                <input type="submit" value="Publish" class="btn btn-primary" style="width: 120px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
