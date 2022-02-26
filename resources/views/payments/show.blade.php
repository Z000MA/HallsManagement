@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="cad-title primary">
            @lang('payments.show')
            <span class="@lang('site.pull')">
                <a href="{{route('payments.index')}}" class="btn btn-sm bg-light-primary">
                    <i class="@lang('site.arrow')"></i>
                    @lang('site.goBack')
                </a>
            </span>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td><i class="ft-calendar mr-1"></i>@lang('payments.date')</td>
                                <td>{{date('d/m/Y', strtotime($payment->created_at))}}</td>
                            </tr>
                            <tr>
                                <td><i class="ft-user mr-1"></i>@lang('payments.customer')</td>
                                <td>{{$payment->reservation->customer->name}}</td>
                            </tr>
                            <tr>
                                <td><i class="ft-package mr-1"></i>@lang('payments.hall')</td>
                                <td>{{$payment->reservation->hall->name}}</td>
                            </tr>
                            <tr>
                                <td><i class="ft-dollar-sign mr-1"></i>@lang('payments.value')</td>
                                <td>{{$payment->value}} SDG</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="@lang('site.pull')">
                        <form action="{{route('payments.destroy', $payment->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            @can('Payments-delete')
                            <button type="submit" class="btn btn-sm bg-light-danger">
                                <i class="ft-trash mr-1"></i>
                                @lang('payments.delete')
                            </button>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection