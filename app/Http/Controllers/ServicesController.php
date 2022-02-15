<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Lang;
use App\Models\Service;
use App\Models\Hall;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $halls = Hall::all();
        return view('services.create')->with('halls', $halls);
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
            'hall_id' => 'required|integer',
            'price' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return redirect()->route('services.create')->with('errors', $validator->errors());
        }
        $input = $request->all();
        $input['required'] = $request->has('required');
        Service::create($input);
        return redirect()->route('services.index')->with('success', 'new service added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $halls = Hall::all();
        $service = Service::find($id);
        return view('services.edit')
                    ->with('halls', $halls)
                    ->with('service', $service);
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
        $service = Service::find($id);
        if (!$service) {
            return redirect()->route('services.edit')->with('errors', ['this service does not exist!']);
        }
        if ($request->name) {
            $service->name = $request->name;
        }
        if ($request->description) {
            $service->description = $request->description;
        }
        if ($request->price) {
            $service->price = $request->price;
        }
        $service->required = $request->has('required');
        $service->update();
        session()->flash('success', 'service updated successfully!');
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        session()->flash('success', 'service deleted successfully');
        return redirect()->route('services.index');
    }
}
