<?php

// alamat atau alias dari suatu file
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// import class lain
// panggil class model
use App\BiodataMahasiswa;
use App\Exports\BiodataExport;
use DB;
use App\Http\Requests\UpdateBiodata;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class BiodataController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware("auth");
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if(request()->ajax()){
            return DataTables::of(BiodataMahasiswa::query())->editColumn("nim", function ($data) {
                return "<strong><i>" . $data->nim . "</i></strong>";            
            })->addColumn("action", function ($data) {
                 return "
                    <a href='" . route("biodata.show", ["id" => $data->id]) . "' class='btn btn-success'>Detail</a>
                    <a href='" . route("biodata.edit", ["id" => $data->id]) . "' class='btn btn-warning'>Edit</a>
                    <a href='" . route("biodata.destroy", ["id" => $data->id]) . "' class='btn btn-danger'>Delete</a>
                 ";
            })->rawColumns(["nim", "action"])->addIndexColumn()->toJson();
        }

        $html = $builder->columns([
            ["data" => "DT_RowIndex", "name" => "#", "title" => "NO", "defaultContent" => "", "orderable" => false ],
            ["data" => "name", "name" => "name", "title" => "NAMA"],
            ["data" => "nim", "name" => "nim", "title" => "NIM"],
            [
                'defaultContent' => '',
                'data'           => 'action',
                'name'           => 'action',
                'title'          => 'Action',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
            ],
        ]);

        return view("biodata.index", compact("html"));

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

    public function excel(){
        return Excel::download(new BiodataExport, 'biodata.xlsx');
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
