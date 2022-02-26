@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('roles.index')
            <span class="@lang('site.pull')">
                @can('role-create')
                <a class="btn btn-sm bg-light-primary" href="{{route('roles.create')}}">
                    <i class="ft-plus mr-1"></i>
                    @lang('roles.create')
                </a>
                @endcan
            </span>
        </h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="font-weight-bold">@lang('role.name')</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{$role->name}}</td>
                        <td>
                            <a class="btn btn-sm bg-light-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                            @can('role-edit')
                            <a class="btn btn-sm bg-light-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-sm bg-light-danger']) !!}
                            {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{!! $roles->render() !!}
@endsection