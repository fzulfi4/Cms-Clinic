<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialist;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $doctors = Doctor::select('id', 'photo', 'name', 'status', 'sid')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->orderBy('id')
            ->paginate(10);
        $doctorIds = $doctors->pluck('sid')->toArray();

        foreach ($doctors as $doctor) {
            $specialist = Specialist::select('description')->where('status', true)->find($doctor->sid);
            if (!empty($specialist)) {
                $doctor->description = $specialist->description;
            } else {
                $doctor->description = '';
            }
        }


        return view('masterData.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $specialists = Specialist::get();
        return view('masterData.doctors.create', compact('specialists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'sip' => 'required',
            'name' => 'required',
            'sid' => 'required',
            'email' => 'required|email',
        ]);
        //
        $data = $request->all();

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $file->storeAs('uploads', $filename, 'public');
            $data['photo'] = $filename;
        }
        $data['pid'] = rand(0, 100);
        // dd($data);
        Doctor::create($data);
        return redirect()->route('doctors')->with('success', 'User successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = Doctor::findOrFail($id);
        $specialists = Specialist::where('status', true)->get();
        return view('masterData.doctors.edit', compact('user', 'specialists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'nik' => 'required',
            'sip' => 'required',
            'name' => 'required',
            'sid' => 'required',
            'email' => 'required|email',
        ]);
        $user = Doctor::findOrFail($id);
        $user->nik = $request->nik;
        $user->sip = $request->sip;
        $user->name = $request->name;
        $user->sid = $request->sid;


        if ($request->file('photo')) {
            if ($user->photo != ''  && $user->photo != null) {
                $file = $user->photo;
                $file_old = public_path('storage/uploads/' . $file);
                if (file_exists($file_old)) {
                    unlink($file_old);
                }
            }

            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $file->storeAs('uploads', $filename, 'public');
            $user->photo = $filename;
        }
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->status = $request->status;
        $user->save();
        return redirect()->route('doctors')->with('success', 'User successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = Doctor::findOrFail($id);
        $user->delete();
        return redirect()->route('doctors')->with('success', 'User successfully deleted');
    }
}
