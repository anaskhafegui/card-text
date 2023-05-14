<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Design;

class DesignController extends Controller
{
    public function index()
    {
        $designs = Design::all();
        return view('designs.index', compact('designs'));
    }

    public function create()
    {
        return view('designs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'x_axis' => 'required|numeric',
            'y_axis' => 'required|numeric'
        ]);

        $design = new Design;
        $design->name = $validatedData['name'];
        $design->x_axis = $validatedData['x_axis'];
        $design->y_axis = $validatedData['y_axis'];

        $image = $request->file('image');
        $imagePath = $image->store('public/images');
        $design->image = str_replace('public/', '', $imagePath);

        $design->save();

        return redirect()->route('designs.index')->with('success', 'Design created successfully.');
    }

    public function show(Design $design)
    {
        return view('designs.show', compact('design'));
    }

    public function edit(Design $design)
    {
        return view('designs.edit', compact('design'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'x_axis' => 'required|numeric',
            'y_axis' => 'required|numeric'
        ]);
    
        $design = Design::findOrFail($id);
        $design->name = $validatedData['name'];
        $design->x_axis = $validatedData['x_axis'];
        $design->y_axis = $validatedData['y_axis'];
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images');
            $design->image = str_replace('public/', '', $imagePath);
        }
        $design->save();    
        return redirect()->route('designs.show', $design->id)->with('success', 'Design updated successfully.');
    }

    public function destroy(Design $design)
    {
        $design->delete();
        return redirect()->route('designs.index');
    }
}
