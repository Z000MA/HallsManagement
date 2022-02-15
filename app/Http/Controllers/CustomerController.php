<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Lang;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'desc')->paginate(10);
        return view('customers.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string'
        ]);
        if ($validator->fails()) {
            return redirect()->route('customers.create')->with('errors', $validator->errors());
        }
        Customer::create($request->all());
        session()->flash('success', 'new customer added successfully!');
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customers.show')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit')->with('customer', $customer);
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
        $customer = Customer::find($id);
        if (!$customer) {
            return redirect()->route('customers.edit')->with('errors', ['this customer does not exist!']);
        }
        if ($request->name) {
            $customer->name = $request->name;
        }
        if ($request->email) {
            $customer->phone = $request->phone;
        }
        $customer->update();
        session()->flash('success', Lang::get('site.goBack'));
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return redirect()->route('customers.show');
        }
        $customer->active = 1;
        $customer->update();
        session()->flash('success', 'customer activated successfully');
        return redirect()->route('customers.index');
    }
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return redirect()->route('customers.show');
        }
        $customer->active = 0;
        $customer->update();
        session()->flash('success', 'customer banned successfully');
        return redirect()->route('customers.index');
    }
}
