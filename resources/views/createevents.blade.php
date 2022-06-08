@extends('layouts.notabs')

@section('title', 'Create Events • OnSport')

@section('content')
<form action="/createevents/store" method="post" enctype="multipart/form-data">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Events</div>
                    <div class="card-body">
                        <div class="col-sm-1"></div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="" class="label-control">Judul Event</label>
                                    <input type="string" name="judulevent" id="judulevent" class="form-control" placeholder="Masukan Judul Event" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control">Kategori</label>
                                    <select name="kategori" class="form-control" placeholder="Pilih Kategori" required>
                                        <option value="" selected disabled hidden>Pilih Kategori</option>
                                        <option name="kategori" value="Sepak bola/Futsal">Sepak bola/Futsal</option>
                                        <option name="kategori" value="Basket">Basket</option>
                                        <option name="kategori" value="Voli">Voli</option>
                                        <option name="kategori" value="Bulutangkis">Bulutangkis</option>
                                        <option name="kategori" value="Bersepeda">Bersepeda</option>
                                        <option name="kategori" value="Lain-lain">Lain-lain</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="label-control">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" placeholder="Pilih Tanggal" name="tanggal" style="background-color:white" required>
                                    </div>
                                    <script>

                                        flatpickr("#tanggal", {});
                                    </script>
                                    <div class="col">
                                        <label for="" class="label-control">Jam</label>
                                        <input type="time" class="form-control" id="jam" placeholder="Pilih Jam" name="jam" required>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Lokasi</label>
                                    <input type="string" name="lokasi" id="lokasi" class="form-control" placeholder="Masukan Lokasi" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control">Kota</label>
                                    <select name="kota" class="form-control" placeholder="Pilih Kota" required>
                                        <option value="" selected disabled hidden>Pilih Kota</option>
                                        <option name="kota" value="Surabaya">Surabaya</option>
                                        <option name="kota" value="Sidoarjo">Sidoarjo</option>
                                        <option name="kota" value="Gresik">Gresik</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="label-control">Range Umur Bawah</label>
                                        <input type="number" class="form-control" id="rangeub" placeholder="Masukan Range Umur Bawah" name="rangeub" required>
                                    </div>
                                    <div class="col">
                                        <label for="" class="label-control">Range Umur Atas</label>
                                        <input type="number" class="form-control" id="rangeua" placeholder="Masukan Range Umur Atas" name="rangeua" required>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control">Level Keahlian</label>
                                    <select name="levelkeahlian" class="form-control" placeholder="Pilih Level Keahlian" required>
                                        <option value="" selected disabled hidden>Pilih Level Keahlian</option>
                                        <option name="levelkeahlian" value="Beginner">Beginner</option>
                                        <option name="levelkeahlian" value="Intermediate">Intermediate</option>
                                        <option name="levelkeahlian" value="Advanced">Advanced</option>
                                        <option name="levelkeahlian" value="All">All</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control">Kuota Partisipan (Tidak Bisa Diedit Sesudah Event Dipublish)</label>
                                    <input type="number" name="kuotapartisipan" id="kuotapartisipan" class="form-control" placeholder="Masukan Kuota Partisipan" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label-control">Catatan</label>
                                    <textarea name="catatan" class="form-control" placeholder="Opsional" cols="30" rows="8"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="customFile" class="label-control">Gambar</label>
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
