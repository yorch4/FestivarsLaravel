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
        return view('catalog.control', array('arrayFestivals' => $festivals));
    }
    public function your_festivals() {
        $your_festivals = Your_festival::join('Festivals','idFestival', '=', 'Festivals.id')->select('Festivals.name','Festivals.description','Festivals.capacity','Festivals.allowedAge','Festivals.date','Festivals.photo','Your_festivals.id', 'Festivals.id as idFestival')->where('Your_festivals.idUser', '=', Auth::user()->id)->get();
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
        DB::table('your_festivals')->where("idFestival", '=', $id)->delete();

        $festival = Festival::find($id);
        $festival->delete();

        return redirect('/control');
    }
    public function add() {
        return view('catalog.add');
    }
    public function postAdd(Request $request) {
        $error = DB::table('festivals')->where('name', '=', $request->input('name'))->get();
        if(count($error) > 0) {
            return view('catalog.add', array('error' => "El festival ya existe"));
        }
        $fich_unic = time() . "-" . $request->file('photo')->getClientOriginalName();
        //para que no se repita el nombre del fichero se concatena el tiempo unix
        $imgFestival = "img/" . $fich_unic;
        move_uploaded_file($request->file('photo'), $imgFestival);
        $festival = new Festival();
        $festival->name = $request->input('name');
        $festival->description = $request->input('description');
        $festival->capacity = $request->input('capacity');
        $festival->allowedAge = $request->input('allowedAge');
        $festival->date = $request->input('date');
        $festival->photo = $imgFestival;
        $festival->save();
        return redirect('/control');
    }
    public function update($id) {
        $festival = Festival::find($id);
        return view('catalog.update', array('festival' => $festival));
    }
    public function postUpdate(Request $request) {
        $fich_unic = time() . "-" . $request->file('photo')->getClientOriginalName();
        //para que no se repita el nombre del fichero se concatena el tiempo unix
        $imgFestival = "img/" . $fich_unic;
        move_uploaded_file($request->file('photo'), $imgFestival);
        $festival = Festival::find($request->input('idOculto'));
        $festival->name = $request->input('name');
        $festival->description = $request->input('description');
        $festival->capacity = $request->input('capacity');
        $festival->allowedAge = $request->input('allowedAge');
        $festival->date = $request->input('date');
        $festival->photo = $imgFestival;
        $festival->save();
        return redirect('/control');
    }
    public function details($id) {
        $festival = Festival::find($id);
        return view('catalog.details', array('festival' => $festival));
    }

}
