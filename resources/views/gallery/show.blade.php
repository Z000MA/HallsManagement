@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('gallery.delete')
            <span class="@lang('site.pull')">
                <a href="{{route('gallery.index')}}" class="btn btn-sm bg-light-primary">
                    <i class="@lang('site.arrow') mr-1"></i>
                    @lang('site.goBack')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-5">
                <img src="{{asset('storage/halls/' . $image->name)}}" alt="" class="img-fluid">
            </div>
            <div class="col-md-7">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">@lang('gallery.img')</td>
                                <td>{{$image->name}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">@lang('gallery.created_at')</td>
                                <td>{{date('Y-m-d', strtotime($image->created_at))}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">@lang('gallery.hall')</td>
                                <td>{{$image->hall->name}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <form action="{{route('gallery.destroy', $image->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm bg-light-danger">
                                            <i class="ft-trash mr-1"></i>
                                            @lang('gallery.delete')
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection