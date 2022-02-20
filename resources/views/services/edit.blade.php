@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('services.update')
            <span class="@lang('site.pull')">
                <a href="{{route('services.index')}}" class="btn btn-sm bg-light-primary">
                    <i class="@lang('site.arrow')"></i>
                    @lang('site.goBack')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{route('services.update', $service->id)}}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('services.name')</label>
                <div class="col-md-9">
                    <input type="text" name="name" class="form-control" value="{{$service->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('services.hall')</label>
                <div class="col-md-9">
                    <select name="hall_id" class="form-control">
                        <option value="">[Select]</option>
                        @foreach($halls as $hall)
                        <option value="{{$hall->id}}" selected="@if ($service->hall_id = $hall->id) selected @endif">{{$hall->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('services.description')</label>
                <div class="col-md-9">
                    <textarea name="description" class="form-control">{{$service->description}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('services.price')</label>
                <div class="col-md-9">
                    <input type="number" name="price" class="form-control" value="{{$service->price}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Required</label>
                <div class="col-md-9">
                    <div class="checkbox">
                        <input type="checkbox" id="required" name="required" checked="@if ($service->required == 1) checked @endif">
                        <label for="required"></label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="_method" value="PUT">
            <button type="submit" class="btn btn-sm bg-light-warning">
                <i class="ft-refresh-ccw mr-1"></i>
                @lang('services.update')
            </button>
        </form>
    </div>
</div>
@endsection