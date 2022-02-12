<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use Validator;
use App\Models\Hall;
use App\Models\HallImage;

class HallsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halls = Hall::all();
        return view('halls.index')->with('halls', $halls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halls.create');
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
            'capacity' => 'required|integer',
            'advance' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return redirect()->route('halls.create')->with('errors', $validator->errors());
        }
        $hall = Hall::create($request->all());
        if ($request->hasFile('img1')) {
            $img1Ext = $request->file('img1')->getClientOriginalExtension();
            $img1Name = time() . '1' . '.' . $img1Ext;
            $request->file('img1')->storeAs('/halls', $img1Name);
            HallImage::create([
                'hall_id' => $hall->id,
                'name' => $img1Name
            ]);
        }
        if ($request->hasFile('img2')) {
            $img2Ext = $request->file('img2')->getClientOriginalExtension();
            $img2Name = time() . '2' . '.' . $img2Ext;
            $request->file('img2')->storeAs('/halls', $img2Name);
            HallImage::create([
                'hall_id' => $hall->id,
                'name' => $img2Name
            ]);
        }
        if ($request->hasFile('img3')) {
            $img3Ext = $request->file('img3')->getClientOriginalExtension();
            $img3Name = time() . '3' . '.' . $img3Ext;
            $request->file('img3')->storeAs('/halls', $img3Name);
            HallImage::create([
                'hall_id' => $hall->id,
                'name' => $img2Name
            ]);
        }
        return view('halls.index')->with('success', ['hall added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hall  = Hall::find($id);
        return view('halls.show')->with('hall', $hall);
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
