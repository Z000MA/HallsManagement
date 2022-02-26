@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title primary">
            Users
            <span class="pull-right">
                <a href="{{route('users.create')}}" class="btn btn-sm bg-light-primary">
                    <i class="ft-plus mr-1"></i>
                    @lang('users.create')
                </a>
            </span>
        </h3>
    </div>
    <div class="card-body">
        @if(count($users) > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <td>#</td>
                    <td>@lang('users.name')</td>
                    <td>@lang('users.email')</td>
                    <td>@lang('users.phone')</td>
                    <td>@lang('users.role')</td>
                    <td>@lang('users.state')</td>
                    <td></td>
                </thhead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="text-center">
                            <span class="bg-light-primary rounded-circle avatar d-flex align-content-center flex-wrap" style="width:30px;height:30px;">
                                <label class="text-center w-100 font-medium-1">{{substr($user->name, 0, 2)}}</label>
                            </span>
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $role)
                            <label class="badge badge-success">{{ $role }}</label>
                            @endforeach
                         @endif
                        </td>
                        <td>
                            @if($user->is_active == "1")
                            <span class="badge badge-pill bg-light-success">active</span>
                            @else
                            <span class="badge badge-pill bg-light-danger">banned</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm bg-light-warning"><i class="ft-edit"></i></a>
                                <a href="{{route('users.show', $user->id)}}" class="btn btn-sm bg-light-danger"><i class="ft-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="border border-danger rounded p-3 text-center">
            no users registered!
        </p>
        @endif
    </div>
</div>
@endsection