<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dosen.index')
            ->with('lecturers', Dosen::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // dd($request);
        $validateData = validator($request->all(), [
            'nik' => 'required|string|max:7|unique:dosen,nik',
            'name' => 'required|string|max:100',
            'birth_date' => 'required',
            'email' => 'required|email|max:45|unique:dosen,email'
        ])->validate();

        $dosen = new Dosen($validateData);
        $dosen->save();
        return redirect(route('dosenList'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        //
    }
}
