<?php

namespace App\Http\Controllers;

use App\Models\nilai;
use Illuminate\Http\Request;

class nilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function grade($a)
    {
         if($a <= 100 && $a >= 80){
            $grade = "A";
         }
         elseif($a < 80 && $a >= 60){
            $grade = "B";
         }
         elseif($a < 60 && $a >= 30){
            $grade = "C";
         }
         else{
            $grade = "Grade Error!";
         }
         return $grade;
    }
    public function index()
    {
        $a =nilai::all();
        return view('nilai.index',['nilai' => $a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nilai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|unique:nilai|max:255',
            'kode_mapel' => 'required',
            'nilai1' => 'required'
            
        ]);

        $nilai = new nilai();
        $nilai->nis = $request->nis;
        $nilai->kode_mapel = $request->kode_mapel;
        $nilai->nilai1 = $request->nilai1;
        $nilai->grade = $this->grade($nilai->nilai1);
        $nilai->save();
        return redirect()->route('nilai.index')->with('success',
        'Data berhasil dimuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nilai = nilai::findOrFail($id);
        return view('nilai.show', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilai = nilai::findOrFail($id);
        return view('nilai.edit', compact('nilai'));
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
        $validated = $request->validate([
            'nis' => 'required',
            'kode_mapel' => 'required',
            'nilai1' => 'required'
            
        ]);

        $nilai = nilai::findOrFail($id);
        $nilai->nis = $request->nis;
        $nilai->kode_mapel = $request->kode_mapel;
        $nilai->nilai1 = $request->nilai1;
        $nilai->grade = $this->grade($nilai->nilai1);
        $nilai->save();
        return redirect()->route('nilai.index')->with('success',
        'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = nilai::findOrfail($id);
        $nilai->delete();
        return redirect()->route('nilai.index')->with('success',
        'Data berhasil dihapus!');

    }
}
