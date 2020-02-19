<?php

namespace App\Http\Controllers;

use App\Festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller {

    public function getIndex()
    {
        $festivals = Festival::all();
        return view('catalog.index', array('arrayFestivals' => $festivals));
    }

}
