@extends('layouts.navigation')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="card-body">
                <form method="POST" action="{{ route('saveProfile') }}" enctype="multipart/form-data">
                    @csrf
                    @foreach($account as $account)
                        <div class="container">
                            <div class="form-group row mb-0">
                                <div class="input-data row">
                                    <div class="col-sm">
                                        <img src="{{ Storage::url($account->display_picture_link) }}" class="card-img-top" alt="{{ $account->display_picture_linke }}" style="height: 14rem;">
                                    </div>

                                    <div class="col-sm">
                                        <div class="form-group row">
                                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
        
                                            <div class="col-md-5">
                                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $account->firstname }}" required autocomplete="firstname" autofocus>
        
                                                @error('firstname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name:') }}</label>
        
                                                <div class="col-md-5">
                                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $account->lastname }}" required autocomplete="lastname" autofocus>
            
                                                    @error('lastname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="gender_id" class="col-md-4 col-form-label text-md-right">{{ __('Gender:') }}</label>
        
                                            <div class="col-md-5">
                                                <input id="male" type="radio" class="radio-inline" {{$account->gender_id == 1? 'checked' : ''}} name="gender_id" value="1" required autocomplete="gender_id">{{ __(' Male') }}
                                                <input id="female" type="radio" class="radio-inline" {{$account->gender_id == 2? 'checked' : ''}} name="gender_id" value="2" required autocomplete="gender_id">{{ __(' Female') }}
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password:') }}</label>
        
                                            <div class="col-md-5">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $account->password }}" required autocomplete="new-password">
        
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
                                            <label for="middlename" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name:') }}</label>
        
                                            <div class="col-md-5">
                                                <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ $account->middlename }}" autocomplete="middlename" autofocus>
        
                                                @error('middlename')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address:') }}</label>
        
                                            <div class="col-md-5">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $account->email }}" required autocomplete="email">
        
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                            <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Role:') }}</label>
                                                <div class="col-md-5">
                                                    <select disabled class="form-control" name="role_id">
                                                        <option {{$account->role_id == 2? 'selected' : '' }} value="2">User</option>
                                                        <option {{$account->role_id == 1? 'selected' : ''}} value="1">Admin</option>
                                                    </select>
                                                </div>
                                        </div>
        
                                        <div class="form-group row">
                                            <label for="display_picture_link" class="col-md-4 col-form-label text-md-right">{{ __('Display Picture') }}</label>
        
                                            <div class="col-md-5">
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
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
