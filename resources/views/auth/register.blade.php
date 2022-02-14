@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="header">{{ __('translate.register') }}</div>
                <div class="container">
                    <div class="form-group row mb-0">
                        <div class="input-data row">
                            <div class="col-sm">
                                <div class="form-group row">
                                    <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('translate.first name') }}</label>

                                    <div class="col-md-6">
                                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                        @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('translate.last name') }}</label>

                                        <div class="col-md-6">
                                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
    
                                            @error('lastname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="gender_id" class="col-md-4 col-form-label text-md-right">{{ __('translate.gender') }}</label>

                                    <div class="col-md-6">
                                        <input id="male" type="radio" class="radio-inline" name="gender_id" value="1" required autocomplete="gender_id">{{ __(' Male') }}
                                        <input id="female" type="radio" class="radio-inline" name="gender_id" value="2" required autocomplete="gender_id">{{ __(' Female') }}
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('translate.password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group row">
                                    <label for="middlename" class="col-md-4 col-form-label text-md-right">{{ __('translate.middle name') }}</label>

                                    <div class="col-md-6">
                                        <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}" autocomplete="middlename" autofocus>

                                        @error('middlename')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('translate.email') }}</label>

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
                                    <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('translate.role') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-control" name="role_id">
                                                <option selected disabled></option>
                                                <option value="2">User</option>
                                                <option value="1">Admin</option>
                                            </select>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="display_picture_link" class="col-md-4 col-form-label text-md-right">{{ __('translate.display picture') }}</label>

                                    <div class="col-md-6">
                                        <input id="display_picture_link" type="file" class="form-control @error('display_picture_link') is-invalid @enderror" name="display_picture_link" required autofocus>

                                        @error('display_picture_link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="mx-auto">
                            <button type="submit" class="btn btn-warning">
                                {{ __('translate.submit') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>        
    </div>

    <div class="login-redirect">
        <a href="{{ route('login') }}">{{ __('translate.have account') }}</a>
    </div>
</div>
@endsection
