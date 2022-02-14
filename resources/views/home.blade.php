@extends('layouts.navigation')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="title-book">Author</th>
                        <th class="title-book">Title</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ebook as $ebook)
                        <tr>
                            <td>{{ $ebook->author }}</td>
                            <td><a href="{{ route('detail', $ebook->title) }}">{{ $ebook->title }}</a></td>
                        </tr>
                    @empty
                        <td>No data...</td>
                    @endforelse
                </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
