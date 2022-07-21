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
         if($a <= 100 && $a >= 90){
            $b = "A";
         }
         elseif($a <= 89 && $a >= 80){
            $b = "B";
         }
         elseif($a <= 79 && $a >= 70){
            $b = "C";
         }
         elseif($a <= 69 && $a >= 60){
            $b = "D";
         }
         elseif($a <= 59 && $a >= 50){
            $b = "E";
         }
         else{
            $b = "Grade Eror!";
         }
         return $b;
    }
    public function index()
    {
        $a =nilai::all();
        return view('nilai.index',['nilai'=> $a]);
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
            'nilai1' => 'required',
            'grade' => 'required',
        ]);

        $nilai = new nilai();
        $nilai->nis = $request->nis;
        $nilai->kode_mapel = $request->kode_mapel;
        $nilai->nilai1 = $request->nilai1;
        $nilai->grade =$this->grade($nilai->nilai);
        $nilai->save();
        return redirect()->route('nilai.index')->with('succes',
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
        return view('nilai.show',compact('nilai'));
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
        return view('nilai.edit',compact('nilai'));
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
            'nilai1' => 'required',
            'grade' => 'required',
        ]);

        $nilai = nilai::findOrFail($id);
        $nilai->nis = $request->nis;
        $nilai->kode_mapel = $request->kode_mapel;
        $nilai->nilai1 = $request->nilai1;
        $nilai->grade =$this->grade($nilai->nilai);
        $nilai->save();
        return redirect()->route('nilai.index')->with('succes',
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
        return redirect()->route('nilai.index')->with('Succes',
        'Data berhasil dihapus!');

    }
}
