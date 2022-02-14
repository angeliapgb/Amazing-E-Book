@extends('layouts.navigation')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th class="text-center">{{__('translate.account')}}</th>
                        <th colspan="2" class="text-center">{{__('translate.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($account as $account)
                        <tr>
                            <td>{{ $account->firstname. ' '. $account->middlename. ' '. $account->lastname. ' - '. $account->role_desc }}</td>
                            <td><a href="{{ route('updateRole', $account->id) }}">{{__('translate.update role')}}</a></td>
                            <td><a href="{{ route('userDelete', $account->id) }}">{{__('translate.delete')}}</a></td>
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
