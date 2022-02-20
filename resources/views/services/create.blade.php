@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('services.create')
            <span class="@lang('site.pull')">
                <a href="{{route('services.index')}}" class="btn btn-sm bg-light-primary">
                    <i class="@lang('site.arrow')"></i>
                    @lang('site.goBack')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{route('services.store')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('services.name')</label>
                <div class="col-md-9">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('services.hall')</label>
                <div class="col-md-9">
                    <select name="hall_id" class="form-control">
                        <option value="">[Select]</option>
                        @foreach($halls as $hall)
                        <option value="{{$hall->id}}">{{$hall->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('services.description')</label>
                <div class="col-md-9">
                    <textarea name="description" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('services.price')</label>
                <div class="col-md-9">
                    <input type="number" name="price" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Required</label>
                <div class="col-md-9">
                    <div class="checkbox">
                        <input type="checkbox" id="required" name="required">
                        <label for="required"></label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm bg-light-primary">
                <i class="ft-plus mr-1"></i>
                @lang('services.create')
            </button>
        </form>
    </div>
</div>
@endsection