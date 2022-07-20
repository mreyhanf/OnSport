@extends('layouts.app')

@section('title', 'Register •')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kota" class="col-md-4 col-form-label text-md-right">City</label>

                            <div class="col-md-6">
                                <select id="kota" type="select" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ old('kota') }}" required>
                                    <option value="" selected disabled hidden>Select a city</option>
                                    <option name="kota" value="Surabaya">Surabaya</option>
                                    <option name="kota" value="Sidoarjo">Sidoarjo</option>
                                    <option name="kota" value="Gresik">Gresik</option>
                                </select>

                                @error('kota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="preferensiolahraga" class="col-md-4 col-form-label text-md-right">Sports Preference</label> <br>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" style="margin-right: 10px"></label>
                                <div class="form-group row col-md-6">
                                    <input id="preferensiolahraga_sepakbola/futsal" type="checkbox" class="form-control @error('preferensiolahraga') is-invalid @enderror col-md-2" name="preferensiolahraga[]" value="Sepak bola/Futsal" style="margin-left: -12px; width: 20px; height: 20px">
                                    <label for="preferensiolahraga_sepak_bola/futsal" style="margin-top: -1px"> Sepak bola/Futsal</label> <br>
                                </div>
                            </div>

                            <div class="form-group row" style="margin-top: -15px">
                                <label class="col-md-4 col-form-label text-md-right" style="margin-right: 10px"></label>
                                <div class="form-group row col-md-6">
                                    <input id="preferensiolahraga_bulu_tangkis" type="checkbox" class="form-control @error('preferensiolahraga') is-invalid @enderror col-md-2" name="preferensiolahraga[]" value="Bulu tangkis" style="margin-left: -12px; width: 20px; height: 20px">
                                    <label for="preferensiolahraga_bulu_tangkis" style="margin-top: -1px">Bulu tangkis</label> <br>
                                </div>
                            </div>

                            <div class="form-group row" style="margin-top: -15px">
                                <label class="col-md-4 col-form-label text-md-right" style="margin-right: 10px"></label>
                                <div class="form-group row col-md-6">
                                    <input id="preferensiolahraga_voli" type="checkbox" class="form-control @error('preferensiolahraga') is-invalid @enderror col-md-2" name="preferensiolahraga[]" value="Voli" style="margin-left: -12px; width: 20px; height: 20px">
                                    <label for="preferensiolahraga_voli" style="margin-top: -1px">Voli</label> <br>
                                </div>
                            </div>

                            <div class="form-group row" style="margin-top: -15px">
                                <label class="col-md-4 col-form-label text-md-right" style="margin-right: 10px"></label>
                                <div class="form-group row col-md-6">
                                    <input id="preferensiolahraga_basket" type="checkbox" class="form-control @error('preferensiolahraga') is-invalid @enderror col-md-2" name="preferensiolahraga[]" value="Basket" style="margin-left: -12px; width: 20px; height: 20px">
                                    <label for="preferensiolahraga_basket" style="margin-top: -1px">Basket</label> <br>
                                </div>
                            </div>

                            <div class="form-group row" style="margin-top: -15px">
                                <label class="col-md-4 col-form-label text-md-right" style="margin-right: 10px"></label>
                                <div class="form-group row col-md-6">
                                    <input id="preferensiolahraga_bersepeda" type="checkbox" class="form-control @error('preferensiolahraga') is-invalid @enderror col-md-2" name="preferensiolahraga[]" value="Bersepeda" style="margin-left: -12px; width: 20px; height: 20px">
                                    <label for="preferensiolahraga_bersepeda" style="margin-top: -1px">Bersepeda</label> <br>
                                </div>
                            </div>

                            <div class="form-group row" style="margin-top: -15px">
                                <label class="col-md-4 col-form-label text-md-right" style="margin-right: 10px"></label>
                                <div class="form-group row col-md-6">
                                    <input id="preferensiolahraga_lain-lain" type="checkbox" class="form-control @error('preferensiolahraga') is-invalid @enderror col-md-2" name="preferensiolahraga[]" value="Lain-lain" style="margin-left: -12px; width: 20px; height: 20px">
                                    <label for="preferensiolahraga_lain-lain" style="margin-top: -1px">Lain-lain</label>
                                </div>
                            </div>

                            @error('preferensiolahraga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group row mb-2 mt-4">
                        <div class="col-md-8 offset-md-4">
                            <a href="/home" style="font-weight: 600">Or continue without logging in &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
