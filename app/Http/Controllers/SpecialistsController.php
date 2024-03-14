<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use Illuminate\Http\Request;

class SpecialistsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $specialists = Specialist::when($request->input('name'), function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('masterData.specialists.index', compact('specialists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('masterData.specialists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        // dd($data);
        Specialist::create($data);
        return redirect()->route('specialists')->with('success', 'User successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialist $Specialist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $specialists = Specialist::findOrFail($id);
        return view('masterData.specialists.edit', compact('specialists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' =>  'required',
        ]);
        $specialists = Specialist::findOrFail($id);
        $specialists->title = $request->title;
        $specialists->description = $request->description;
        $specialists->status = $request->status;

        $specialists->save();
        return redirect()->route('specialists')->with('success', 'User successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $specialists = Specialist::findOrFail($id);
        $specialists->delete();
        return redirect()->route('specialists')->with('success', 'User successfully deleted');
    }
}
