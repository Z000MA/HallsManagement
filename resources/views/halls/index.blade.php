@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            Halls Management
            <span class="@lang('site.pull')">
            <a href="{{route('halls.create')}}" class="btn btn-sm bg-light-primary">
                <i class="ft-plus mr-1"></i>
                Create
            </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        @if(count($halls) > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>capacity</td>
                        <td>location</td>
                        <td>advance</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($halls as $hall)
                    <tr>
                        <td>{{$hall->name}}</td>
                        <td>{{$hall->capacity}}</td>
                        <td>{{$hall->location}}</td>
                        <td>{{$hall->advance}}</td>
                        <td>
                            <a href="{{route('halls.show', $hall->id)}}" class="btn btn-sm bg-light-info">
                                <i class="ft-search"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="border border-danger rounded p-3 text-danger text-center">
            no halls registered!
        </p>
        @endif
    </div>
</div>
@endsection