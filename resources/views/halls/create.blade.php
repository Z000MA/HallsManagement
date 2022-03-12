@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('halls.create')
            <span class="@lang('site.pull')">
                <a href="{{route('halls.index')}}" class="btn btn-sm bg-light-primary">
                    <i class="@lang('site.arrow')"></i>
                    @lang('site.goBack')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{route('halls.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('halls.name')</label>
                <div class="col-md-9">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('halls.capacity')</label>
                <div class="col-md-9">
                    <input type="number" name="capacity" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('halls.advance')</label>
                <div class="col-md-9">
                    <input type="text" name="advance" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('halls.location')</label>
                <div class="col-md-9">
                    <input type="text" name="location" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('halls.google_location')</label>
                <div class="col-md-9">
                    <input type="text" name="google_location" class="form-control">
                </div>
            </div>
            @can('Halls-create')
            <button type="submit" class="btn btn-sm bg-light-primary">@lang('halls.create')</button>
            @endcan
        </form>
    </div>
</div>
@endsection