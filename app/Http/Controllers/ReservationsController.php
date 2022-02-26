<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Lang;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\ReservationService;
use App\Models\ReservationPeriod;
use App\Models\Customer;
use App\Models\Hall;
use App\Models\State;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::orderBy('created_at', 'asc')->paginate(10);
        return view('reservations.index')->with('reservations', $reservations);
    }
    public function print($id)
    {
        $reservation = Reservation::find($id);
        if (!$reservation) {
            session()->flash('error', 'this reservation does not exist!');
            return redirect()->route('reservations.index');
        }
        return view('reservations.print')->with('reservation', $reservation);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $halls = Hall::all();
        $customers = Customer::all();
        $periods = ReservationPeriod::all();
        return view('reservations.create')
                        ->with('halls', $halls)
                        ->with('customers', $customers)
                        ->with('periods', $periods);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'hall_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'period_id' => 'required"integer',
            'date' => 'required|date'
        ]);
        $reservationCheck = Reservation::where('hall_id', $request->hall_id)
                                            ->whereDate('date', $request->date)
                                            ->where('period_id', $request->period_id)
                                            ->where('state_id', '!=', 3)->get();
        if (count($reservationCheck) > 0) {
            session()->flash('error', 'this date and period are not available for this hall!');
            return redirect()->route('reservations.create');
        }
        $input = $request->all();
        if(!$request->discount){
            $input['discount'] = 0;
        }
        $input['user_id'] = auth()->user()->id;
        $reservation = Reservation::create($input);
        foreach($reservation->services as $service) {
            if ($service->required == 1) {
                ReservationService::create([
                    'reservation_id' => $id,
                    'service_id' => $service->id,
                    'price' => $service->price
                ]);
            }
        }
        $reservation->sub_total = ReservationService::where('reservation_id', $reservation->id)->sum('price');
        $reservation->total = ReservationService::where('reservation_id', $reservation->id)->sum('price');
        $reservation->update();
        session()->flash('success', 'Reservation created!');
        return redirect()->route('reservations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        if (!$reservation) {
            session()->flash('error', 'this reservation does not exist!');
            return redirect()->route('reservations.index');
        }
        return view('reservations.show')->with('reservation', $reservation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::find($id);
        $halls = Hall::all();
        $customers = Customer::all();
        $periods = ReservationPeriod::all();
        return view('reservations.edit')
                        ->with('reservation', $reservation)
                        ->with('halls', $halls)
                        ->with('customers', $customers)
                        ->with('periods', $periods);
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
        $reservation = Reservation::find($id);
        if (!$reservation) {
            session()->flash('error', 'this reservation does not exist!');
            return redirect()->route('reservations.edit');
        }
        if ($request->hall_id) {
            $reservation->hall_id = $request->hall_id;
        }
        if ($request->customer_id) {
            $reservation->customer_id = $request->customer_id;
        }
        if ($request->period_id) {
            $reservation->period_id = $request->period_id;
        }
        if ($request->discount) {
            $reservation->discount = $request->discount;
        }
        $reservation->update();
        session()->flash('success', 'Reservation has been updated!');
        return redirect()->route('reservations.index');
    }
    public function updateServices(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        if(!$reservation) {
            session()->flash('success', 'this reservation does not exist!');
            return redirect()->route('reservations.show');
        }
        ReservationService::where('reservation_id', $id)->delete();
        foreach($reservation->hall->services as $service) {
            if ($service->required == 1) {
                ReservationService::create([
                    'reservation_id' => $id,
                    'service_id' => $service->id,
                    'price' => $service->price
                ]);
            }
        }
        if ($request->services) {
            foreach($request->services as $service) {
                $serv = Service::select('price')->find($service);
                ReservationService::create([
                    'reservation_id' => $id,
                    'service_id' => $service,
                    'price' => $serv->price
                ]);
            }
        }
        $reservation->sub_total = ReservationService::where('reservation_id', $reservation->id)->sum('price');
        $reservation->total = ReservationService::where('reservation_id', $reservation->id)->sum('price');
        $reservation->update();
        session()->flash('success', 'reservation updated successfully!');
        return redirect()->route('reservations.index');
    }
    public function reportsView()
    {
        return view('reservations.reports');
    }
    public function reports(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date_from' => 'required|date',
            'date_to' => 'required|date'
        ]);
        if ($validator->fails()) {
            session()->flash('error', $validator->errors());
            return redirect()->route('reservations.reports');
        }
        $reservations = Reservation::whereDate('date', '>=', $request->date_from)->OrwhereDate('date', '<=', $request->date_to)->get();
        return view('reservations.reports')->with('reservations', $reservations);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        if (!$reservation) {
            session()->flash('error', 'this reservation does not exist!');
            return redirect()->route('reservations.edit');
        }
        $reservation->state_id = 3;
        $reservation->update();
        session()->flash('success', 'Reservation has been canceled!');
        return redirect()->route('reservations.index');
    }
}
