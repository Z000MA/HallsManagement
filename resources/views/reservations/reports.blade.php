@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title primary">
                @lang('reservatios.reports')
                <span class="@lang('site.pull')">
                    <a href="{{route('reservations.index')}}" class="btn btn-sm bg-light-primary">
                        <i class="@lang('site.arrow') mr-1"></i>
                        @lang('site.goBack')
                    </a>
                </span>
            </h4>
        </div>
        <div class="card-body">
            <form action="{{route('reservations.getReports')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">@lang('reservations.dateFrom')</label>
                            <div class="col-md-9">
                                <input type="date" name="date_from" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">@lang('reservations.dateTo')</label>
                            <div class="col-md-9">
                                <input type="date" name="date_to" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-sm bg-light-primary">
                            @lang('reservations.reports')
                        </button>
                    </div>
                </div>
            </form>
            @if(isset($reservations))
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
            </div>
            @endif
        </div>
    </div>
@endsection