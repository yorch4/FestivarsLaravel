<?php

namespace App\Http\Controllers;

use App\Festival;
use App\Your_festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller {

    public function getIndex()
    {
        $festivals = Festival::all();
        return view('catalog.index', array('arrayFestivals' => $festivals));
    }
    public function control()
    {
        $festivals = Festival::all();
        if(Auth::user()->rol == 'admin') {
            return view('catalog.control', array('arrayFestivals' => $festivals));
        } else {
            return view('catalog.index', array('arrayFestivals' => $festivals));
        }
    }
    public function your_festivals() {
        $your_festivals = Your_festival::join('Festivals','idFestival', '=', 'Festivals.id')->select('Festivals.name','Festivals.description','Festivals.capacity','Festivals.allowedAge','Festivals.date','Festivals.photo','Your_festivals.id')->where('Your_festivals.idUser', '=', Auth::user()->id)->get();
        return view('catalog.your_festivals', array('arrayFestivals' => $your_festivals));
    }
    public function postCatalog(Request $request) {
        $your_festival = new Your_festival();
        $your_festival->idUser = Auth::user()->id;
        $your_festival->idFestival = $request->input('festivalOculto');
        $your_festival->save();
        $festivals = Festival::all();
        return view('catalog.index', array('arrayFestivals' => $festivals));
    }
    public function postYour_festivals(Request $request) {
        $festival = Your_festival::find($request->input('festivalOculto'));
        $festival->delete();

        return redirect('/your_festivals');
    }
    public function delete($id) {
        $arrayYour_festival = DB::table('your_festivals')->where("idFestival", '=', $id);
        foreach ($arrayYour_festival as $your_festival) {
            $your_festival->delete();
        }
        $festival = Festival::find($id);
        $festival->delete();

        return redirect('/control');
    }

}
