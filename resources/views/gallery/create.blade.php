@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title primary">
            @lang('gallery.create')
            <span class="@lang('site.pull')">
                <a href="{{route('gallery.index')}}" class="btn btn-sm bg-light-primary">
                    <i class="@lang('site.arrow') mr-1"></i>
                    @lang('site.goBack')
                </a>
            </span>
        </h3>
    </div>
    <div class="card-body">
        <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-md-3 col-form-label">@lang('gallery.hall')</label>
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
                <label class="col-md-3 col-form-label">@lang('gallery.img')</label>
                <div class="col-md-9">
                    <input type="file" name="img" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-sm bg-light-primary">@lang('gallery.create')</button>
        </form>
    </div>
</div>
@endsection