<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Reservation;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'asc')->paginate(10);
        return view('payments.index')->with('payments', $payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservations = Reservation::where('state_id', 1)->get();
        return view('payments.create')->with('reservations', $reservations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = Reservation::find($request->reservation_id);
        if (!$reservation) {
            session()->flash('error', 'this reservation does not exist!');
            return redirect()->route('payments.create');
        }
        Payment::create([
            'reservation_id' => $request->reservation_id,
            'payment_method' => $request->pay_method,
            'value' => $request->value,
            'user_id' => auth()->user()->id,
            'remarks' => $request->remarks
        ]);
        session()->flash('success', 'payment has been saved successfully!');
        return redirect()->route('payments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            session()->flash('error', 'this payment does not exist!');
            return redirect()->route('payments.index');
        }
        return view('payments.show')->with('payment', $payment);
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
        $payment = Payment::find($id);
        if (!$payment) {
            session()->flash('error', 'this payment does not exist!');
        }
        $payment->delete();
        session()->flash('success', 'payment deleted!');
        return redirect()->route('payments.index');
    }
}
