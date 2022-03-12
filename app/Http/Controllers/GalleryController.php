<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hall;
use App\Models\HallImage;
use Validator;
use Lang;
use Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = HallImage::orderBy('id', 'DESC')->get();
        return view('gallery.index')->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $halls = Hall::all();
        return view('gallery.create')->with('halls', $halls);
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
            'img' => 'required|image'
        ]);
        if ($validator->fails()) {
            session()->flash('error', $validator->errors());
            return redirect()->route('gallery.create');
        }
        if ($request->hasFile('img')) {
            $img1Ext = $request->file('img')->getClientOriginalExtension();
            $imgName = time() . '.' . $img1Ext;
            $request->file('img')->storeAs('/public/halls', $imgName);
            HallImage::create([
                'hall_id' => $request->hall_id,
                'name' => $imgName
            ]);
        }
        session()->flash('success', 'image uploaded successfully!');
        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = HallImage::find($id);
        return view('gallery.show')->with('image', $image);
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
        $image = HallImage::find($id);
        
        if (Storage::delete('/public/halls/' . $image->name)) {
            $image->delete();
            session()->flash('success', 'image deleted successfully!');
            return redirect()->route('gallery.index');
        }
    }
}
