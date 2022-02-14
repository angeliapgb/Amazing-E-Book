@extends('layouts.navigation')

@section('content')
<div class="container">
    <div class="">
        @foreach($account as $account)
            <form method="POST" action="{{ route('saveRole', $account->id) }}">
                @csrf
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>{{ $account->firstname. ' '. $account->middlename. ' '. $account->lastname }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group row">
                                        <label for="role_id" class="col-md-2 col-form-label ">{{__('translate.role')}}</label>
                
                                        <div class="col-md-2">
                                            <select class="form-control" name="role_id">
                                                <option value="2">User</option>
                                                <option value="1">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-warning">
                                                {{__('translate.save')}}
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <p>{{ $account->firstname. ' '. $account->middlename. ' '. $account->lastname }}</p> --}}

            </form>
        @endforeach
    </div>
</div>
@endsection
