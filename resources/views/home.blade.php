@extends('layouts.navigation')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="title-book">{{__('translate.author')}}</th>
                        <th class="title-book">{{__('translate.title')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ebook as $ebook)
                        <tr>
                            <td>{{ $ebook->author }}</td>
                            <td><a href="{{ route('detail', $ebook->title) }}">{{ $ebook->title }}</a></td>
                        </tr>
                    @empty
                        <td>{{__('translate.nodata')}}</td>
                    @endforelse
                </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
