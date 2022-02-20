@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('customers.create')
            <span class="@lang('site.pull') mr-1">
                <a href="{{route('customers.index')}}" class="btn btn-sm bg-light-primary">
                    <i class="@lang('site.arrow') mr-1"></i>
                    @lang('site.goBack')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{route('customers.store')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('customers.name')</label>
                <div class="col-md-9">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('customers.email')</label>
                <div class="col-md-9">
                    <input type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('customers.phone')</label>
                <div class="col-md-9">
                    <input type="number" name="phone" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-sm bg-light-primary">
                @lang('customers.create')
            </button>
        </form>
    </div>
</div>
@endsection