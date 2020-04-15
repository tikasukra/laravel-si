<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BiodataMahasiswa extends Model
{

	use SoftDeletes;

    //define nama tabel
	protected $table = "biodata_mahasiswa";


    // define primary key


    // define fillable columns
    protected $fillable = [
    	"name",
    	"nim",
        "address",
        "photo"
    ];
}
