@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            Hall information
            <span class="@lang('site.pull')">
                <a href="{{route('halls.index')}}" class="btn btn-sm bg-light-primary">
                    <i class="@lang('site.arrow') mr-1"></i>
                    @lang('site.goBack')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-7">
                <table class="table table-sm">
                    <tr>
                        <td class="font-weight-bold">Name</td>
                        <td>{{$hall->name}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Capacity</td>
                        <td>{{$hall->capacity}} person</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Location</td>
                        <td>{{$hall->location}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Advance value</td>
                        <td>{{$hall->advance}} SDG</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection