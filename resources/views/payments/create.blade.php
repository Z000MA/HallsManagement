@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('payments.create')
            <span class="@lang('site.pull')">
                <a href="{{route('payments.index')}}" class="btn btn-sm bg-light-primary">
                    <i class="@lang('site.arrow') mr-1"></i>
                    @lang('site.goBack')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{route('payments.store')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('payments.reservation')</label>
                <div class="col-md-9">
                    <select name="reservation_id" id="customers" class="form-control">
                        <option value="">[Select]</option>
                        @foreach($reservations as $reservation)
                        <option value="{{$reservation->id}}">{{$reservation->customer->name . ' / ' . date('d/m/Y', strtotime($reservation->date))}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('payments.paymentMethod')</label>
                <div class="col-md-9">
                    <select name="pay_method" id="customers" class="form-control">
                        <option value="Cash">Cash</option>
                        <option value="Bankak">Bankak</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('payments.value')</label>
                <div class="col-md-9">
                    <input type="number" name="value" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('payments.remarks')</label>
                <div class="col-md-9">
                    <textarea name="remarks" class="form-control" style="height:100px;"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-btn-sm bg-light-primary">
                <i class="ft-plus mr-1"></i>
                @lang('payments.create')
            </button>
        </form>
    </div>
</div>
@endsection