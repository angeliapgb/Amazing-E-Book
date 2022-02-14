@extends('layouts.navigation')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th colspan="2" class="text-center">Title</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cart as $cart)
                        <tr>
                            <td class="title-cart text-center">{{ $cart->title }}</td>
                            <td>
                                <form method="POST" action="/cartDelete">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $cart->id }}">
                                        <input type="submit" class="btn btn-link" value="{{ __('Delete') }}">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td>No data...</td>
                    @endforelse
                    @if ($cart->count() != 0)
                        <tr>
                            <td></td>
                            <td>
                                <form method="POST" action="/submit">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">
                                        Submit
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
