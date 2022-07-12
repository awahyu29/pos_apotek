<?php

namespace App\Http\Controllers;

use App\Models\jenis_barang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = jenis_barang::all();
        return view('jenisbarang.index',compact(
            'jenis'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenisbarang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        jenis_barang::create([
            'jenis'     => $data['jenis']
        ]);

        toast()->success('Data have been succesfully saved!');
        return redirect()->route('jenisbarang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jenis_barang  $jenis_barang
     * @return \Illuminate\Http\Response
     */
    public function show(jenis_barang $jenis_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jenis_barang  $jenis_barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = jenis_barang::find($id);
        return view('jenisbarang.edit', compact(
            'jenis'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jenis_barang  $jenis_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $jenis = jenis_barang::find($id);
        $jenis->update($data);
        toast()->success('Success', 'Data have been succesfully updated!');
        return redirect()->route('jenisbarang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jenis_barang  $jenis_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis = jenis_barang::find($id);
        $jenis->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your data has been moved to trash!'
                ));
    }
}
