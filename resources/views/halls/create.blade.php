@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            Create Hall
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
                <label class="col-md-3 col-form-label">Name</label>
                <div class="col-md-9">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Capacity</label>
                <div class="col-md-9">
                    <input type="number" name="capacity" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Advance</label>
                <div class="col-md-9">
                    <input type="text" name="advance" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Location</label>
                <div class="col-md-9">
                    <input type="text" name="location" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Google location</label>
                <div class="col-md-9">
                    <input type="text" name="google_location" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">image #1</label>
                <div class="col-md-9">
                    <input type="file" name="img1" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">image #2</label>
                <div class="col-md-9">
                    <input type="file" name="img2" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">image #3</label>
                <div class="col-md-9">
                    <input type="file" name="img3" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-sm bg-light-primary">Add new hall</button>
        </form>
    </div>
</div>
@endsection