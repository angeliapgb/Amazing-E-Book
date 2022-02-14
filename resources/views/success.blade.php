@extends('layouts.navigation')

@section('content')
<div class="welcome-text container">
    <div class="row">
        <p>Success!</p>
        <a href="{{ route('home') }}">{{__('translate.click')}}</a>
    </div>
</div>
@endsection