@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('payments.index')
            <span class="@lang('site.pull')">
                <a href="{{route('payments.create')}}" class="btn btn-sm bg-light-primary">
                    <i class="ft-plus mr-1"></i>
                    @lang('payments.create')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        @if(count($payments) > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <td>Customer</td>
                        <td>Date</td>
                        <td>Value</td>
                        <td>Hall</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td>{{$payment->reservation->customer->name}}</td>
                        <td>{{date('d/m/Y', strtotime($payment->created_at))}}</td>
                        <td>{{$payment->value}}</td>
                        <td>{{$payment->reservation->hall->name}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('payments.show', $payment->id)}}" class="btn bg-light-warning"><i class="ft-edit"></i></a>
                                <a href="" class="btn bg-light-info"><i class="ft-printer"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center danger border border-danger rounded p-3">
            @lang('payments.NoPayments')
        </p>
        @endif
    </div>
</div>
@endsection