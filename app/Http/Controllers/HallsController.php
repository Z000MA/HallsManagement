<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Lang;
use Validator;
use App\Models\Hall;
use App\Models\HallImage;

class HallsController extends Controller
{
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
            'name' => 'required|unique:halls,name',
            'capacity' => 'required|integer',
            'advance' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            session()->flash('error', $validator->errors());
            return redirect()->route('halls.create')->with('errors', $validator->errors());
        }
        $hall = Hall::create($request->all());
        if ($request->hasFile('img1')) {
            $img1Ext = $request->file('img1')->getClientOriginalExtension();
            $img1Name = time() . '1' . '.' . $img1Ext;
            $request->file('img1')->storeAs('/public/halls', $img1Name);
            HallImage::create([
                'hall_id' => $hall->id,
                'tag' => 'img1',
                'name' => $img1Name
            ]);
        }
        if ($request->hasFile('img2')) {
            $img2Ext = $request->file('img2')->getClientOriginalExtension();
            $img2Name = time() . '2' . '.' . $img2Ext;
            $request->file('img2')->storeAs('/public/halls', $img2Name);
            HallImage::create([
                'hall_id' => $hall->id,
                'tag' => 'img2',
                'name' => $img2Name
            ]);
        }
        if ($request->hasFile('img3')) {
            $img3Ext = $request->file('img3')->getClientOriginalExtension();
            $img3Name = time() . '3' . '.' . $img3Ext;
            $request->file('img3')->storeAs('/public/halls', $img3Name);
            HallImage::create([
                'hall_id' => $hall->id,
                'tag' => 'img3',
                'name' => $img2Name
            ]);
        }
        return view('halls.index')->with('success', 'hall added successfully!');
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
        $hall = Hall::find($id);
        return view('halls.edit')->with('hall', $hall);
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
        $hall = Hall::find($id);
        if (!$hall) {
            return redirect()->route('halls.edit')->with('errors', ['this hall does not exist!']);
        }
        if ($request->name) {
            $hall->name = $request->name;
        }
        if ($request->location) {
            $hall->location = $request->location;
        }
        if ($request->capacity) {
            $hall->capacity = $request->capacity;
        }
        if ($request->google_location) {
            $hall->google_location = $request->google_location;
        }
        if ($request->hasFile('img1')) {
            $hall_image = HallImage::where('hall_id', $id)->where('tag', 'img1')->get();
            Storage::delete($hall_image->name);
            $hall_image->delete();
            $img1Ext = $request->file('img1')->getClientOriginalExtension();
            $img1Name = time() . '1' . '.' . $img1Ext;
            $request->file('img1')->storeAs('/public/halls', $img1Name);
            HallImage::create([
                'hall_id' => $hall->id,
                'tag' => 'img1',
                'name' => $img1Name
            ]);
        }
        if ($request->hasFile('img1')) {
            $hall_image = HallImage::where('hall_id', $id)->where('tag', 'img2')->get();
            Storage::delete($hall_image->name);
            $hall_image->delete();
            $img2Ext = $request->file('img2')->getClientOriginalExtension();
            $img2Name = time() . '2' . '.' . $img2Ext;
            $request->file('img2')->storeAs('/public/halls', $img2Name);
            HallImage::create([
                'hall_id' => $hall->id,
                'tag' => 'img2',
                'name' => $img2Name
            ]);
        }
        if ($request->hasFile('img3')) {
            $hall_image = HallImage::where('hall_id', $id)->where('tag', 'img3')->get();
            Storage::delete($hall_image->name);
            $hall_image->delete();
            $img3Ext = $request->file('img3')->getClientOriginalExtension();
            $img1Name = time() . '3' . '.' . $img3Ext;
            $request->file('img3')->storeAs('/public/halls', $img3Name);
            HallImage::create([
                'hall_id' => $hall->id,
                'tag' => 'img3',
                'name' => $img3Name
            ]);
        }
        $hall->update();
        session()->flash('success', 'hall information updated successfully!');
        return redirect()->route('halls.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hall = Hall::find($id);
        $hallImages = HallImage::where('hall_id', $id)->delete();
        $hall->delete();
        return redirect()->route('halls.index')->with('success', ['hall has been removed successfully!']);
    }
}
