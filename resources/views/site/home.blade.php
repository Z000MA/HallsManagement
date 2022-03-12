@extends('layouts.site')
@section('content')
<header class="bg-primary bg-darken-1 py-5 mt-5">
    <div class="container px-3 px-lg-4 my-2">
        <div class="text-center text-white mt-4">
            <p class="text-center white font-large-4">Halls System</p>
            <p class="text-white mb-3">a product by <a class="text-white font-weight-bold" href="http://www.Dashtechit.com" target="_blank">Dash tech</a></p>
        </div>
    </div>
</header>
<div class="container">
    <p class="mt-3 mb-3 text-justify">
        At Hallmaster, we understand how difficult it is to generate income for Halls and Venues. Many are run by Volunteers in their spare time, so managing the Bookings and Invoices can be extremely time consuming. With the Hallmaster Online Booking and Invoicing System, you can address these issues as Hallmaster enables Trustees and Committee Members to come together in one simple Online Hall and Venue booking and invoicing payment tracking system. This helps to maximise the ability to rent out empty rooms, halls and clubhouses and prevents duplicate reservations.
        Hallmaster can be integrated into your own website and instantly display availability of your rooms and facilities, take provisional bookings for you and let people find out what's happening in your area and where to find details of events or classes you hold.
    </p>
    <div class="row justify-content-center mb-3">
        <div class="col-md-2 col-6 mb-3 mb-md-0">
            <div class="bg-light-primary cir">
                <i class="ft-calendar fa-4x"></i>
                <p class="text-center font-medium-3 font-weight-bold">Bookings</p>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3 mb-md-0">
            <div class="bg-light-primary cir">
                <i class="ft-edit fa-4x"></i>
                <p class="text-center font-medium-3 font-weight-bold">Invoices</p>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3 mb-md-0">
            <div class="bg-light-primary cir">
                <i class="ft-upload-cloud fa-4x"></i>
                <p class="text-center font-medium-3 font-weight-bold">Cloud based</p>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3 mb-md-0">
            <div class="bg-light-primary cir">
                <i class="ft-trending-up fa-4x"></i>
                <p class="text-center font-medium-3 font-weight-bold">Reports</p>
            </div>
        </div>
    </div>
    <div class="mt-4 mb-4">
        <h3 class="text-center">Our halls</3>
        <p class="font-medium-1">select the one that suites you most</p>
    </div>
    <div class="row justify-content-center mb-4">
        @foreach($halls as $hall)
        <div class="col-md-3 col-6 mb-3 text-center">
            <p class="text-center">{{$hall->name}}</p>
            <img src="{{asset('app-assets/img/gallery/1.jpg')}}" alt="" class="img-fluid rounded">
            <a href="{{route('orders.create', $hall->id)}}" class="btn btn-sm bg-light-primary mt-2">Book now</a>
        </div>
        @endforeach
    </div>
</div>
@endsection