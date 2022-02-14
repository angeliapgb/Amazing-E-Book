@extends('layouts.navigation')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-borderless">
                <h3>E-Book Detail</h3>
                <tbody>
                    @foreach ($ebook as $ebook)
                        <tr>
                            <td>Title:</td>
                            <td>{{ $ebook->title }}</td>
                        </tr>

                        <tr>
                            <td>Author:</td>
                            <td>{{ $ebook->author }}</td>
                        </tr>

                        <tr>
                            <td>Description</td>
                            <td>{{ $ebook->description }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td class="rent-button">
                            <form method="POST" action="{{ route('rent', $ebook->title) }}">
                                @csrf
                                <input type="hidden" name="ebook_id" value="{{ $ebook->id }}">
                                <button type="submit" class="btn btn-warning">
                                    Rent
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
