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
            <div class="col-md-5">
                <div class="card-body py-0">
                    <div class="swiper-centered-slides swiper-container p-0 swiper-container-initialized swiper-container-horizontal">
                        <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-199.523px, 0px, 0px);">
                            @foreach($hall->images as $image)
                            <div class="swiper-slide p-0 rounded swiper-shadow @if($loop->first) swiper-slide-prev @elseif($loop->last) swiper-slide-active @else swiper-slide-next @endif" style="margin-right: 30px;height:155px">
                                <img src="{{asset('storage/halls/' . $image->name)}}" alt="" class="img-fluid" width="200" height="200">
                            </div>
                            @endforeach
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                        <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                    </div>
                </div>
            <div class="col-md-7 mt-md-0 mt-3">
                <table class="table table-sm">
                    <tr>
                        <td class="font-weight-bold">@lang('halls.name')</td>
                        <td>{{$hall->name}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">@lang('halls.capacity')</td>
                        <td>{{$hall->capacity}} person</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">@lang('halls.location')</td>
                        <td>{{$hall->location}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Reservations Count</td>
                        <td>{{$hall->reservations->count()}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">@lang('halls.advance')</td>
                        <td>{{$hall->advance}} SDG</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        @can('Halls-delete')
                            <form action="{{route('halls.destroy', $hall->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm bg-light-danger">
                                    <i class="ft-trash mr-1"></i>
                                    @lang('halls.delete')
                                </button>
                            </form>
                        @endcan
                        </td>
                    </tr>
                </table>
        </div>
        <div class="col-md-12">
            <div class="table-responsive"></div>
        </div>
        </div>
    </div>
</div>
@endsection