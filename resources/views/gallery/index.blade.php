@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title primary">
            @lang('gallery.index')
            <span class="@lang('site.pull')">
                <a href="{{route('gallery.create')}}" class="btn btn-sm bg-light-primary">
                    <i class="ft-plus mr-1"></i>
                    @lang('gallery.create')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($images as $image)
            <div class="col-md-2 col-6 mt-md-0 mt-2">
                <div class="img-box">
                    <img src="{{asset('storage/halls/' . $image->name)}}" alt="">
                    <div class="icon">
                            <a href="{{route('gallery.show', $image->id)}}">
                                <i class="ft-trash"></i>
                            </a>
                    </div>
                    <div class="content">
                        <p>{{$image->hall->name}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection