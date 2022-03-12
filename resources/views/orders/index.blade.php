@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('orders.index')
        </h4>
    </div>
    <div class="card-body">
        @if(count($orders) > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <td class="font-weight-bold">@lang('orders.hall')</td>
                        <td class="font-weight-bold">@lang('orders.customer')</td>
                        <td class="font-weight-bold">@lang('orders.phone')</td>
                        <td class="font-weight-bold">@lang('orders.email')</td>
                        <td class="font-weight-bold">@lang('orders.period')</td>
                        <td class="font-weight-bold">@lang('orders.date')</td>
                        <td class="font-weight-bold">@lang('orders.total')</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->hall->name}}</td>
                        <td>{{$order->customer_name}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->period->name}}</td>
                        <td>{{$order->date}}</td>
                        <td>{{$order->services->sum('price')}}</td>
                        <td>
                            @if($order->state_id == 1)
                            <span class="badge badge-pill bg-light-primary">pending</span>
                            @else
                            <span class="badge badge-pill bg-light-danger">Not Required</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        @endif
    </div>
</div>
@endsection