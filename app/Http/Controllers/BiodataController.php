<?php

// alamat atau alias dari suatu file
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// import class lain
// panggil class model
use App\BiodataMahasiswa;
use DB;
use App\Http\Requests\UpdateBiodata;
use App\User;
use DataTables;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->ajax()){
            $mahasiswa = BiodataMahasiswa::latest()->get();
            return DataTables::of($mahasiswa);
        }
        
        return view('biodata.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("biodata.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->file());
        $filePath = $request->file("photo")->store("public");
        // return $filePath;

        DB::table('biodata_mahasiswa')->insert([
            'name' => $request->name,
            'nim' => $request->nim,
            'address' => $request->address,
            'photo' => $filePath]); //menyimpan filePath yang didapatkan
            // 'created_at' => time 
        return redirect()->route("biodata.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //where("id", $id)->first();
        $data = BiodataMahasiswa::find($id);
        // test data json

        // untuk melihat query
        // $data = BiodataMahasiswa::where("id", $id);
        // dd($data->toSQL());

        // return response()->json($data);
        return view("biodata.show", compact("data"));

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = BiodataMahasiswa::find($id);
        // untuk melihat query

        return view("biodata.edit", compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\UpdateBiodata  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBiodata $request, $id)
    {
        BiodataMahasiswa::where("id", $id)->update($request->except("_token")); //ambil semua data kecuali token
        return redirect()->route("biodata.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        BiodataMahasiswa::where("id", $id)->delete();
        return redirect()->route("biodata.index");
    }
}
