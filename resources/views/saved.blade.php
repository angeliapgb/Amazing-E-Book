@extends('layouts.navigation')

@section('content')
<div class="welcome-text container">
    <div class="row justify-content-center">
        <p>Saved!</p>
        <a href="{{ route('home') }}">Click here to "Home"</a>
    </div>
</div>
@endsection
