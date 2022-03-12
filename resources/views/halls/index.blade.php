@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('halls.halls')
            @can('Halls-create')
            <span class="@lang('site.pull')">
                <a href="{{route('halls.create')}}" class="btn btn-sm bg-light-primary">
                    <i class="ft-plus mr-1"></i>
                    @lang('halls.create')
                </a>
            </span>
            @endcan
        </h4>
    </div>
    <div class="card-body">
        @if(count($halls) > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <td>@lang('halls.name')</td>
                        <td>@lang('halls.capacity')</td>
                        <td>@lang('halls.location')</td>
                        <td>@lang('halls.advance')</td>
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
                            <div class="btn-group btn-group-sm">
                                @can('Halls-edit')
                                <a href="{{route('halls.edit', $hall->id)}}" class="btn btn-sm bg-light-warning">
                                    <i class="ft-edit"></i>
                                </a>
                                @endcan
                                <a href="{{route('halls.show', $hall->id)}}" class="btn btn-sm bg-light-info">
                                    <i class="ft-search"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="border border-danger rounded p-3 text-danger text-center">
        @lang('halls.noHalls')
        </p>
        @endif
    </div>
</div>
@endsection