@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('services.services')
            <span class="@lang('site.pull')">
                <a href="{{route('services.create')}}" class="btn btn-sm bg-light-primary">
                    <i class="ft-plus mr-1"></i>
                    @lang('services.create')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
            @if(count($services) > 0)
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <td class="font-weight-bold">@lang('services.name')</td>
                            <td class="font-weight-bold">@lang('services.hall')</td>
                            <td class="font-weight-bold">@lang('services.price')</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr>
                            <td>{{$service->name}}</td>
                            <td>{{$service->hall->name}}</td>
                            <td>{{$service->price}}</td>
                            <td>
                                @if($service->required == 1)
                                <span class="badge badge-pill bg-light-primary">Required</span>
                                @else
                                <span class="badge badge-pill bg-light-danger">Not Required</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{route('services.edit', $service->id)}}" class="btn btn-sm bg-light-warning"><i class="ft-edit"></i></a>
                                    <a href="{{route('services.show', $service->id)}}" class="btn btn-sm bg-light-info"><i class="ft-search"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p class="danger border border-danger rounded text-center p-3">
                No services registered!
            </p>
            @endif
        </div>
</div>
@endsection