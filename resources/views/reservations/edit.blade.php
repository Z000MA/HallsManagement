@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('reservatios.update')
            <span class="@lang('site.pull')">
                <a href="{{route('reservations.index')}}" class="btn btn-sm bg-light-primary">
                    <i class="@lang('site.arrow') mr-1"></i>
                    @lang('site.goBack')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{route('reservations.update', $reservation->id)}}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('reservations.date')</label>
                <div class="col-md-9">
                    <input type="date" name="date" class="form-control" value="{{$reservation->date}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('reservations.hall')</label>
                <div class="col-md-9">
                    <select name="hall_id" class="form-control">
                        <option value="">[Select]</option>
                        @foreach($halls as $hall)
                        <option value="{{$hall->id}}" @if($reservation->hall_id == $hall->id) selected @endif >{{$hall->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('reservations.customer')</label>
                <div class="col-md-9">
                    <select name="customer_id" id="customers" class="form-control">
                        <option value="">[Select]</option>
                        @foreach($customers as $customer)
                        <option value="{{$customer->id}}" @if($reservation->customer_id == $customer->id) selected @endif>{{$customer->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('reservations.period')</label>
                <div class="col-md-9">
                    <select name="period_id" class="form-control">
                        <option value="">[Select]</option>
                        @foreach($periods as $period)
                        <option value="{{$period->id}}" @if($reservation->period_id == $period->id) selected @endif>{{$period->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('reservations.discount')</label>
                <div class="col-md-9">
                    <input type="text" name="name" class="form-control" value="{{$reservation->discount}}">
                </div>
            </div>
            <input type="hidden" name="_method" value="PUT">
            <button type="submit" class="btn btn-sm bg-light-primary">
                <i class="ft-plus mr-1"></i>
                @lang('reservations.update')
            </button>
        </form>
    </div>
</div>
@endsection