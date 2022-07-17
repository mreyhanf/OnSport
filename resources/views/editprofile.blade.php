@extends('layouts.tabs')

@section('title', 'Edit Profile • OnSport')

@section('stylehighlighttab_profile', 'background-color: #d6d6d6')
@section('activenav_profile', 'active')
@section('stylecolortext_home', 'white')
@section('stylecolortext_myevents', 'white')
@section('stylecolortext_browse', 'white')
@section('stylecolortext_notifications', 'white')
@section('stylecolortext_profile', 'black')

@section('content')

<form action="/profile/update" method="post" enctype="multipart/form-data">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Edit Profile</strong></div>
                    <div class="card-body">
                        @php
                            if (Session::has('error_messages')) {
                                $error_messages = Session::get('error_messages');
                            }
                        @endphp
                        @if (isset($error_messages))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="text-align: center">
                            <strong>Update failed.</strong> <br>
                             @foreach ($error_messages as $error_message)
                                 {{$error_message}} <br>
                             @endforeach
                        </div>
                        @endif
                        <div class="col-sm-1"></div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-3 col-form-label">Username <span class="badge badge-warning">Public</span></label>
                                    <div class="col-sm-9">
                                        <input type="string" name="username" value="{{ $userinfo->username }}" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username" required>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Nama <span class="badge badge-warning">Public</span></label>
                                    <div class="col-sm-9">
                                        <input type="string" name="name" value="{{ $userinfo->name }}" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Namamu" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" value="{{ $userinfo->email }}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kota" class="col-sm-3 col-form-label">Kota <span class="badge badge-warning">Public</span></label>
                                    <div class="col-sm-9">
                                        <select name="kota" type="select" class="form-control @error('kota') is-invalid @enderror" class="kota" value="{{ $userinfo->kota }}" required>
                                            <option value="" selected disabled hidden>Pilih Kotamu</option>
                                            <option @if($userinfo->kota == 'Surabaya') {{ 'selected' }} @endif name="kota" value="Surabaya">Surabaya</option>
                                            <option @if($userinfo->kota == 'Sidoarjo') {{ 'selected' }} @endif name="kota" value="Sidoarjo">Sidoarjo</option>
                                            <option @if($userinfo->kota == 'Gresik') {{ 'selected' }} @endif name="kota" value="Gresik">Gresik</option>
                                        </select>
                                        @error('kota')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gender" class="col-sm-3 col-form-label">Gender <span class="badge badge-warning">Public</span></label>
                                    <div class="col-sm-9">
                                        <select name="gender" type="select" class="form-control @error('gender') is-invalid @enderror" class="gender" value="{{ $userinfo->kota }}" required>
                                            <option value="" selected disabled hidden>Pilih Gender</option>
                                            <option @if($userinfo->gender == 'Male') {{ 'selected' }} @endif name="gender" value="Male">Male</option>
                                            <option @if($userinfo->gender == 'Female') {{ 'selected' }} @endif name="gender" value="Female">Female</option>
                                            <option @if($userinfo->gender == 'Nonbinary') {{ 'selected' }} @endif name="gender" value="Nonbinary">Nonbinary</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tanggallahir" class="col-sm-3 col-form-label">Tanggal Lahir <span class="badge badge-warning">Public</span></label>
                                    <div class="col-sm-9">
                                        <input type="date" name="tanggallahir" value="{{ $userinfo->tanggallahir }}" id="tanggallahir" class="form-control @error('tanggallahir') is-invalid @enderror" placeholder="Masukkan Tanggal Lahir" required>
                                        @error('tanggallahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="akunmedsos" class="col-sm-3 col-form-label">Media Sosial <span class="badge badge-warning">Public</span></label>
                                    <div class="col-sm-9">
                                        <input type="string" name="akunmedsos" value="{{ $userinfo->akunmedsos }}" id="akunmedsos" class="form-control @error('akunmedsos') is-invalid @enderror" placeholder="Masukkan Akun Media Sosial atau Kontakmu" >
                                        @error('akunmedsos')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="preferensiolahraga" class="col-sm-4 col-form-label text-md-left">Preferensi Olahraga</label> <br>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right" style="margin-right: 10px"></label>
                                        <div class="form-group row col-md-9">
                                            <input @if(in_array("Sepak bola/Futsal", $preferensi_olahraga)) {{ 'checked' }} @endif id="preferensiolahraga_sepak_bola/futsal" type="checkbox" class="form-control @error('preferensiolahraga') is-invalid @enderror col-md-2" name="preferensiolahraga[]" value="Sepak bola/Futsal" style="margin-left: -12px; width: 20px; height: 20px">
                                            <label for="preferensiolahraga_sepak_bola/futsal" style="margin-top: -1px"> Sepak bola/Futsal</label> <br>
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin-top: -15px">
                                        <label class="col-md-3 col-form-label text-md-right" style="margin-right: 10px"></label>
                                        <div class="form-group row col-md-9">
                                            <input @if(in_array("Bulu tangkis", $preferensi_olahraga)) {{ 'checked' }} @endif id="preferensiolahraga_bulu_tangkis" type="checkbox" class="form-control @error('preferensiolahraga') is-invalid @enderror col-md-2" name="preferensiolahraga[]" value="Bulu tangkis" style="margin-left: -12px; width: 20px; height: 20px">
                                            <label for="preferensiolahraga_bulu_tangkis" style="margin-top: -1px">Bulu tangkis</label> <br>
                                        </div>
                                    </div>

                                    <div class="form-group row" style="margin-top: -15px">
                                        <label class="col-md-3 col-form-label text-md-right" style="margin-right: 10px"></label>
                                        <div class="form-group row col-md-9">
                                            <input @if(in_array("Voli", $preferensi_olahraga)) {{ 'checked' }} @endif id="preferensiolahraga_voli" type="checkbox" class="form-control @error('preferensiolahraga') is-invalid @enderror col-md-2" name="preferensiolahraga[]" value="Voli" style="margin-left: -12px; width: 20px; height: 20px">
                                            <label for="preferensiolahraga_voli" style="margin-top: -1px">Voli</label> <br>
                                        </div>
                                    </div>

                                    <div class="form-group row" style="margin-top: -15px">
                                        <label class="col-md-3 col-form-label text-md-right" style="margin-right: 10px"></label>
                                        <div class="form-group row col-md-9">
                                            <input @if(in_array("Basket", $preferensi_olahraga)) {{ 'checked' }} @endif id="preferensiolahraga_basket" type="checkbox" class="form-control @error('preferensiolahraga') is-invalid @enderror col-md-2" name="preferensiolahraga[]" value="Basket" style="margin-left: -12px; width: 20px; height: 20px">
                                            <label for="preferensiolahraga_basket" style="margin-top: -1px">Basket</label> <br>
                                        </div>
                                    </div>

                                    <div class="form-group row" style="margin-top: -15px">
                                        <label class="col-md-3 col-form-label text-md-right" style="margin-right: 10px"></label>
                                        <div class="form-group row col-md-9">
                                            <input @if(in_array("Bersepeda", $preferensi_olahraga)) {{ 'checked' }} @endif id="preferensiolahraga_bersepeda" type="checkbox" class="form-control @error('preferensiolahraga') is-invalid @enderror col-md-2" name="preferensiolahraga[]" value="Bersepeda" style="margin-left: -12px; width: 20px; height: 20px">
                                            <label for="preferensiolahraga_bersepeda" style="margin-top: -1px">Bersepeda</label> <br>
                                        </div>
                                    </div>

                                    <div class="form-group row" style="margin-top: -15px">
                                        <label class="col-md-3 col-form-label text-md-right" style="margin-right: 10px"></label>
                                        <div class="form-group row col-md-9">
                                            <input @if(in_array("Lain-lain", $preferensi_olahraga)) {{ 'checked' }} @endif id="preferensiolahraga_lain-lain" type="checkbox" class="form-control @error('preferensiolahraga') is-invalid @enderror col-md-2" name="preferensiolahraga[]" value="Lain-lain" style="margin-left: -12px; width: 20px; height: 20px">
                                            <label for="preferensiolahraga_lain-lain" style="margin-top: -1px">Lain-lain</label>
                                        </div>
                                    </div>

                                    @error('preferensiolahraga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="customFile" class="col-sm-3 col-form-label">Profile Photo<span class="badge badge-warning">Public</span></label>
                                    <div class="col-sm-9">
                                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" id="customFile">
                                        @error('gambar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-3 col-lg-10" style="margin-top: 20px">
                                    {{csrf_field()}}
                                    <input type="submit" value="Save" class="btn btn-outline-primary" style="width: 120px">
                                </div>
                                </div>

                    </div>
            </div>
        </div>
    </div>
</div>
</form>

<script>
//    function previewImage() {
//        const gambar = document.querySelector('#gambar');
//        const imgPreview = document.querySelector('.img-preview')
//
//        imgPreview.style.display = 'block';
//
//       const oFReader = new FileReader();
//        oFReader.readAsDataURL(gambar.files);
//
//        oFReader.onload = function(oFREvent) {
//            imgPreview.src = oFREvent.target.result;
//        }
//    }

</script>

@endsection
