@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('reservations.show')
            <span class="@lang('site.pull')">
                <a href="{{route('reservations.index')}}" class="btn btn-sm bg-light-primary">
                    <i class="@lang('site.arrow') mr-1"></i>
                    @lang('site.goBack')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <tr>
                                <td class="font-weight-sm"><i class="ft-package mr-1"></i>@lang('reservations.hall')</td>
                                <td>{{$reservation->hall->name}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-sm"><i class="ft-user mr-1"></i>@lang('reservations.customer')</td>
                                <td>{{$reservation->customer->name}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-sm"><i class="ft-clock mr-1"></i>@lang('reservations.period')</td>
                                <td>{{$reservation->period->name}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-sm"><i class="ft-dollar-sign mr-1"></i>@lang('reservations.total')</td>
                                <td>{{$reservation->sub_total}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-sm"><i class="ft-percent mr-1"></i>@lang('reservations.discount')</td>
                                <td>{{$reservation->discount}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-sm"><i class="icon-calculator mr-1"></i>@lang('reservations.total')</td>
                                <td>{{$reservation->total}}</td>
                            </tr>
                        </table>
                        <div class="@lang('site.pull')">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                <a href="{{route('reservations.edit', $reservation->id)}}" class="btn btn-sm bg-light-info"><i class="ft-info mr-1"></i>@lang('reservations.update')</a>
                                </li>
                                <li class="list-inline-item">
                                    <form action="{{route('reservations.destroy', $reservation->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm bg-light-danger">
                                            <i class="ft-trash mr-1"></i>
                                            @lang('reservations.cancel')
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if(count($reservation->payments) > 0)
                    <h4 class="card-title primary">@lang('payments.index')</h4>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <td>@lang('payments.value')</td>
                                    <td>@lang('payments.date')</td>
                                    <td>@lang('payments.user')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservation->payments as $payment)
                                <tr>
                                    <td>{{$payment->value}}</td>
                                    <td>{{date('d/m/Y', strtotime($payment->created_at))}}</td>
                                    <td>{{$payment->user->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
                <div class="col-md-6">
                <form action="{{route('reservations.services', $reservation->id)}}" method="POST">
                @csrf
                    @foreach($reservation->hall->services as $service)
                        <div class="media pt-0 pb-2">
                            <img class="mr-3 avatar" src="../../../app-assets/img/portrait/small/avatar-s-12.png" alt="Avatar" width="35">
                            <div class="media-body">
                                <h4 class="font-medium-1 mb-0">{{$service->name}}</h4>
                                <p class="text-muted font-small-3 m-0">{{$service->price}}</p>
                            </div>
                            <div class="mt-1">
                                <div class="checkbox">
                                    <input type="checkbox" name="services[]" id="chk-{{$service->id}}" value="{{$service->id}}" @if($service->required == 1) disabled @endif checked>
                                    <label for="chk-{{$service->id}}"></label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <div class="@lang('site.pull')">
                            <button type="submit" class="btn btn-sm bg-light-warning"><i class="ft-refresh-ccw mr-1"></i>@lang('reservations.update')</button>
                        </div>
                    </div>
                </form>
            </div>
        
    </div>
</div>
@endsection