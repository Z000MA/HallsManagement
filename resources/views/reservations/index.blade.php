@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('reservations.reservations')
            @can('Reservations-create')
            <span class="@lang('site.pull')">
                <a href="{{route('reservations.create')}}" class="btn btn-sm bg-light-primary">
                    <i class="ft-plus mr-1"></i>
                    @lang('reservations.create')
                </a>
            </span>
            @endcan
        </h4>
    </div>
    <div class="card-body">
        @if(count($reservations) > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>@lang('reservations.hall')</td>
                        <td>@lang('reservations.customer')</td>
                        <td>@lang('reservations.total')</td>
                        <td>@lang('reservations.totalPayed')</td>
                        <td>@lang('reservations.remaining')</td>
                        <td>@lang('reservations.state')</td>
                        <td>@lang('reservations.user')</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                    <tr>
                        <td class="text-center">
                            <span class="bg-light-primary rounded-circle avatar d-flex align-content-center flex-wrap" style="width:40px;height:40px;">
                            <i class="ft-briefcase text-center fa-2x w-100"></i>
                            </span>
                        </td>
                        <td>
                            <h6 class="mb-0">{{$reservation->hall->name}}</h5>
                            <span class="text-muted font-small-3">
                            {{$reservation->date}}
                            </span>
                        </td>
                        <td>
                            <h6 class="mb-0">{{$reservation->customer->name}}</h5>
                            <span class="text-muted font-small-3">
                            {{$reservation->period->name}}
                            </span>
                        </td>
                        <td>{{$reservation->total}}</td>
                        <td>{{$reservation->payments->sum('value')}}</td>
                        <td>{{$reservation->total - $reservation->payments->sum('value')}}</td>
                        <td>
                            <span class="badge badge-pill @if($reservation->state_id == 1)bg-light-primary @elseif($reservation->state_id == 2)bg-light-success @else bg-light-danger @endif">
                            {{$reservation->state->name}}
                            </span>
                        </td>
                        <td>{{$reservation->user->name}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                @can('Reservations-edit')
                                <a href="{{route('reservations.show', $reservation->id)}}" class="btn btn-sm bg-light-warning"><i class="ft-edit"></i></a>
                                @endcan
                                <a href="{{route('reservations.print', $reservation->id)}}" target="_blank" class="btn btn-sm bg-light-info"><i class="ft-printer"></i></a>
                                <a href="" class="btn btn-sm bg-light-danger"><i class="ft-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$reservations->links()}}
        </div>
        @else
        <p class="text-center danger border border danger rounded p-3">
            @lang('site.NoReservations')
        </p>
        @endif
    </div>
</div>
@endsection