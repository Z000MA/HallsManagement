@extends('layouts.site')
@section('content')
<header class="bg-primary bg-darken-1 py-5 mt-5">
    <div class="container px-3 px-lg-4 my-2">
        <div class="text-center text-white mt-4">
            <p class="text-center white font-large-4">New Order</p>
            <p class="text-white mb-3">a product by <a class="text-white font-weight-bold" href="http://www.Dashtechit.com" target="_blank">Dash tech</a></p>
        </div>
    </div>
</header>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-md-5">
                    <div class=" py-0">
                        <div class="swiper-centered-slides swiper-container p-0 swiper-container-initialized swiper-container-horizontal">
                            <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-199.523px, 0px, 0px);">
                                @foreach($hall->images as $image)
                                <div class="swiper-slide p-0 rounded swiper-shadow @if($loop->first) swiper-slide-prev @elseif($loop->last) swiper-slide-active @else swiper-slide-next @endif" style="margin-right: 30px;height:229px">
                                    <img src="{{asset('storage/halls/' . $image->name)}}" alt="" class="img-fluid" width="300" height="300">
                                </div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                            <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        </div>
                        <table class="table table-sm mt-3">
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
                        </table>
                </div>
                <div class="col-md-7">
                    <form action="{{route('orders.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="hall_id" value="{{$hall->id}}">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">@lang('reservations.period')</label>
                            <div class="col-md-9">
                                <select name="period_id" class="form-control">
                                    <option value="">[Select]</option>
                                    @foreach($periods as $period)
                                    <option value="{{$period->id}}">{{$period->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">@lang('orders.customer')</label>
                            <div class="col-md-9">
                                <input type="text" name="customer_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">@lang('orders.phone')</label>
                            <div class="col-md-9">
                                <input type="number" name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">@lang('orders.email')</label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">@lang('reservations.date')</label>
                            <div class="col-md-9">
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>
                        @foreach($hall->services as $service)
                        <div class="media pt-0 pb-2">
                            <img class="mr-3 avatar" src="../../../app-assets/img/portrait/small/avatar-s-12.png" alt="Avatar" width="35">
                            <div class="media-body">
                                <h4 class="font-medium-1 mb-0">{{$service->name}}</h4>
                                <p class="text-muted font-small-3 m-0">{{$service->price}}</p>
                            </div>
                            <div class="mt-1">
                                <div class="checkbox">
                                    <input type="checkbox" name="services[]" id="chk-{{$service->id}}" value="{{$service->id}}" @if($service->required == 1) disabled @endif checked>
                                    <label for="chk-{{$service->id}}"></label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-sm bg-light-primary">
                            <i class="ft-plus mr-1"></i>
                            @lang('reservations.create')
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection