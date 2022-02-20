@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">@lang('customers.show')</h4>
        <span class="@lang('site.pull')">
            <a href="{{route('customers.index')}}" class="btn btn-sm bg-light-primary">
                <i class="@lang('site.arrow') mr-1"></i>
                @lang('site.goBack')
            </a>
        </span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <span class="bg-light-primary rounded-circle avatar d-flex align-content-center flex-wrap" style="width:100px;height:100px;">
                    <label class="text-center w-100 font-large-2">{{substr($customer->name, 0, 2)}}</label>
                </span>
            </div>
            <div class="col-md-8 mt-md-0 mt-3">
                <table class="table table-sm">
                    <tr>
                        <td class="font-weight-bold">@lang('customers.name')</td>
                        <td>{{$customer->name}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">@lang('customers.email')</td>
                        <td>{{$customer->email}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">@lang('customers.phone')</td>
                        <td>{{$customer->phone}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            @if($customer->active == 1)
                            <form action="{{route('customers.destroy', $customer->id)}}" method="POST">
                            @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm bg-light-danger">
                                    <i class="ft-power mr-1"></i>
                                    @lang('customers.delete')
                                </button>
                            </form>
                            @else
                            <form action="{{route('customers.activate', $customer->id)}}" method="POST">
                            @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <button class="btn btn-sm bg-light-success">
                                    <i class="ft-check mr-1"></i>
                                    @lang('customers.activate')
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