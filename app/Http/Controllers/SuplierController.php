<?php

namespace App\Http\Controllers;

use App\Models\suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suplier = suplier::all();
        return view('suplier.index',compact(
            'suplier'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suplier.create');
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
        suplier::create([
            'nama'      => $data['nama'],
            'kontak'    => $data['kontak'],
            'alamat'     => $data['alamat'],
            'email'     => $data['email']
        ]);

        toast()->success('Data have been succesfully saved!');
        return redirect()->route('suplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function show(suplier $suplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suplier = suplier::find($id);
        return view('suplier.edit', compact(
            'suplier'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $suplier = suplier::find($id);
        $suplier->update($data);
        toast()->success('Success', 'Data have been succesfully updated!');
        return redirect('suplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suplier = suplier::find($id);
        $suplier->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your data has been moved to trash!'
                ));
    }
}
