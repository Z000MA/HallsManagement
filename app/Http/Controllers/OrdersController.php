<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hall;
use App\Models\Service;
use App\Models\Reservation;
use App\Models\ReservationPeriod;
use App\Models\Order;
use App\Models\OrderService;
use Lang;
use Validator;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $hall = Hall::find($id);
        $halls = Hall::all();
        $periods = ReservationPeriod::all();
        return view('orders.create')->with('halls', $halls)->with('periods', $periods)->with('selected', $hall);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hall_id' => 'required|integer',
            'period_id' => 'required|integer',
            'customer_name' => 'required|string',
            'date' => 'required|date',
            'services' => 'required|array'
        ]);
        if ($validator->fails()) {
            session('error', $validator->errors());
            return redirect()->route('orders.create', $request->hall_id);
        }
        $reservationCheck = Reservation::where('hall_id', $request->hall_id)
                                            ->whereDate('date', $request->date)
                                            ->where('period_id', $request->period_id)
                                            ->where('state_id', '!=', 3)->get();
        if (count($reservationCheck) > 0) {
            session()->flash('error', 'this date and period are not available for this hall!');
            return redirect()->route('orders.create', $request->hall_id);
        }
        $input = $request->all();
        $input['state_id'] = 1;
        $order = Order::create($input);
        foreach ($request->services as $service)
        {
            $serve = Service::find($service);
            OrderService::create([
                'order_id' => $order->id,
                'service_id' => $serve->id,
                'price' => $serve->price,
                'qty' => 1,
                'sub' => $serve->price
            ]);
        }
        session()->flash('success', 'order saved successfully!');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
