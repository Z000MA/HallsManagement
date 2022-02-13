@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('users.create')
            <span class="@lang('site.pull')">
                <a href="{{route('users.index')}}" class="btn btn-sm bg-light-primary">
                    <i class="@lang('site.arrow')"></i>
                    @lang('site.goBack')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{route('users.store')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('users.name')</label>
                <div class="col-md-9">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('users.email')</label>
                <div class="col-md-9">
                    <input type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('users.phone')</label>
                <div class="col-md-9">
                    <input type="text" name="phone" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-sm bg-light-primary">@lang('users.create')</button>
        </form>
    </div>
</div>
@endsection