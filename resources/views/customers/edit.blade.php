@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('customers.update')
            <span class="@lang('site.pull') mr-1">
                <a href="{{route('customers.index')}}" class="btn btn-sm bg-light-primary">
                    <i class="@lang('site.arrow') mr-1"></i>
                    @lang('site.goBack')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{route('customers.update', $customer->id)}}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('customers.name')</label>
                <div class="col-md-9">
                    <input type="text" name="name" class="form-control" value="{{$customer->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('customers.email')</label>
                <div class="col-md-9">
                    <input type="email" name="email" class="form-control" value="{{$customer->email}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('customers.phone')</label>
                <div class="col-md-9">
                    <input type="number" name="phone" class="form-control" value="{{$customer->phone}}">
                </div>
            </div>
            <input type="hidden" name="_method" value="PUT">
            <button type="submit" class="btn btn-sm bg-light-warning">
                @lang('customers.update')
            </button>
        </form>
    </div>
</div>
@endsection