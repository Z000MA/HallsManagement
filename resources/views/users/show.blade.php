@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">@lang('users.show')</h4>
        <span class="@lang('site.pull')">
            <a href="{{route('users.index')}}" class="btn btn-sm bg-light-primary">
                <i class="@lang('site.arrow') mr-1"></i>
                @lang('site.goBack')
            </a>
        </span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <span class="bg-light-primary rounded-circle avatar d-flex align-content-center flex-wrap" style="width:100px;height:100px;">
                    <label class="text-center w-100 font-large-2">{{substr($user->name, 0, 2)}}</label>
                </span>
            </div>
            <div class="col-md-8 mt-md-0 mt-3">
                <table class="table table-sm">
                    <tr>
                        <td class="font-weight-bold">@lang('users.name')</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">@lang('users.email')</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">@lang('users.phone')</td>
                        <td>{{$user->phone}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            @if($user->is_active == "1")
                            <form action="{{route('users.destroy', $user->id)}}" method="POST">
                            @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm bg-light-danger">
                                    <i class="ft-power mr-1"></i>
                                    @lang('users.delete')
                                </button>
                            </form>
                            @else
                            <form action="{{route('users.activate', $user->id)}}" method="POST">
                            @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <button class="btn btn-sm bg-light-success">
                                    <i class="ft-check mr-1"></i>
                                    @lang('users.activate')
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection