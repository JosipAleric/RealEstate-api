<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    public function uploadImage(Request $request){
        $pathToFile = $request->file('image')->store('images', 'public');

        return $pathToFile;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Property::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'type'=>'required',
            'address'=>'required',
            'size'=>'required',
            'bedrooms_number'=>'required',
            'bathrooms_number'=>'required',
            'price'=>'required',
            'year'=>'required',
        ]);
        return Property::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return $property;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'name'=>'required',
            'type'=>'required',
            'address'=>'required',
            'size'=>'required',
            'bedrooms_number'=>'required',
            'bathrooms_number'=>'required',
            'price'=>'required',
            'year'=>'required',
        ]);
        return $property->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
        return $property->delete();
    }
}
