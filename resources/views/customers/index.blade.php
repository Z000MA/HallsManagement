@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('customers.customers')
            <span class="@lang('site.pull')">
                <a href="{{route('customers.create')}}" class="btn btn-sm bg-light-primary">
                    <i class="ft-plus mr-1"></i>
                    @lang('customers.create')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        @if(count($customers) > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <td></td>
                        <td>@lang('customers.name')</td>
                        <td>@lang('customers.email')</td>
                        <td>@lang('customers.phone')</td>
                        <td>@lang('customers.orders')</td>
                        <td>@lang('customers.state')</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td class="text-center">
                            <span class="bg-light-primary rounded-circle avatar d-flex align-content-center flex-wrap" style="width:30px;height:30px;">
                            <label class="text-center w-100 font-medium-1">{{substr($customer->name, 0, 2)}}</label>
                            </span>
                        </td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->phone}}</td>
                        <td></td>
                        <td>
                            @if($customer->active == 1)
                            <span class="badge badge-pill bg-light-success">active</span>
                            @else
                            <span class="badge badge-pill bg-light-danger">disabled</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('customers.edit', $customer->id)}}" class="btn bg-light-warning"><i class="ft-edit"></i></a>
                                <a href="{{route('customers.show', $customer->id)}}" class="btn bg-light-info"><i class="ft-search"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$customers->links()}}
        @else
        <p class="text-center danger border border-danger p-3 rounded">
            @lang('customers.noCustomersRegistered')
        </p>
        @endif
    </div>
</div>
@endsection