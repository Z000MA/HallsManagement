@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('services.show')
            <span class="@lang('site.pull')">
                <a href="{{route('services.index')}}" class="btn btn-sm bg-light-primary">
                    <i class="@lang('site.arrow') mr-1"></i>
                    @lang('site.goBack')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-7 mt-md-0 mt-3">
                <table class="table table-sm">
                    <tr>
                        <td class="font-weight-bold">@lang('services.name')</td>
                        <td>{{$service->name}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">@lang('services.price')</td>
                        <td>{{$service->price}} SDG</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">@lang('services.hall')</td>
                        <td>{{$service->hall->name}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold"></td>
                        <td>
                            @if($service->required == 1)
                            <span class="badge badge-pill bg-light-primary">Required</span>
                            @else
                            <span class="badge badge-pill bg-light-danger">Not Required</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">@lang('services.description')</td>
                        <td>{{$service->description}}</td:colspan>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <form action="{{route('services.destroy', $service->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm bg-light-danger">
                                    <i class="ft-trash mr-1"></i>
                                    Delete service
                                </button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection