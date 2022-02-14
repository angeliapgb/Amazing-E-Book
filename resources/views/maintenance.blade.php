@extends('layouts.navigation')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th class="text-center">Account</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($account as $account)
                        <tr>
                            <td>{{ $account->firstname. ' '. $account->middlename. ' '. $account->lastname. ' - '. $account->role_desc }}</td>
                            <td><a href="{{ route('updateRole', $account->id) }}">Update Role</a></td>
                            <td><a href="{{ route('userDelete', $account->id) }}">Delete</a></td>
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
