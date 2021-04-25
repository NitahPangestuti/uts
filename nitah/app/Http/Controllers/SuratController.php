<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Surat::latest()->paginate(5);
    
        return view('surat_masuk.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surat_masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'pengirim' => 'required',
        ]);
    
        Surat::create($request->all());
     
        return redirect()->route('surat_masuk.index')
                        ->with('success','Simpan Data Berhasil.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $Surat
     * @return \Illuminate\Http\Response
     */
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $Surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat $surat_masuk)
    {
        return view('surat_masuk.edit',compact('surat_masuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surat $surat_masuk)
    {
        $request->validate([
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'pengirim' => 'required',
        ]);
    
        $surat_masuk->update($request->all());
    
        return redirect()->route('surat_masuk.index')
                        ->with('success','Update Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat_masuk)
    {
        $surat_masuk->delete();
    
        return redirect()->route('surat_masuk.index')
                        ->with('success','Hapus Data Berhasil');
    }
}
