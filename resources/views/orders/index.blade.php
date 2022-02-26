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
            <table class="table table-sm table-responsive">
                <thead>
                    <tr>
                        <td class="font-weight-bold">@lang('orders.hall')</td>
                        <td class="font-weight-bold">@lang('orders.customer')</td>
                        <td class="font-weight-bold">@lang('orders.period')</td>
                        <td class="font-weight-bold">@lang('orders.date')</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->hall->name}}</td>
                        <td>{{$order->customer_name}}</td>
                        <td>{{$order->date}}</td>
                        <td></td>
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